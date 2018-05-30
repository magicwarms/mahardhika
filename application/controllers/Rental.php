<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends Frontend_Controller{

	public function __construct (){
		parent::__construct();
		$this->load->model('Rental_m');
	}

	public function index (){
		$data['addONS'] = 'car_rent';

		$data['listrental'] = $this->Rental_m->selectall_rental()->result();
		foreach ($data['listrental'] as $key => $value) {
			$map = directory_map('assets/upload/rental/pic-rental-'.folenc($data['listrental'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listrental'][$key]->imageRENTAL = base_url() . 'assets/upload/rental/pic-rental-'.folenc($data['listrental'][$key]->id).'/'.$map[0];
			} else {
				$data['listrental'][$key]->imageRENTAL = base_url() . 'assets/upload/no-image-available.png';
			}
		}
		
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        
		$data['subview'] = $this->load->view($this->data['frontendDIR'].'car_rent', $data, TRUE);
		$this->load->view('templates/_layout_base_frontend',$data);
	}
}