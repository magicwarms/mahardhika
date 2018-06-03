<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Rental_m');
		$this->load->model('About_us_m');
		$this->load->model('Tour_m');
		$this->load->model('Promo_m');
		$this->load->model('Testimonial_m');
		$this->load->model('Slider_m');
	}

	public function index (){
		$data['addONS'] = 'home';
		$data['listrental'] = $this->Rental_m->selectall_rental()->result();
		foreach ($data['listrental'] as $key => $value) {
			$map = directory_map('assets/upload/rental/pic-rental-'.folenc($data['listrental'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listrental'][$key]->imageRENTAL = base_url() . 'assets/upload/rental/pic-rental-'.folenc($data['listrental'][$key]->id).'/'.$map[0];
			} else {
				$data['listrental'][$key]->imageRENTAL = base_url() . 'assets/upload/no-image-available.png';
			}
		}
		$data['getabout'] = $this->About_us_m->selectall_about(1)->row();
		$map = directory_map('assets/upload/about/pic-about-'.folenc($data['getabout']->id), FALSE, TRUE);
		if(!empty($map)){
			$data['getabout']->imageABOUT = base_url() . 'assets/upload/about/pic-about-'.folenc($data['getabout']->id).'/'.$map[0];
		} else {
			$data['getabout']->imageABOUT = base_url() . 'assets/upload/no-image-available.png';
		}

		$data['listtour'] = $this->Tour_m->selectall_tour()->result();
		foreach ($data['listtour'] as $key => $value) {
			$map = directory_map('assets/upload/tour/pic-tour-'.folenc($data['listtour'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listtour'][$key]->imageTOUR = base_url() . 'assets/upload/tour/pic-tour-'.folenc($data['listtour'][$key]->id).'/'.$map[0];
			} else {
				$data['listtour'][$key]->imageTOUR = base_url() . 'assets/upload/no-image-available.png';
			}
		}

		$data['listpromo'] = $this->Promo_m->selectall_promo()->result();
		foreach ($data['listpromo'] as $key => $value) {
			$map = directory_map('assets/upload/promo/pic-promo-'.folenc($data['listpromo'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listpromo'][$key]->imagePROMO = base_url() . 'assets/upload/promo/pic-promo-'.folenc($data['listpromo'][$key]->id).'/'.$map[0];
			} else {
				$data['listpromo'][$key]->imagePROMO = base_url() . 'assets/upload/no-image-available.png';
			}
		}
		
		$data['listtestimonial'] = $this->Testimonial_m->selectall_testimonial()->result();
		foreach ($data['listtestimonial'] as $key => $value) {
			$map = directory_map('assets/upload/testimonial/pic-testimonial-'.folenc($data['listtestimonial'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listtestimonial'][$key]->imageTESTI = base_url() . 'assets/upload/testimonial/pic-testimonial-'.folenc($data['listtestimonial'][$key]->id).'/'.$map[0];
			} else {
				$data['listtestimonial'][$key]->imageTESTI = base_url() . 'assets/upload/no-image-available.png';
			}
		}
		
		$data['listslider'] = $this->Slider_m->selectall_slider()->result();
		foreach ($data['listslider'] as $key => $value) {
			$map = directory_map('assets/upload/slider/pic-slider-'.folenc($data['listslider'][$key]->id), FALSE, TRUE);
			if(!empty($map)){
				$data['listslider'][$key]->imageSLIDER = base_url() . 'assets/upload/slider/pic-slider-'.folenc($data['listslider'][$key]->id).'/'.$map[0];
			} else {
				$data['listslider'][$key]->imageSLIDER = base_url() . 'assets/upload/no-image-available.png';
			}
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        
		$data['subview'] = $this->load->view($this->data['frontendDIR'].'home', $data, TRUE);
		$this->load->view('templates/_layout_base_frontend',$data);
	}
}