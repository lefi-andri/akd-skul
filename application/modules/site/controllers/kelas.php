<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends Admin_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Data Kelas',
		'main_view'	=> 'kelas/list_kelas'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('breadcrumbs');
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);

		// add breadcrumbs
		$this->breadcrumbs->push('Data Kelas', 'kelas', 8);

		//models
		$this->load->model('model_kelas', 'm_kelas', TRUE);
		$this->load->model('model_guru', 'm_guru', TRUE);
		$this->load->model('model_siswa', 'm_siswa', TRUE);
	}

	public function add_siswa_act($id = NULL)
	{
		if (!empty($id)) {
			$nis = $this->input->post('nis');
			$this->m_kelas->kosong_kelas($id);
			foreach ($nis as $siswa) {
				$info = array(
						'id_kelas' => $id,
						'nis' => $siswa,
						'keterangan' => 'Aktif'
					);
				$this->m_kelas->simpan_siswa($info);

			}
			$this->session->set_flashdata('message_success', 'Berhasil menambah siswa sebanyak : '.count($nis));
			redirect('kelas/add-siswa/'.$id);	
		}
		else
		{
			redirect('kelas/add-siswa/'.$id);
		}
	}

	public function _set_rule_add_siswa()
	{
		$this->form_validation->set_rules('angkatan','Angkatan', 'trim|required');

		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");
	}

	public function tambah_siswa($id = NULL)
	{
		$this->data['title'] = "Pengaturan Data Siswa";
		$this->data['main_view'] = "kelas/list_siswa";
		$this->data['form_action'] = "kelas/add-siswa/".$id;
		$this->data['form_act_add'] = "kelas/add-siswa-act/".$id;

		$this->data['opt_filter'][''] = '- Tahun -';
		for ($i=date('Y'); $i >= 2000 ; $i--) { 
			$this->data['opt_filter'][$i] = $i;
		}

		if ($this->input->post('submit')) {
			$this->_set_rule_add_siswa();

			if ($this->form_validation->run() === TRUE) {
				$thn = $this->input->post('angkatan');

				$siswa = $this->m_siswa->cari_angkatan($thn);
				if ($siswa) {
					$table = $this->m_kelas->buat_tabel_add($siswa, $id);
					$this->data['tabel_data'] = $table;

					$this->load->view('template_up', $this->data);
				}
				else
				{
					$this->session->set_flashdata('message_warning', 'Tidak ada data');
					redirect('kelas/add-siswa/'.$id);
				}

				
			}
			else
			{
				$this->data['pesan_error'] = "Terjadi kesalahan";
				$this->load->view('template_up', $this->data);
			}
			
		}
		else
		{
			$this->load->view('template_up', $this->data);
		}

	}

	public function siswa($id = NULL)
	{
		$this->data['title'] = 'Data Siswa Kelas '.$id;
		$this->data['main_view'] = 'kelas/form_add_siswa';
		$this->data['form_action'] = '';

		// add breadcrumbs
		$this->breadcrumbs->push('Filter Data Siswa', 'kelas/search', 7);
		$this->breadcrumbs->push('Data Siswa', 'kelas/siswa/'.$id, 6);

		//poup ambil kelas
		$attributes = array(
		    'class'     =>  'w3-btn w3-small w3-right',
		    'width'     =>  '800',
		    'height'    =>  '600',
		    'screenx'   =>  '\'+((parseInt(screen.width) - 800)/2)+\'',
		    'screeny'   =>  '\'+((parseInt(screen.height) - 700)/2)+\'',
		);
		$this->data['btn_add'] = anchor_popup('kelas/add-siswa/'.$id, 'Pengaturan Data Siswa', $attributes);

		if (!empty($id)) {
			$kelas = $this->m_kelas->cari($id);
			if ($kelas) {
				foreach ($kelas as $key => $value) {
					$this->data['lst_data'][$key] = $value;
				}
				$guru = $this->data['lst_data']['nip'];
				$rguru = $this->m_guru->cari($guru);
				$this->data['lst_data']['nip'] = $rguru->nama;


				//tampil data siswa
				$siswa = $this->m_kelas->cari_siswa_kelas($id);
				if ($siswa) {
					$this->data['tabel_data'] = $this->m_kelas->buat_tabel_siswa($siswa);
				}
				else
				{
					$this->data['pesan_info'] = 'Tidak ada data siswa';
				}

				$this->load->view('template', $this->data);
			}
			else
			{
				$this->session->set_flashdata('message_warning', 'Kelas tidak ditemukan!');
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

	public function _set_rule_add()
	{
		$this->form_validation->set_rules('id_kelas','ID', 'trim|required|is_unique[kelas.id_kelas]');
		$this->form_validation->set_rules('nama_kelas','Nama Kelas', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kelas_bagian','Kelas Bagian', 'trim|xss_clean');
		$this->form_validation->set_rules('semester','Semester', 'trim|required');
		$this->form_validation->set_rules('tahun','Tahun', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nip','NIP', 'trim|required|xss_clean');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function add()
	{
		$this->load->helper('security');

		$this->data['title'] = 'Tambah Data Kelas';
		$this->data['form_action'] = 'kelas/add';
		$this->data['main_view'] = 'kelas/form_kelas';
		// add breadcrumbs
		$this->breadcrumbs->push('Filter Data Siswa', 'kelas/search', 7);
		$this->breadcrumbs->push('Tambah Data Kelas', 'kelas/add', 6);

		//data guru
		$this->data['opt_guru'][''] = '- Pilih Guru -';
		$guru = $this->m_guru->cari_semua();
		if ($guru) {
			foreach ($guru as $row) {
				$this->data['opt_guru'][$row->nip] = $row->nama;
			}
		}
		else
		{
			$this->data['opt_guru'][''] = '- Data Not Found -';
		}


		if ($this->input->post('submit')) {
			$this->_set_rule_add();

			if ($this->form_validation->run() === TRUE) {
				$info = array(
						'id_kelas' => $this->input->post('id_kelas'),
						'nama_kelas' => $this->input->post('nama_kelas'),
						'kelas_bagian' => $this->input->post('kelas_bagian'),
						'semester' => $this->input->post('semester'),
						'tahun' => $this->input->post('tahun'),
						'nip' => $this->input->post('nip')
					);

				if ($this->m_kelas->simpan($info) === TRUE) {
					$this->session->set_flashdata('message_success', 'Berhasil menambah data.');
					$url = $this->session->userdata('urlback');
					redirect($url);
				}
				else
				{
					$this->data['pesan_error'] = "Terjadi Kesalahan ";
					$this->load->view('template', $this->data);			
				}
			}
			else
			{
				$this->data['pesan_error'] = "Terjadi Kesalahan ";
				$this->load->view('template', $this->data);	
			}
		}
		else
		{
			$this->load->view('template', $this->data);	
		}
	}

	public function _set_rule_edit()
	{
		$this->form_validation->set_rules('id_kelas','ID', 'trim|required|callback_is_id_kelas_exist');
		$this->form_validation->set_rules('nama_kelas','Nama Kelas', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kelas_bagian','Kelas Bagian', 'trim|xss_clean');
		$this->form_validation->set_rules('semester','Semester', 'trim|required');
		$this->form_validation->set_rules('tahun','Tahun', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nip','NIP', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function edit($id = NULL)
	{
		$this->load->helper('security');

		$this->data['title'] = 'Edit Data Kelas';
		$this->data['form_action'] = 'kelas/edit/'.$id;
		$this->data['main_view'] = 'kelas/form_kelas';
		// add breadcrumbs
		$this->breadcrumbs->push('Filter Data Siswa', 'kelas/search', 7);
		$this->breadcrumbs->push('Edit Data Kelas', 'kelas/edit/'.$id, 6);

		//data guru
		$this->data['opt_guru'][''] = '- Pilih Guru -';
		$guru = $this->m_guru->cari_semua();
		if ($guru) {
			foreach ($guru as $row) {
				$this->data['opt_guru'][$row->nip] = $row->nama;
			}
		}
		else
		{
			$this->data['opt_guru'][''] = '- Data Not Found -';
		}

		if (!empty($id)) {
			if ($this->input->post('submit')) {
				$this->_set_rule_edit();

				if($this->form_validation->run() === TRUE)
				{
					$info = array(
							'id_kelas' => $this->input->post('id_kelas'),
							'nama_kelas' => $this->input->post('nama_kelas'),
							'kelas_bagian' => $this->input->post('kelas_bagian'),
							'semester' => $this->input->post('semester'),
							'tahun' => $this->input->post('tahun'),
							'nip' => $this->input->post('nip')
						);
					$id = $this->session->userdata('id_kelas_sekarang');
					if ($this->m_kelas->update($info, $id) === TRUE) {
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
				$kelas = $this->m_kelas->cari($id);
				if ($kelas) {
					foreach ($kelas as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_userdata('id_kelas_sekarang', $kelas->id_kelas);
					//$this->data['pesan_error'] = $this->session->userdata('nip_sekarang');

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
			if($this->m_kelas->hapus($id) == TRUE)
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
		$this->data['title'] = 'Filter Data Kelas';
		//$this->session->unset_userdata('nip_sekarang', '');

		$this->breadcrumbs->push('Filter Data Siswa', 'kelas/search', 7);

		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		$this->data['keyword'] = "";
		$this->data['semester'] = "";
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

        $config['base_url'] = site_url('kelas/search/');
        $config['total_rows'] = $this->m_kelas->search_total_rows($this->data['semester'], $this->data['keyword']);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = site_url('kelas/search');
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
		$kelas = $this->m_kelas->search_index_limit($config['per_page'], $start, $this->data['semester'], $this->data['keyword']);
		if ($kelas) {
			$table = $this->m_kelas->buat_tabel($kelas, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('kelas');
		}

	}

	public function index()
	{
		//UNTUK URL KEMBALI
		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		//unse filter
		$this->session->unset_userdata('semester');
		$this->session->unset_userdata('keyword');

		$this->_optionValueFilter();
		$this->data['keyword'] = '';
		$this->data['pesan_info'] = '- Klik filter untuk melihat data kelas -';
		$this->load->view('template', $this->data);

	}

	public function _optionValueFilter()
	{
		$this->data['opt_filter'][''] = '- Tahun -';
		for ($i=date('Y'); $i >= 2000 ; $i--) { 
			$this->data['opt_filter'][$i] = $i;
		}

		$this->data['opt_semester']['Ganjil'] = 'Ganjil';
		$this->data['opt_semester']['Genap'] = 'Genap';
	}


	public function is_id_kelas_exist()
	{
		$id_kelas_sekarang = $this->session->userdata('id_kelas_sekarang');
		$id_kelas_baru = $this->input->post('id_kelas');

		if($id_kelas_baru == $id_kelas_sekarang)
		{
			return TRUE;
		}
		else
		{
			$query = $this->db->get_where('kelas', array('id_kelas' => $id_kelas_baru));
			if($query->num_rows() > 0)
			{
				$this->form_validation->set_message('is_id_kelas_exist', "ID sudah ada.");
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}

}