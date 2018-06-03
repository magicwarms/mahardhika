<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_m extends MY_Model{
	
	protected $_table_name = 'sliders';
	protected $_order_by = 'id';
	protected $_primary_key = 'id';

	function __construct (){
		parent::__construct();
	}

	public $rules_slider = array(
		'title1' => array(
			'field' => 'title1', 
			'label' => 'Title Pertama', 
			'rules' => 'trim|required'
		),
		'title2' => array(
			'field' => 'title2', 
			'label' => 'Title Kedua', 
			'rules' => 'trim|required'
		),
		'title3' => array(
			'field' => 'title3', 
			'label' => 'Title Ketiga', 
			'rules' => 'trim|required'
		)
	);

	public function get_new(){
		$slider = new stdClass();
		$slider->id = '';
		$slider->title1 = '';
		$slider->title2 = '';
		$slider->title3 = '';
		return $slider;
	}

	public function selectall_slider($id = NULL) {
		$this->db->select('*');
		$this->db->from('sliders');
		if ($id != NULL) {
			$this->db->where('id', $id);
		}
		return $this->db->get();
	}
}