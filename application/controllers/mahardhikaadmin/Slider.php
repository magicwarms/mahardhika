<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends Admin_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Slider_m');
	}

	public function index_slider($id = NULL) {
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listslider'] = $this->Slider_m->selectall_slider()->result();
		foreach ($data['listslider'] as $key => $value) {
			$map = directory_map('assets/upload/slider/pic-slider-'.folenc($data['listslider'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listslider'][$key]->imageSLIDER = base_url() . 'assets/upload/slider/pic-slider-'.folenc($data['listslider'][$key]->id).'/'.$map[0];
			} else {
				$data['listslider'][$key]->imageSLIDER = base_url() . 'assets/upload/no-image-available.png';
			}
		}

		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getslider'] = $this->Slider_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getslider'] = $this->Slider_m->selectall_slider($id)->row();
			$map = directory_map('assets/upload/slider/pic-slider-'.folenc($data['getslider']->id), FALSE, TRUE);
			if(!empty($map)){
				$data['getslider']->imageSLIDER = base_url() . 'assets/upload/slider/pic-slider-'.folenc($data['getslider']->id).'/'.$map[0];
			} else {
				$data['getslider']->imageSLIDER = '';
			}
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view($this->data['backendDIR'].'slider', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function saveslider() {
		$rules = $this->Slider_m->rules_slider;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->Slider_m->array_from_post(array('title1','title2','title3'));
			$id = decode(urldecode($this->input->post('id')));

			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
			$idsave = $this->Slider_m->save($data, $id);

			$subject = $idsave;
			$filenamesubject = 'pic-slider-'.folenc($subject);

			if(!empty($_FILES['imgSLIDER']['name'][0])) {
				$path = 'assets/upload/slider/'.$filenamesubject;
				if (!file_exists($path)){
	            	mkdir($path, 0777, true);
	        	}

				$config['upload_path']		= $path;
	            $config['allowed_types']	= 'jpg|png|jpeg';
	            $config['file_name']        = $this->security->sanitize_filename($filenamesubject);

		        $this->upload->initialize($config);

		        if ($this->upload->do_upload('imgSLIDER')){
		        	$data['uploads'] = $this->upload->data();
		        }
		    }

		  	$data = array(
            	'title' => 'Sukses',
                'text' => 'Penyimpanan Data berhasil dilakukan',
                'type' => 'success'
          	);
	    	$this->session->set_flashdata('message', $data);
	  		redirect('mahardhikaadmin/slider/index_slider');

		} else {
			
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'mohon ulangi inputan form anda dibawah.',
	            'type' => 'warning'
	        );
	        $this->session->set_flashdata('message',$data);
	        $this->index_slider();
		}
	}

	public function actiondelete_slider($id=NULL){
		$id = decode(urldecode($id));
		$files = glob('assets/upload/slider/pic-slider-'.folenc($id).'/*'); //get all file names
		foreach($files as $file){
		    if(is_file($file))
		    unlink($file); //delete file
		}
		$path = 'assets/upload/slider/pic-slider-'.folenc($id);
		if(is_dir($path)){
			rmdir($path);
		}
		if($id != 0){
			$this->Slider_m->delete($id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Penghapusan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('mahardhikaadmin/slider/index_slider');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dihapus silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('mahardhikaadmin/slider/index_slider');
		}
	}

	public function deleteimgslider($id){
		if($id != NULL){
			$ids = decode(urldecode($id));
			$map = directory_map('assets/upload/slider/pic-slider-'.folenc($ids), FALSE, TRUE);
			$path = 'assets/upload/slider/pic-slider-'.folenc($ids);
			foreach ($map as $value) {
				unlink('assets/upload/slider/pic-slider-'.folenc($ids).'/'.$value);
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
		redirect('mahardhikaadmin/slider/index_slider/'.$id);
	}

}

