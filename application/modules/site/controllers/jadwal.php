<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends Admin_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Data Jadwal',
		'main_view'	=> 'jadwal/list_jadwal'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('breadcrumbs');
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);

		// add breadcrumbs
		$this->breadcrumbs->push('Data Jadwal', 'jadwal', 8);

		//models
		$this->load->model('model_jadwal', 'm_jadwal', TRUE);
		$this->load->model('model_guru', 'm_guru', TRUE);
		$this->load->model('model_mapel', 'm_mapel', TRUE);
		$this->load->model('model_kelas', 'm_kelas', TRUE);
		$this->load->model('model_waktu', 'm_waktu', TRUE);

	}

	public function _set_rule_add()
	{
		$this->form_validation->set_rules('id_waktu','Waktu', 'trim|required|callback_jadwalpk');
		$this->form_validation->set_rules('id_kelas','Kelas', 'trim|required|callback_jadwalpk');
		$this->form_validation->set_rules('kode_mapel','Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('nip','Guru', 'trim|required|callback_jadwalguru');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function add()
	{
		$this->data['title'] = 'Tambah Data Jadwal Pelajaran';
		$this->data['form_action'] = 'jadwal/add';
		$this->data['main_view'] = 'jadwal/form_jadwal';
		// add breadcrumbs
		$this->breadcrumbs->push('Filter Data', 'jadwal/filter', 7);
		$this->breadcrumbs->push('Tambah Data Jadwal', 'jadwal/add', 6);

		$keyword = $this->session->userdata('keyword');
		if (!empty($keyword)) {
					
			$this->_optionValueInput();
		
			if ($this->input->post('submit')) {
				$this->_set_rule_add();

				if ($this->form_validation->run() === TRUE) {
					$info = array(
							'id_waktu' => $this->input->post('id_waktu'),
							'id_kelas' => $this->input->post('id_kelas'),
							'kode_mapel' => $this->input->post('kode_mapel'),
							'nip' => $this->input->post('nip'),
							'tgl_time' => date('Y-m-d H:i:s')
						);

					if ($this->m_jadwal->simpan($info) === TRUE) {
						$this->session->set_flashdata('message_success', 'Berhasil menambah data.');
						$url = $this->session->userdata('urlback');
						redirect($url);
					}
					else
					{
						$this->data['pesan_error'] = "Terjadi Kesalahan/jadwal kelas bentrok ";
						$this->load->view('template', $this->data);			
					}
				}
				else
				{
					$this->data['pesan_error'] = "Terjadi Kesalahan/jadwal kelas bentrok";
					$this->load->view('template', $this->data);	
				}
			}
			else
			{
				$this->load->view('template', $this->data);	
			}
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Filter data terlebih dahulu.');
			redirect('jadwal');
		}
			
	}

	public function _set_rule_edit()
	{
		$this->form_validation->set_rules('id_waktu','Waktu', 'trim|required|callback_jadwalpk_edit');
		$this->form_validation->set_rules('id_kelas','Kelas', 'trim|required|callback_jadwalpk_edit');
		$this->form_validation->set_rules('kode_mapel','Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('nip','Guru', 'trim|required|callback_jadwalguru_edit');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function edit($id = NULL)
	{
		$this->load->helper('security');

		$this->data['title'] = 'Edit Data Jadwal';
		$this->data['form_action'] = 'jadwal/edit/'.$id;
		$this->data['main_view'] = 'jadwal/form_jadwal';
		// add breadcrumbs
		$this->breadcrumbs->push('Filter Data', 'jadwal/filter', 7);
		$this->breadcrumbs->push('Edit Data Jadwal', 'jadwal/edit/'.$id, 6);

		$this->_optionValueInput();
		
		if (!empty($id)) {
			if ($this->input->post('submit')) {
				$this->_set_rule_edit();

				if($this->form_validation->run() === TRUE)
				{
					$info = array(
							'id_waktu' => $this->input->post('id_waktu'),
							'id_kelas' => $this->input->post('id_kelas'),
							'kode_mapel' => $this->input->post('kode_mapel'),
							'nip' => $this->input->post('nip'),
							'tgl_time' => date('Y-m-d H:i:s')
						);
					if ($this->m_jadwal->update($info, $id) === TRUE) {
						$this->session->set_flashdata('message_success', 'Berhasil menyimpan data.');
						$url = $this->session->userdata('urlback');
						redirect($url);
					}
					else
					{
						$this->data['pesan_error'] = 'Gagal melakukan perubahan.';
						$this->load->view('template', $this->data);
					}
				}
				else
				{
					$this->data['pesan_error'] = 'Terjadi kesalahan input';
					$this->load->view('template', $this->data);
				}
					
				

			}
			else
			{
				$jadwal = $this->m_jadwal->cari($id);
				if ($jadwal) {
					foreach ($jadwal as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_userdata('id_waktu_sekarang', $jadwal->id_waktu);
					$this->session->set_userdata('id_kelas_sekarang', $jadwal->id_kelas);
					$this->session->set_userdata('nip_sekarang', $jadwal->nip);
					$this->load->view('template', $this->data);

				}
				else
				{
					$this->session->set_flashdata('message_warning', 'Tidak ditemukan data yang di edit.');
					$url = $this->session->userdata('urlback');
					redirect($url);
				}
				
			}
		}
		else
		{
			$url = $this->session->userdata('urlback');
			redirect($url);
		}

	}

	//function hapus
	public function hapus($id = NULL)
	{
		if(!empty($id))
		{
			if($this->m_jadwal->hapus($id) == TRUE)
			{
				$this->session->set_flashdata('message_success', 'Proses hapus data berhasil.');
				$url = $this->session->userdata('urlback');
				redirect($url);
			}
			else
			{
				$this->session->set_flashdata('message_error', 'Gagal menghapus data!');
				$url = $this->session->userdata('urlback');
				redirect($url);
			}
		}
		else
		{
			$url = $this->session->userdata('urlback');
			redirect($url);
		}
		
	}

	public function search()
	{
		$this->_optionValueFilter();
		$this->data['title'] = 'Cari Data Jadwal';
		//$this->session->unset_userdata('nip_sekarang', '');

		$this->breadcrumbs->push('Cari Data', 'jadwal/search', 7);

		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		$this->data['semester'] = $this->session->userdata('semester');
		$this->data['keyword'] = $this->session->userdata('keyword');
		$this->data['key'] = "";
		if(!empty($this->data['keyword']))
		{
			$key = $this->input->post('key');
			if(!empty($key))
			{
				$this->data['key'] = $this->input->post('key');
				$this->session->set_userdata('key', $this->data['key']);
			}
			else
			{
				$this->data['key'] = $this->session->userdata('key');
			}


			$this->load->library('pagination');

	        $config['base_url'] = site_url('jadwal/search/');
	        $config['total_rows'] = $this->m_jadwal->search_total_rows($this->data['semester'], $this->data['keyword'], $this->data['key']);
	        $config['per_page'] = 10;
	        $config['uri_segment'] = 3;
	        $config['suffix'] = '';
	        $config['first_url'] = site_url('jadwal/search');
	        $this->pagination->initialize($config);

	        $start = $this->uri->segment(3, 0);
			$jadwal = $this->m_jadwal->search_index_limit($config['per_page'], $start, $this->data['semester'], $this->data['keyword'], $this->data['key']);
			if ($jadwal) {
				$table = $this->m_jadwal->buat_tabel($jadwal, $start);
				$this->data['tabel_data'] = $table;

				$this->data['pagination'] = $this->pagination->create_links();

				$this->load->view('template', $this->data);
			}
			else
			{
				$this->data['pesan_error'] = 'Tidak ditemukan data';
				$this->load->view('template', $this->data);
			}

		}
		else
		{
			$this->session->set_flashdata('message_warning', 'Filter data terlebih dahulu');
			redirect('jadwal');
		}
			

	}

	public function filter()
	{
		$this->_optionValueFilter();
		$this->data['title'] = 'Filter Data Jadwal';
		//$this->session->unset_userdata('nip_sekarang', '');

		$this->breadcrumbs->push('Filter Data', 'jadwal/filter', 7);

		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);
		//unset search
		$this->session->unset_userdata('key');

		$this->data['keyword'] = "";
		$this->data['semester'] = "";
		$this->data['key'] = "";
		$keyword = $this->input->post('keyword');
		if(!empty($keyword))
		{
			$this->data['semester'] = $this->input->post('semester');
			$this->session->set_userdata('semester', $this->data['semester']);
			//kata kunci
			$this->data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $this->data['keyword']);

		}
		else
		{
			$this->data['semester'] = $this->session->userdata('semester');
			$this->data['keyword'] = $this->session->userdata('keyword');
		}
		$this->load->library('pagination');

        $config['base_url'] = site_url('jadwal/filter/');
        $config['total_rows'] = $this->m_jadwal->filter_total_rows($this->data['semester'], $this->data['keyword']);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = site_url('jadwal/filter');
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
		$jadwal = $this->m_jadwal->filter_index_limit($config['per_page'], $start, $this->data['semester'], $this->data['keyword']);
		if ($jadwal) {
			$table = $this->m_jadwal->buat_tabel($jadwal, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->data['pesan_error'] = 'Tidak ditemukan data';
			$this->load->view('template', $this->data);
		}

	}


	public function index()
	{
		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		//unse filter
		$inArr = array('semester', 'keyword', 'key', 'id_waktu_sekarang', 'id_kelas_sekarang', 'nip_sekarang');
		$this->session->unset_userdata($inArr);

		$this->_optionValueFilter();
		$this->data['keyword'] = '';
		$this->data['key'] = '';
		$this->data['pesan_info'] = '- Klik filter untuk melihat data jadwal pelajaran -';

		$this->load->view('template', $this->data);
	}

	public function jadwalpk()
	{
		$id_waktu = $this->input->post('id_waktu');
		$id_kelas = $this->input->post('id_kelas');

		$this->db->where('id_waktu', $id_waktu);
		$this->db->where('id_kelas', $id_kelas);
		$result = $this->db->get('jadwal_pelajaran');

		if ($result->num_rows() > 0) {
			$this->form_validation->set_message('jadwalpk','Jadwal Kelas Sudah ada/bentrok'); // set your message
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function jadwalpk_edit()
	{
		$id_waktu_baru = $this->input->post('id_waktu');
		$id_kelas_baru = $this->input->post('id_kelas');

		$id_waktu_sekarang = $this->session->userdata('id_waktu_sekarang');
		$id_kelas_sekarang = $this->session->userdata('id_kelas_sekarang');

		if (($id_waktu_baru == $id_waktu_sekarang) AND ($id_kelas_baru == $id_kelas_sekarang)) {
			return TRUE;
		}
		else
		{
			$this->db->where('id_waktu', $id_waktu_baru);
			$this->db->where('id_kelas', $id_kelas_baru);
			$result = $this->db->get('jadwal_pelajaran');

			if ($result->num_rows() > 0) {
				$this->form_validation->set_message('jadwalpk_edit','Jadwal Kelas Sudah ada/bentrok'); // set your message
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}

	}

	public function jadwalguru()
	{
		$id_waktu = $this->input->post('id_waktu');
		$nip = $this->input->post('nip');

		$this->db->where('id_waktu', $id_waktu);
		$this->db->where('nip', $nip);
		$result = $this->db->get('jadwal_pelajaran');

		if ($result->num_rows() > 0) {
			$this->form_validation->set_message('jadwalguru','Jadwal guru sudah ada pada jam yang sama'); // set your message
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function jadwalguru_edit()
	{
		$id_waktu_baru = $this->input->post('id_waktu');
		$nip_baru = $this->input->post('nip');

		$id_waktu_sekarang = $this->session->userdata('id_waktu_sekarang');
		$nip_sekarang = $this->session->userdata('nip_sekarang');

		if (($id_waktu_baru == $id_waktu_sekarang) AND ($nip_baru == $nip_sekarang)) {
			return TRUE;
		}
		else
		{
			$this->db->where('id_waktu', $id_waktu_baru);
			$this->db->where('nip', $nip_baru);
			$result = $this->db->get('jadwal_pelajaran');

			if ($result->num_rows() > 0) {
				$this->form_validation->set_message('jadwalguru_edit','Jadwal guru sudah ada pada jam yang sama'); // set your message
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}

			
	}

	public function _optionValueFilter()
	{
		for ($i=date('Y'); $i >= 2000 ; $i--) { 
			$this->data['opt_filter'][$i] = $i;
		}

		$this->data['opt_semester']['Ganjil'] = 'Ganjil';
		$this->data['opt_semester']['Genap'] = 'Genap';
	}

	public function _optionValueInput()
	{
		//pilih guru
		$guru = $this->m_guru->cari_semua();
		$this->data['opt_guru'][''] = "- Pilih Guru -";
		if ($guru) {
			foreach ($guru as $row) {
				$this->data['opt_guru'][$row->nip] = $row->nama;
			}
			
		}
		//pilih mata pelajaran
		$mapel = $this->m_mapel->cari_semua_sts('reguler');
		$this->data['opt_mapel'][''] = "- Pilih Mata Pelajaran -";
		if ($mapel) {
			foreach ($mapel as $row) {
				$this->data['opt_mapel'][$row->kode_mapel] = $row->nama_mapel;
			}
			
		}

		$semester = $this->session->userdata('semester');
		$keyword = $this->session->userdata('keyword');
		//pilih kelas
		$kelas = $this->m_kelas->cari_kelas($semester, $keyword);
		$this->data['opt_kelas'][''] = "- Pilih Mata Pelajaran -";
		if ($kelas) {
			foreach ($kelas as $row) {
				$this->data['opt_kelas'][$row->id_kelas] = $row->nama_kelas.' '.$row->kelas_bagian;
			}
			
		}


		//pilih waktu
		$waktu = $this->m_waktu->cari_semua();
		$this->data['opt_waktu'][''] = "- Pilih Waktu -";
		if ($waktu) {
			foreach ($waktu as $row) {
				$this->data['opt_waktu'][$row->id_waktu] = $row->hari.', '.$row->jam_masuk.'-'.$row->jam_keluar;
			}
			
		}	
	}

}