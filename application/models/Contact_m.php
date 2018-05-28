<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_m extends MY_Model{
	
	protected $_table_name = 'contact_us';
	protected $_order_by = 'id';
	protected $_primary_key = 'id';

	public $rules_contact = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Nama Kontak', 
			'rules' => 'trim|required'
		),
		'email' => array(
			'field' => 'email', 
			'label' => 'Email Kontak', 
			'rules' => 'trim|required|valid_email'
		),
		'subject' => array(
			'field' => 'subject', 
			'label' => 'Judul', 
			'rules' => 'trim|required'
		),
		'desc' => array(
			'field' => 'desc', 
			'label' => 'Saran masukan kontak', 
			'rules' => 'trim|required'
		)
	);

	function __construct (){
		parent::__construct();
	}

	public function selectall_contact() {
		$this->db->select('*');
		$this->db->from('contact_us');
		
		return $this->db->get();
	}
}