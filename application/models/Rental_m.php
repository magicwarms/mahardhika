<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rental_m extends MY_Model{
	
	protected $_table_name = 'car_rental';
	protected $_order_by = 'id';
	protected $_primary_key = 'id';

	function __construct (){
		parent::__construct();
	}

	public $rules_rental = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Nama Mobil', 
			'rules' => 'trim|required'
		),
		'year' => array(
			'field' => 'year', 
			'label' => 'Tahun Mobil', 
			'rules' => 'trim|required|numeric'
		),
		'door' => array(
			'field' => 'door', 
			'label' => 'Jumlah Pintu Mobil', 
			'rules' => 'trim|required|numeric'
		),
		'bag' => array(
			'field' => 'bag', 
			'label' => 'Bag Mobil', 
			'rules' => 'trim|required'
		),
		'seat' => array(
			'field' => 'seat', 
			'label' => 'Jumlah seat Mobil', 
			'rules' => 'trim|required|numeric'
		)
	);

	public function get_new(){
		$rental = new stdClass();
		$rental->id = '';
		$rental->name = '';
		$rental->year = '';
		$rental->door = '';
		$rental->bag = '';
		$rental->seat = '';
		$rental->status = '';
		return $rental;
	}

	public function selectall_rental($id = NULL) {
		$this->db->select('*');
		$this->db->from('car_rental');
		if ($id != NULL) {
			$this->db->where('id',$id);
		}
		return $this->db->get();
	}
}