<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends MY_Controller{

	function __construct (){
    	parent::__construct();

    	$this->data['folBACKEND'] = $this->data['folder_admin'];
    	$this->data['frontendDIR'] = 'templates/frontend/';
    	$this->data['asfront'] = 'assets/frontend/';
        $this->data['rootDIR'] = 'templates/';
    	$this->data['emailadmin'] = '';
	}

	// function mail_config(){
 //        $config['protocol'] = 'smtp';
 //        $config['smtp_host'] = 'mail.mahardhikatransportbatam.com'; 
 //        $config['smtp_port'] = '587'; 
 //        $config['smtp_timeout'] = 30;
 //        $config['smtp_user'] = 'system@mahardhikatransportbatam.com';
 //        $config['smtp_pass'] = 'of9r813lymck';
 //        $config['mailtype'] = 'html';
 //        $config['charset'] = 'iso-8859-1';
 //        $config['wordwrap'] = TRUE;
 //        $config['crlf'] = "\r\n";
 //        $config['newline'] = "\r\n";
 //        return $config;
 //    }
    //sementara pakai ini dulu tuk kirim email
    function mail_config(){
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.codewell.id';
        $config['smtp_port'] = '587'; 
        $config['smtp_timeout'] = 30;
        $config['smtp_user'] = 'system@codewell.id';
        $config['smtp_pass'] = '8gPax)t,jMV*';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        
        return $config;
    }
}