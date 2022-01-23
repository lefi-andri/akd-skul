<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends Guru_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Nilai Siswa',
		'main_view'	=> 'nilai',
		'form_action' => 'nilai'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('breadcrumbs');

		$this->load->model('model_nilai', 'm_nilai', TRUE);
		$this->load->model('model_jadwal', 'm_jadwal', TRUE);
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

			redirect('nilai');
		}
		else
		{
			redirect('nilai');
		}
	}


	public function index()
	{
		$smt = $this->m_jadwal->semester_aktif();

		$nip = $this->session->userdata('usernm');
		$semester = $smt->semester;
		$tahun = $smt->tahun;

		$mapel = $this->m_jadwal->cari_mapel($nip, $semester, $tahun);
		if($mapel) {
			foreach ($mapel as $row) {
				$this->data['opt_mapel_kelas'][$row->id_jadwal] = $row->nama_mapel.' - '.$row->nama_kelas.' '.$row->kelas_bagian;
			}
		}  else {
			$this->data['opt_mapel_kelas'][''] = '- Pilih Mata Pelajaran -';
		}
			

		if ($this->input->post('submit')) {
			$id_jadwal = $this->input->post('id_jadwal');
			$jadwal = $this->m_jadwal->cari($id_jadwal, $nip);
			if ($jadwal) {
				$this->data['form_action_input'] = 'nilai/aksi-nilai';
				$buat_input = $this->m_nilai->buat_input($jadwal);

				$this->data['kelas'] = $jadwal->id_kelas;
				$this->data['mapel'] = $jadwal->kode_mapel;
				$this->data['data_input'] = $buat_input;

				$this->load->view('template', $this->data);			
			}
			else
			{
				redirect('nilai');
			}

			
		}
		else
		{
			$this->load->view('template', $this->data);	
		}

		
	}

}