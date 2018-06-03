<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_m extends MY_Model {
	
	protected $_table_name = 'promo';
	protected $_order_by = 'id';
	protected $_primary_key = 'id';

	function __construct (){
		parent::__construct();
	}

	public $rules_promo = array(
		'title' => array(
			'field' => 'title', 
			'label' => 'Judul', 
			'rules' => 'trim|required'
		),
		'desc' => array(
			'field' => 'desc', 
			'label' => 'Deskripsi', 
			'rules' => 'trim|required'
		)
	);

	public function get_new(){
		$promo = new stdClass();
		$promo->id = '';
		$promo->title = '';
		$promo->desc = '';
		return $promo;
	}

	public function selectall_promo($id = NULL) {
		$this->db->select('*');
		$this->db->from('promo');
		if ($id != NULL) {
			$this->db->where('id',$id);
		}
		return $this->db->get();
	}
}