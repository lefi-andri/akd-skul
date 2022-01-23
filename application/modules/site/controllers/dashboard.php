<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Dashboard',
		'main_view'	=> 'dashboard'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('breadcrumbs');
	}

	public function index()
	{
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);
		
		$this->load->view('template', $this->data);
	}

}