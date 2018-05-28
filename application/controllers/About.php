<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Frontend_Controller{

	public function __construct (){
		parent::__construct();
		//$this->load->model('Contact_m');
	}

	public function index (){
		$data['addONS'] = 'about_us';

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        
		$data['subview'] = $this->load->view($this->data['frontendDIR'].'about_us', $data, TRUE);
		$this->load->view('templates/_layout_base_frontend',$data);
	}
}