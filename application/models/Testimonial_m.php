<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_m extends MY_Model{
	
	protected $_table_name = 'testimonial';
	protected $_order_by = 'id';
	protected $_primary_key = 'id';

	function __construct (){
		parent::__construct();
	}

	public $rules_testimonial = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Nama', 
			'rules' => 'trim|required'
		),
		'position' => array(
			'field' => 'position', 
			'label' => 'Jabatan', 
			'rules' => 'trim|required'
		),
		'testimoni' => array(
			'field' => 'testimoni', 
			'label' => 'Testimonial', 
			'rules' => 'trim|required'
		)
	);

	public function get_new(){
		$testimoni = new stdClass();
		$testimoni->id = '';
		$testimoni->name = '';
		$testimoni->position = '';
		$testimoni->testimoni = '';
		return $testimoni;
	}

	public function selectall_testimonial($id = NULL) {
		$this->db->select('*');
		$this->db->from('testimonial');
		if ($id != NULL) {
			$this->db->where('id', $id);
		}
		return $this->db->get();
	}
}