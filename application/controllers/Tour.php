<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends Frontend_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Tour_m');
	}

	public function index (){
		$data['addONS'] = 'tour';
		$data['listtour'] = $this->Tour_m->selectall_tour()->result();
		foreach ($data['listtour'] as $keys => $val) {
			$maping = directory_map('assets/upload/tour/pic-tour-'.folenc($val->id), FALSE, TRUE);
			$maps = array();
			$imgs = array();
			if(!empty($maping)){
				foreach ($maping  as $key => $value) {
					$maps[] = base_url().'assets/upload/tour/pic-tour-'.folenc($val->id).'/'.$value;
				}
			}
			$data['listtour'][$keys]->map = $maps;
		}
		
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        
		$data['subview'] = $this->load->view($this->data['frontendDIR'].'tour', $data, TRUE);
		$this->load->view('templates/_layout_base_frontend',$data);
	}
}