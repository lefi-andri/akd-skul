<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this; 
		//$this->form_validation->run($this); 
		//session_start();

		if($this->session->userdata('loginadmin') == FALSE)
		{
			redirect('login');
		}
	}
}