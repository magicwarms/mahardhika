<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends Admin_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Rental_m');
	}

	public function index_rental($id = NULL) {
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listrental'] = $this->Rental_m->selectall_rental()->result();
		foreach ($data['listrental'] as $key => $value) {
			$map = directory_map('assets/upload/rental/pic-rental-'.folenc($data['listrental'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listrental'][$key]->imageRENTAL = base_url() . 'assets/upload/rental/pic-rental-'.folenc($data['listrental'][$key]->id).'/'.$map[0];
			} else {
				$data['listrental'][$key]->imageRENTAL = base_url() . 'assets/upload/no-image-available.png';
			}

		}

		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getrental'] = $this->Rental_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getrental'] = $this->Rental_m->selectall_rental($id)->row();
			$map = directory_map('assets/upload/rental/pic-rental-'.folenc($data['getrental']->id), FALSE, TRUE);
			if(!empty($map)){
				$data['getrental']->imageRENTAL = base_url() . 'assets/upload/rental/pic-rental-'.folenc($data['getrental']->id).'/'.$map[0];
			} else {
				$data['getrental']->imageRENTAL = '';
			}
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view($this->data['backendDIR'].'about_us', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function saverental() {
		$rules = $this->Rental_m->rules_about;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->Rental_m->array_from_post(array('title','desc'));
			$id = decode(urldecode($this->input->post('id')));

			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
			$idsave = $this->Rental_m->save($data, $id);

			$subject = $idsave;
			$filenamesubject = 'pic-about-'.folenc($subject);

			if(!empty($_FILES['imgABOUT']['name'][0])){
				$number_of_files = sizeof($_FILES['imgABOUT']['tmp_name']);
				$files = $_FILES['imgABOUT'];
				$path = 'assets/upload/about/'.$filenamesubject;
				if (!file_exists($path)){
	            	mkdir($path, 0777, true);
	        	}

				$config['upload_path']		= $path;
	            $config['allowed_types']	= 'jpg|png|jpeg';
	            $config['file_name']        = $this->security->sanitize_filename($filenamesubject);

	            for ($i = 0; $i < $number_of_files; $i++) {
			        $_FILES['imgABOUT']['name'] = $files['name'][$i];
			        $_FILES['imgABOUT']['type'] = $files['type'][$i];
			        $_FILES['imgABOUT']['tmp_name'] = $files['tmp_name'][$i];
			        $_FILES['imgABOUT']['error'] = $files['error'][$i];
			        $_FILES['imgABOUT']['size'] = $files['size'][$i];
			        //now we initialize the upload library
			        $this->upload->initialize($config);
			        // we retrieve the number of files that were uploaded
			        if ($this->upload->do_upload('imgABOUT')){
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
	  		redirect('mahardhikaadmin/about_us/index_about');

		} else {
			
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'mohon ulangi inputan form anda dibawah.',
	            'type' => 'warning'
	        );
	        $this->session->set_flashdata('message',$data);
	        $this->index_about();
		}
	}

	public function actiondelete_about($id=NULL){
		$id = decode(urldecode($id));

		$files = glob('assets/upload/rental/pic-rental-'.folenc($id).'/*'); //get all file names
		foreach($files as $file){
		    if(is_file($file))
		    unlink($file); //delete file
		}

		if($id != 0){
			$this->Rental_m->delete($id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Penghapusan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('mahardhikaadmin/about_us/index_about');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dihapus silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('mahardhikaadmin/about_us/index_about');
		}
	}

	public function deleteimgabout($id1=NULL, $id2=NULL){
		if($id1 != NULL){
			$id = decode(urldecode($id1));
			unlink('assets/upload/rental/pic-rental-'.folenc($id).'/'.$id2);
		}

		$data = array(
            'title' => 'Sukses',
            'text' => 'Penghapusan Gambar berhasil dilakukan',
            'type' => 'success'
        );
        $this->session->set_flashdata('message',$data);
		redirect('mahardhikaadmin/about_us/index_about/'.$id1);
	}

}

