<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends Admin_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Pengaturan',
		'main_view'	=> 'pengaturan/form_pengaturan',
		'form_action' => 'pengaturan'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('breadcrumbs');
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);
		// add breadcrumbs
		$this->breadcrumbs->push('Pengaturan', 'pengaturan', 8);

		//models
		$this->load->model('model_pengaturan', 'm_pengaturan', TRUE);
	}

	public function index()
	{
		//pengaturan semester
		$sms = $this->m_pengaturan->cari_set_ta();
		foreach ($sms as $key => $value) {
			$this->data['form_value'][$key] = $value;
		}

		//tahun
		for ($i=date('Y'); $i >= 2000 ; $i--) { 
			$this->data['opt_filter'][$i] = $i;
		}

		if ($this->input->post('submit')) {
			$info = array(
					'semester' => $this->input->post('semester'),
					'tahun' => $this->input->post('tahun'),
					'nama_kepsek' => $this->input->post('nama_kepsek'),
					'nama_waka' => $this->input->post('nama_waka'),
				);

			$this->m_pengaturan->simpan($info);
			redirect('pengaturan');
		}
		else
		{
			$this->load->view('template', $this->data);
		}

	}


}