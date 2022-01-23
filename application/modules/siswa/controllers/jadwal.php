<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends Ci_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Jadwal Siswa',
		'main_view'	=> 'jadwal'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('breadcrumbs');

		$this->load->model('model_jadwal', 'm_jadwal', TRUE);
	}


	public function index()
	{
		$smt = $this->m_jadwal->semester_aktif();

		
		$semester = $smt->semester;
		$tahun = $smt->tahun;

		$this->data['semester_aktif'] = $semester." ".$tahun;
		$jadwal = $this->m_jadwal->cari_semua($semester, $tahun);
		if ($jadwal) {
			$table = $this->m_jadwal->buat_tabel($jadwal);
			$this->data['tabel_data'] = $table;
		}

		$this->load->view('template', $this->data);
	}

}