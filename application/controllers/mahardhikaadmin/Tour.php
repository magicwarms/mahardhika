<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends Admin_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Tour_m');
	}

	public function index_tour($id = NULL) {
		$data['addONS'] = 'plugins_tour';
		$id = decode(urldecode($id));

		$data['listtour'] = $this->Tour_m->selectall_tour()->result();
		foreach ($data['listtour'] as $key => $value) {
			$map = directory_map('assets/upload/tour/pic-tour-'.folenc($data['listtour'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listtour'][$key]->imageTOUR = base_url() . 'assets/upload/tour/pic-tour-'.folenc($data['listtour'][$key]->id).'/'.$map[0];
			} else {
				$data['listtour'][$key]->imageTOUR = base_url() . 'assets/upload/no-image-available.png';
			}
		}
		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['gettour'] = $this->Tour_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['gettour'] = $this->Tour_m->selectall_tour($id)->row();
			$map = directory_map('assets/upload/tour/pic-tour-'.folenc($data['gettour']->id), FALSE, TRUE);
			$maps = array();
			$imgs = array();
			if(!empty($map)){
				foreach ($map  as $key => $value) {
					$maps[] = base_url().'assets/upload/tour/pic-tour-'.folenc($data['gettour']->id).'/'.$value;
					$imgs[] = $value;
				}
			}
			$data['gettour']->map = $maps;
			$data['gettour']->imgs = $imgs;
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view($this->data['backendDIR'].'tour', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function savetour() {
		$rules = $this->Tour_m->rules_tour;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');
        $this->form_validation->set_message('numeric', 'Form %s diperboleh untuk angka saja');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->Tour_m->array_from_post(array('title','price_tour','price_pax','min_tour','max_tour','start_journey'));
			$id = decode(urldecode($this->input->post('id')));

			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
			$data['destination'] = $this->input->post('destination');
			$data['include'] = $this->input->post('include');
			$data['exclude'] = $this->input->post('exclude');
			$idsave = $this->Tour_m->save($data, $id);

			$subject = $idsave;
			$filenamesubject = 'pic-tour-'.folenc($subject);

			if(!empty($_FILES['imgTOUR']['name'][0])){
				$number_of_files = sizeof($_FILES['imgTOUR']['tmp_name']);
				$files = $_FILES['imgTOUR'];
				$path = 'assets/upload/tour/'.$filenamesubject;
				if (!file_exists($path)){
	            	mkdir($path, 0777, true);
	        	}

				$config['upload_path']		= $path;
	            $config['allowed_types']	= 'jpg|png|jpeg';
	            $config['file_name']        = $this->security->sanitize_filename($filenamesubject);

	            for ($i = 0; $i < $number_of_files; $i++) {
			        $_FILES['imgTOUR']['name'] = $files['name'][$i];
			        $_FILES['imgTOUR']['type'] = $files['type'][$i];
			        $_FILES['imgTOUR']['tmp_name'] = $files['tmp_name'][$i];
			        $_FILES['imgTOUR']['error'] = $files['error'][$i];
			        $_FILES['imgTOUR']['size'] = $files['size'][$i];
			        //now we initialize the upload library
			        $this->upload->initialize($config);
			        // we retrieve the number of files that were uploaded
			        if ($this->upload->do_upload('imgTOUR')){
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
	  		redirect('mahardhikaadmin/tour/index_tour');

		} else {
			
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'mohon ulangi inputan form anda dibawah.',
	            'type' => 'warning'
	        );
	        $this->session->set_flashdata('message',$data);
	        $this->index_tour();
		}
	}

	public function actiondelete_tour($id=NULL){
		$id = decode(urldecode($id));
		$files = glob('assets/upload/tour/pic-tour-'.folenc($id).'/*'); //get all file names
		foreach($files as $file){
		    if(is_file($file))
		    unlink($file); //delete file
		}
		$path = 'assets/upload/tour/pic-tour-'.folenc($id);
		if(is_dir($path)){
			rmdir($path);
		}
		if($id != 0){
			$this->Tour_m->delete($id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Penghapusan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('mahardhikaadmin/tour/index_tour');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dihapus silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('mahardhikaadmin/tour/index_tour');
		}
	}

	public function deleteimgtour($id1, $id2){
		if($id1 != NULL){
			$id = decode(urldecode($id1));
			unlink('assets/upload/tour/pic-tour-'.folenc($id).'/'.$id2);
		}
		$path = 'assets/upload/tour/pic-tour-'.folenc($id);
		if(is_dir($path)){
			rmdir($path);
		}
		$data = array(
            'title' => 'Sukses',
            'text' => 'Penghapusan Gambar berhasil dilakukan',
            'type' => 'success'
        );
        $this->session->set_flashdata('message',$data);
		redirect('mahardhikaadmin/tour/index_tour/'.$id1);
	}
}