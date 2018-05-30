<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends Frontend_Controller{

	public function __construct (){
		parent::__construct();
		//$this->load->model('About_us_m');
	}

	public function index (){
		$data['addONS'] = 'car_rent';

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        
		$data['subview'] = $this->load->view($this->data['frontendDIR'].'car_rent', $data, TRUE);
		$this->load->view('templates/_layout_base_frontend',$data);
	}
}