<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends Admin_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Testimonial_m');
	}

	public function index_testimonial($id = NULL) {
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listtestimonial'] = $this->Testimonial_m->selectall_testimonial()->result();
		foreach ($data['listtestimonial'] as $key => $value) {
			$map = directory_map('assets/upload/testimonial/pic-testimonial-'.folenc($data['listtestimonial'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listtestimonial'][$key]->imageTESTI = base_url() . 'assets/upload/testimonial/pic-testimonial-'.folenc($data['listtestimonial'][$key]->id).'/'.$map[0];
			} else {
				$data['listtestimonial'][$key]->imageTESTI = base_url() . 'assets/upload/no-image-available.png';
			}
		}

		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['gettesti'] = $this->Testimonial_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['gettesti'] = $this->Testimonial_m->selectall_testimonial($id)->row();
			$map = directory_map('assets/upload/testimonial/pic-testimonial-'.folenc($data['gettesti']->id), FALSE, TRUE);
			if(!empty($map)){
				$data['gettesti']->imageTESTI = base_url() . 'assets/upload/testimonial/pic-testimonial-'.folenc($data['gettesti']->id).'/'.$map[0];
			} else {
				$data['gettesti']->imageTESTI = '';
			}
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view($this->data['backendDIR'].'testimonial', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function savetesti() {
		$rules = $this->Testimonial_m->rules_testimonial;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->Testimonial_m->array_from_post(array('name','position','testimoni'));
			$id = decode(urldecode($this->input->post('id')));

			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
			$idsave = $this->Testimonial_m->save($data, $id);

			$subject = $idsave;
			$filenamesubject = 'pic-testimonial-'.folenc($subject);

			if(!empty($_FILES['imgTESTI']['name'][0])) {
				$path = 'assets/upload/testimonial/'.$filenamesubject;
				if (!file_exists($path)){
	            	mkdir($path, 0777, true);
	        	}

				$config['upload_path']		= $path;
	            $config['allowed_types']	= 'jpg|png|jpeg';
	            $config['file_name']        = $this->security->sanitize_filename($filenamesubject);

		        $this->upload->initialize($config);

		        if ($this->upload->do_upload('imgTESTI')){
		        	$data['uploads'] = $this->upload->data();
		        }
		    }

		  	$data = array(
            	'title' => 'Sukses',
                'text' => 'Penyimpanan Data berhasil dilakukan',
                'type' => 'success'
          	);
	    	$this->session->set_flashdata('message', $data);
	  		redirect('mahardhikaadmin/testimonial/index_testimonial');

		} else {
			
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'mohon ulangi inputan form anda dibawah.',
	            'type' => 'warning'
	        );
	        $this->session->set_flashdata('message',$data);
	        $this->index_testimonial();
		}
	}

	public function actiondelete_testimonial($id=NULL){
		$id = decode(urldecode($id));
		$files = glob('assets/upload/testimonial/pic-testimonial-'.folenc($id).'/*'); //get all file names
		foreach($files as $file){
		    if(is_file($file))
		    unlink($file); //delete file
		}
		$path = 'assets/upload/testimonial/pic-testimonial-'.folenc($id);
		if(is_dir($path)){
			rmdir($path);
		}
		if($id != 0){
			$this->Testimonial_m->delete($id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Penghapusan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('mahardhikaadmin/testimonial/index_testimonial');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dihapus silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('mahardhikaadmin/testimonial/index_testimonial');
		}
	}

	public function deleteimgtestimonial($id){
		if($id != NULL){
			$ids = decode(urldecode($id));
			$map = directory_map('assets/upload/testimonial/pic-testimonial-'.folenc($ids), FALSE, TRUE);
			$path = 'assets/upload/testimonial/pic-testimonial-'.folenc($ids);
			foreach ($map as $value) {
				unlink('assets/upload/testimonial/pic-testimonial-'.folenc($ids).'/'.$value);
			}
			if(is_dir($path)){
				rmdir($path);
			}
		}
		$data = array(
            'title' => 'Sukses',
            'text' => 'Penghapusan Gambar berhasil dilakukan',
            'type' => 'success'
        );
        $this->session->set_flashdata('message',$data);
		redirect('mahardhikaadmin/testimonial/index_testimonial/'.$id);
	}

}

