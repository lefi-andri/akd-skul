<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali extends Guru_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Wali Kelas',
		'main_view'	=> 'wali'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('breadcrumbs');

		$this->load->model('model_wali', 'm_wali', TRUE);
		$this->load->model('model_siswa', 'm_siswa', TRUE);
	}

	public function lapor_siswa($kelas = NULL, $id = NULL)
	{
		$this->data['main_view'] = 'lapor_siswa';

		if (!empty($id)) {
			$siswa = $this->m_siswa->cari($id);
			foreach ($siswa as $key => $value) {
				$this->data['lst_siswa'][$key] = $value;
			}

			$tp_nilai = $this->m_siswa->tampil_nilai($id);
			$this->data['data_nilai'] = $tp_nilai;
			$this->data['kelas'] = $kelas;

			$this->load->view('template', $this->data);
		}
		else
		{
			redirect('wali-kelas');
		}
	}

	public function kelas($id = NULL)
	{
		$this->data['title'] = "Lihat Semua Data Siswa";
		$this->data['main_view'] = "list_siswa";

		$nip = $this->session->userdata('usernm');

		$kelas = $this->m_siswa->cari_kelas($nip, $id);
		if ($kelas) {
			# code...
			foreach ($kelas as $key => $value) {
				$this->data['lst_kelas'][$key] = $value;
			}

			$siswa = $this->m_siswa->cari_siswa_kelas($nip, $id);
			if ($siswa) {
				$tabel = $this->m_siswa->buat_tabel($siswa);
				$this->data['tabel_data'] = $tabel;
			}
			$this->load->view('template', $this->data);
		}
		else
		{
			redirect('wali-kelas');
		}
		
		
	}


	public function index()
	{
		$nip = $this->session->userdata('usernm');

		$kelas = $this->m_wali->cari_semua($nip);
		if ($kelas) {
			$tabel = $this->m_wali->buat_tabel($kelas);
			$this->data['tabel_data'] = $tabel;
		}

		$this->load->view('template', $this->data);
	}

}