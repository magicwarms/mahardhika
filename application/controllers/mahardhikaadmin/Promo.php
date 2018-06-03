<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends Admin_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Promo_m');
	}

	public function index_promo($id = NULL) {
		$data['addONS'] = 'plugins_tour';
		$id = decode(urldecode($id));

		$data['listpromo'] = $this->Promo_m->selectall_promo()->result();
		foreach ($data['listpromo'] as $key => $value) {
			$map = directory_map('assets/upload/promo/pic-promo-'.folenc($data['listpromo'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listpromo'][$key]->imagePROMO = base_url() . 'assets/upload/promo/pic-promo-'.folenc($data['listpromo'][$key]->id).'/'.$map[0];
			} else {
				$data['listpromo'][$key]->imagePROMO = base_url() . 'assets/upload/no-image-available.png';
			}
		}
		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getpromo'] = $this->Promo_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getpromo'] = $this->Promo_m->selectall_promo($id)->row();
			$map = directory_map('assets/upload/promo/pic-promo-'.folenc($data['getpromo']->id), FALSE, TRUE);
			$maps = array();
			$imgs = array();
			if(!empty($map)){
				foreach ($map  as $key => $value) {
					$maps[] = base_url().'assets/upload/promo/pic-promo-'.folenc($data['getpromo']->id).'/'.$value;
					$imgs[] = $value;
				}
			}
			$data['getpromo']->map = $maps;
			$data['getpromo']->imgs = $imgs;
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view($this->data['backendDIR'].'promo', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function savepromo() {
		$rules = $this->Promo_m->rules_promo;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->Promo_m->array_from_post(array('title'));
			$id = decode(urldecode($this->input->post('id')));

			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
			$data['desc'] = $this->input->post('desc');
			$idsave = $this->Promo_m->save($data, $id);

			$subject = $idsave;
			$filenamesubject = 'pic-promo-'.folenc($subject);

			if(!empty($_FILES['imgPROMO']['name'][0])){
				$number_of_files = sizeof($_FILES['imgPROMO']['tmp_name']);
				$files = $_FILES['imgPROMO'];
				$path = 'assets/upload/promo/'.$filenamesubject;
				if (!file_exists($path)){
	            	mkdir($path, 0777, true);
	        	}

				$config['upload_path']		= $path;
	            $config['allowed_types']	= 'jpg|png|jpeg';
	            $config['file_name']        = $this->security->sanitize_filename($filenamesubject);

	            for ($i = 0; $i < $number_of_files; $i++) {
			        $_FILES['imgPROMO']['name'] = $files['name'][$i];
			        $_FILES['imgPROMO']['type'] = $files['type'][$i];
			        $_FILES['imgPROMO']['tmp_name'] = $files['tmp_name'][$i];
			        $_FILES['imgPROMO']['error'] = $files['error'][$i];
			        $_FILES['imgPROMO']['size'] = $files['size'][$i];
			        //now we initialize the upload library
			        $this->upload->initialize($config);
			        // we retrieve the number of files that were uploaded
			        if ($this->upload->do_upload('imgPROMO')){
			          $data['uploads'][$i] = $this->upload->data();
			        }else{
			          $data['upload_errors'][$i] = $this->upload->display_errors();
			        }
			    }
	    	}

		  	$data = array(
            	'title' => 'Sukses',
                'text' => 'Penyimpanan Data berhasil dilakukan',
                'type' => 'success'
          	);
	    	$this->session->set_flashdata('message', $data);
	  		redirect('mahardhikaadmin/promo/index_promo');

		} else {
			
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'mohon ulangi inputan form anda dibawah.',
	            'type' => 'warning'
	        );
	        $this->session->set_flashdata('message',$data);
	        $this->index_promo();
		}
	}

	public function actiondelete_promo($id=NULL){
		$id = decode(urldecode($id));
		$files = glob('assets/upload/promo/pic-promo-'.folenc($id).'/*'); //get all file names
		foreach($files as $file){
		    if(is_file($file))
		    unlink($file); //delete file
		}
		$path = 'assets/upload/promo/pic-promo-'.folenc($id);
		if(is_dir($path)){
			rmdir($path);
		}
		if($id != 0){
			$this->Promo_m->delete($id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Penghapusan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('mahardhikaadmin/promo/index_promo');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dihapus silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('mahardhikaadmin/promo/index_promo');
		}
	}

	public function deleteimgpromo($id1, $id2){
		if($id1 != NULL){
			$id = decode(urldecode($id1));
			unlink('assets/upload/promo/pic-promo-'.folenc($id).'/'.$id2);
		}
		$path = 'assets/upload/promo/pic-promo-'.folenc($id);
		if(is_dir($path)){
			rmdir($path);
		}
		$data = array(
            'title' => 'Sukses',
            'text' => 'Penghapusan Gambar berhasil dilakukan',
            'type' => 'success'
        );
        $this->session->set_flashdata('message',$data);
		redirect('mahardhikaadmin/promo/index_promo/'.$id1);
	}
}