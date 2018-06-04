<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends Frontend_Controller{

	public function __construct (){
		parent::__construct();
		$this->load->model('Promo_m');
		//$this->load->model('Rental_m');
	}

	public function index (){
		$data['addONS'] = 'car_rent';
        
		$data['listpromo'] = $this->Promo_m->selectall_promo()->result();
		foreach ($data['listpromo'] as $key => $value) {
			$map = directory_map('assets/upload/promo/pic-promo-'.folenc($data['listpromo'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listpromo'][$key]->imagePROMO = base_url() . 'assets/upload/promo/pic-promo-'.folenc($data['listpromo'][$key]->id).'/'.$map[0];
			} else {
				$data['listpromo'][$key]->imagePROMO = base_url() . 'assets/upload/no-image-available.png';
			}
		}
        
		$data['subview'] = $this->load->view($this->data['frontendDIR'].'detail_promo', $data, TRUE);
		$this->load->view('templates/_layout_base_frontend',$data);
	}
}