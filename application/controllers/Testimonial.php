<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends Frontend_Controller{

	public function __construct (){
		parent::__construct();
		$this->load->model('Testimonial_m');
	}

	public function index (){
		$data['addONS'] = 'car_rent';
        
		$data['listtestimonial'] = $this->Testimonial_m->selectall_testimonial()->result();
		foreach ($data['listtestimonial'] as $key => $value) {
			$map = directory_map('assets/upload/testimonial/pic-testimonial-'.folenc($data['listtestimonial'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listtestimonial'][$key]->imageTESTI = base_url() . 'assets/upload/testimonial/pic-testimonial-'.folenc($data['listtestimonial'][$key]->id).'/'.$map[0];
			} else {
				$data['listtestimonial'][$key]->imageTESTI = base_url() . 'assets/upload/no-image-available.png';
			}
		}
        
		$data['subview'] = $this->load->view($this->data['frontendDIR'].'testimonial', $data, TRUE);
		$this->load->view('templates/_layout_base_frontend',$data);
	}
}