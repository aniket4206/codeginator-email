<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index(){
		$this->load->view('email_form');
	}
	public function sendemail(){
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		$email = $this->input->post('email');

	   	$config = Array(
	  		'protocol' => 'smtp',
	  		'smtp_host' => 'ssl://smtp.googlemail.com',
	  		'smtp_port' => 465,
	  		'smtp_user' => 'testsourcecodester@gmail.com', // change it to yours
	  		'smtp_pass' => 'mysourcepass', // change it to yours
	  		'mailtype' => 'html',
	  		'charset' => 'iso-8859-1',
	  		'wordwrap' => TRUE
		);

	    $this->load->library('email', $config);
	    $this->email->set_newline("\r\n");
	    $this->email->from($config['smtp_user']); // change it to yours
	    $this->email->to($email);// change it to yours
	    $this->email->subject($subject);
	    $this->email->message($message);
	    if($this->email->send()){
	    	$this->session->set_flashdata('message', 'Email sent');
	    }
	    else{
	    	$this->session->set_flashdata('message', show_error($this->email->print_debugger()));
	     	
	    }

	    redirect('/');

	}
}
