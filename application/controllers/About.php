<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Frontend_Controller{

	public function __construct (){
		parent::__construct();
		$this->load->model('About_us_m');
	}

	public function index (){
		$data['addONS'] = 'about_us';
		$data['getabout'] = $this->About_us_m->selectall_about(1)->row();

		$map = directory_map('assets/upload/about/pic-about-'.folenc($data['getabout']->id), FALSE, TRUE);
		$maps = array();
		$imgs = array();
		if(!empty($map)){
			foreach ($map  as $key => $value) {
				$maps[] = base_url().'assets/upload/about/pic-about-'.folenc($data['getabout']->id).'/'.$value;
				$imgs[] = $value;
			}
			$data['getabout']->imageBARANG = base_url() . 'assets/upload/about/pic-about-'.folenc($data['getabout']->id).'/'.$map[0];
		}
		$data['getabout']->map = $maps;
		$data['getabout']->imgs = $imgs;

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        
		$data['subview'] = $this->load->view($this->data['frontendDIR'].'about_us', $data, TRUE);
		$this->load->view('templates/_layout_base_frontend',$data);
	}
}