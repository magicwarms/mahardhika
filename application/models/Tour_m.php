<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_m extends MY_Model {
	
	protected $_table_name = 'tour';
	protected $_order_by = 'id';
	protected $_primary_key = 'id';

	function __construct (){
		parent::__construct();
	}

	public $rules_tour = array(
		'title' => array(
			'field' => 'title', 
			'label' => 'Judul Tour', 
			'rules' => 'trim|required'
		),
		'price_tour' => array(
			'field' => 'price_tour', 
			'label' => 'Harga Tour', 
			'rules' => 'trim|required|numeric'
		),
		'price_pax' => array(
			'field' => 'price_pax', 
			'label' => 'Harga Pax', 
			'rules' => 'trim|required|numeric'
		),
		'min_tour' => array(
			'field' => 'min_tour', 
			'label' => 'Minimal Tour', 
			'rules' => 'trim|required|numeric'
		),
		'max_tour' => array(
			'field' => 'max_tour', 
			'label' => 'Maksimal Tour', 
			'rules' => 'trim|required|numeric'
		),
		'start_journey' => array(
			'field' => 'start_journey', 
			'label' => 'Mulai Perjalanan', 
			'rules' => 'trim|required'
		),
		'destination' => array(
			'field' => 'destination', 
			'label' => 'Destinasi', 
			'rules' => 'trim|required'
		),
		'include' => array(
			'field' => 'include', 
			'label' => 'Include Tour', 
			'rules' => 'trim|required'
		),
		'exclude' => array(
			'field' => 'exclude', 
			'label' => 'Exclude Tour', 
			'rules' => 'trim|required'
		)
	);

	public function get_new(){
		$tour = new stdClass();
		$tour->id = '';
		$tour->title = '';
		$tour->price_tour = '';
		$tour->price_pax = '';
		$tour->min_tour = '';
		$tour->max_tour = '';
		$tour->start_journey = '';
		$tour->destination = '';
		$tour->include = '';
		$tour->exclude = '';
		return $tour;
	}

	public function selectall_tour($id = NULL) {
		$this->db->select('*');
		$this->db->from('tour');
		if ($id != NULL) {
			$this->db->where('id',$id);
		}
		return $this->db->get();
	}
}