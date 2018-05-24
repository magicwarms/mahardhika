<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends Admin_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('About_us_m');
	}

	public function index_about($id = NULL) {
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listabout'] = $this->About_us_m->selectall_about()->result();
		
		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getabout'] = $this->About_us_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getabout'] = $this->About_us_m->selectall_about($id)->row();
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view($this->data['backendDIR'].'about_us', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function saveabout() {
		$rules = $this->About_us_m->rules_about;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->About_us_m->array_from_post(array('title','desc'));
			$id = decode(urldecode($this->input->post('id')));

			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
			$idsave = $this->About_us_m->save($data, $id);

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
		if($id != 0){
			$this->About_us_m->delete($id);
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
}

