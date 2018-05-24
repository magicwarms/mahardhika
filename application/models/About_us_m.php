<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us_m extends MY_Model{
	
	protected $_table_name = 'about_us';
	protected $_order_by = 'id';
	protected $_primary_key = 'id';

	function __construct (){
		parent::__construct();
	}

	public $rules_about = array(
		'title' => array(
			'field' => 'title', 
			'label' => 'Judul Halaman Tentang', 
			'rules' => 'trim|required'
		),
		'desc' => array(
			'field' => 'desc', 
			'label' => 'Deskripsi di Halaman Tentang', 
			'rules' => 'trim|required'
		),
	);

	public function get_new(){
		$about = new stdClass();
		$about->id = '';
		$about->title = '';
		$about->desc = '';
		return $about;
	}

	public function selectall_about($id = NULL) {
		$this->db->select('*');
		$this->db->from('about_us');
		if ($id != NULL) {
			$this->db->where('id',$id);
		}
		return $this->db->get();
	}
}