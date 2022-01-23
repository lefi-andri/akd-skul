<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends Ci_Controller 
{
	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Nilai Siswa',
		'main_view'	=> 'nilai'
	);

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('model_nilai', 'm_nilai', TRUE);
	}
	public function index()
	{		
		$nis = $this->session->userdata('usernm');
		$nil = $this->m_nilai->get_nilai($nis);
		if ($nil) {
			$table = $this->m_nilai->buat_tabel($nil);
			$this->data['tabel_data'] = $table;
		}

		$this->load->view('template', $this->data);
	}

}