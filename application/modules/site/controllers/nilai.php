<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends Admin_Controller 
{
	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Data Nilai',
		'main_view'	=> 'nilai/list_nilai'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('breadcrumbs');
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);
		// add breadcrumbs
		$this->breadcrumbs->push('Manjemen Nilai', 'nilai-siswa', 8);

		//models
		$this->load->model('model_nilai', 'm_nilai', TRUE);
		$this->load->model('model_mapel', 'm_mapel', TRUE);
		$this->load->model('model_guru', 'm_guru', TRUE);
		$this->load->model('model_kelas', 'm_kelas', TRUE);
		$this->load->model('model_jadwal', 'm_jadwal', TRUE);
		$this->load->model('model_pengaturan', 'm_pengaturan', TRUE);
	}

	public function aksi_nilai()
	{
		if ($this->input->post('submit')) {
			$nis = $this->input->post('nis');
			$tugas = $this->input->post('tugas');
			$uts = $this->input->post('uts');
			$uas = $this->input->post('uas');

			$kode_mapel = $this->input->post('kode_mapel');
			$id_kelas = $this->input->post('id_kelas');

			foreach ($nis as $key => $value) {
				$nilai = $this->m_nilai->cari_nilai($value, $kode_mapel, $id_kelas);
				if ($nilai) {
					$info = array(
							'tugas' => $tugas[$key],
							'uts' => $uts[$key],
							'uas' => $uas[$key]
						);
					$this->m_nilai->update($info, $value, $kode_mapel, $id_kelas);
				}
				else
				{
					$info = array(
							'nis' => $value,
							'kode_mapel' => $kode_mapel,
							'id_kelas' => $id_kelas,
							'tugas' => $tugas[$key],
							'uts' => $uts[$key],
							'uas' => $uas[$key]
						);

					$this->m_nilai->simpan($info);
				}
			}

			redirect('nilai-siswa');
		}
		else
		{
			redirect('nilai-siswa');
		}
	}

	public function add()
	{
		$this->data['form_action'] = "nilai-siswa/add";
		$this->data['main_view'] = "nilai/form_nilai";
		$this->breadcrumbs->push('Add Nilai', 'nilai-siswa/add', 7);

		$this->_opt_value();


		if ($this->input->post('submit')) {
			$id_jadwal = $this->input->post('id_jadwal');
			$nip = $this->input->post('nip');
			$jadwal = $this->m_jadwal->cari_jadwal($id_jadwal, $nip);
			if ($jadwal) {
				$this->data['form_action_input'] = 'nilai-siswa/aksi-nilai';
				$buat_input = $this->m_nilai->buat_input($jadwal);

				$this->data['kelas'] = $jadwal->id_kelas;
				$this->data['mapel'] = $jadwal->kode_mapel;
				$this->data['data_input'] = $buat_input;

				$this->load->view('template', $this->data);			
			}
			else
			{
				$this->data['pesan_error'] = 'Tidak ditemukan jadwal tersebut ...';
				$this->load->view('template', $this->data);
			}
		} else {
			$this->load->view('template', $this->data);
		}
	}

	public function filter()
	{
		
	}

	public function index()
	{
		redirect('nilai-siswa/add');
		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		$this->_opt_value();
		$this->data['pesan_info'] = '- Klik Filte untuk melihat data nilai, data nilai bisa di lihat sesuai semester yang telah di set -';
		$this->load->view('template', $this->data);
	}

	public function _opt_value()
	{
		$smt = $this->m_jadwal->semester_aktif();

		$semester = $smt->semester;
		$tahun = $smt->tahun;

		$mapel = $this->m_jadwal->cari_mapel($semester, $tahun);
		if($mapel) {
			foreach ($mapel as $row) {
				$this->data['opt_mapel_kelas'][$row->id_jadwal] = $row->nama_mapel.' - '.$row->nama_kelas.' '.$row->kelas_bagian;
			}
		}  else {
			$this->data['opt_mapel_kelas'][''] = '- Pilih Mata Pelajaran -';
		}

		//pilih guru
		$guru = $this->m_guru->cari_semua();
		$this->data['opt_guru'][''] = "- Pilih Guru -";
		if ($guru) {
			foreach ($guru as $row) {
				$this->data['opt_guru'][$row->nip] = $row->nama;
			}
			
		}
	}
}