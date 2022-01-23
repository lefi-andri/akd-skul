<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends Admin_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Data Siswa',
		'main_view'	=> 'siswa/list_siswa'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('breadcrumbs');
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);
		// add breadcrumbs
		$this->breadcrumbs->push('Data Siswa', 'siswa', 8);

		//models
		$this->load->model('model_siswa', 'm_siswa', TRUE);
	}

	public function _set_rule_add()
	{
		$this->form_validation->set_rules('nis','NIS', 'trim|required|is_unique[siswa.nis]');
		$this->form_validation->set_rules('nama','Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tmp_lahir','Tempat Lahir', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat','Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nama_ortu','Nama Orang Tua', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tlp','Telepon', 'trim|required|is_numeric');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('thn_masuk','Tahun Masuk', 'trim|required|is_numeric|xss_clean');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function add()
	{
		$this->load->helper('security');

		$this->data['title'] = 'Tambah Data Siswa';
		$this->data['form_action'] = 'siswa/add';
		$this->data['main_view'] = 'siswa/form_siswa';
		// add breadcrumbs
		$this->breadcrumbs->push('Tambah Data Siswa', 'siswa/add', 7);


		//urlback
		$url = $this->session->userdata('urlback');
		$this->data['urlback'] = $url;


		if ($this->input->post('submit')) {
			$this->_set_rule_add();

			if ($this->form_validation->run() === TRUE) {
				$info = array(
						'nis' => $this->input->post('nis'),
						'nama' => $this->input->post('nama'),
						'tmp_lahir' => $this->input->post('tmp_lahir'),
						'tgl_lahir' => $this->input->post('tgl_lahir'),
						'alamat' => $this->input->post('alamat'),
						'nama_ortu' => $this->input->post('nama_ortu'),
						'jk' => $this->input->post('jk'),
						'tlp' => $this->input->post('tlp'),
						'id_jurusan' => '102',
						'kelas' => 'X',
						'thn_masuk' => $this->input->post('thn_masuk')
					);

				if ($this->m_siswa->simpan($info) === TRUE) {
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
		$this->form_validation->set_rules('nis','NIS', 'trim|required|callback_is_nis_exist');
		$this->form_validation->set_rules('nama','Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tmp_lahir','Tempat Lahir', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat','Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nama_ortu','Nama Orang Tua', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tlp','Telepon', 'trim|required|is_numeric');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('thn_masuk','Tahun Masuk', 'trim|required|is_numeric|xss_clean');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function edit($id = NULL)
	{
		$this->load->helper('security');

		$this->data['title'] = 'Edit Data Siswa';
		$this->data['form_action'] = 'siswa/edit/'.$id;
		$this->data['main_view'] = 'siswa/form_siswa';
		// add breadcrumbs
		$this->breadcrumbs->push('Edit Data Siswa', 'siswa/edit/'.$id, 7);

		if (!empty($id)) {
			if ($this->input->post('submit')) {
				$this->_set_rule_edit();

				if($this->form_validation->run() === TRUE)
				{
					$info = array(
							'nis' => $this->input->post('nis'),
							'nama' => $this->input->post('nama'),
							'tmp_lahir' => $this->input->post('tmp_lahir'),
							'tgl_lahir' => $this->input->post('tgl_lahir'),
							'alamat' => $this->input->post('alamat'),
							'nama_ortu' => $this->input->post('nama_ortu'),
							'jk' => $this->input->post('jk'),
							'tlp' => $this->input->post('tlp'),
							'id_jurusan' => '102',
							'kelas' => 'X',
							'thn_masuk' => $this->input->post('thn_masuk')
						);
					$id = $this->session->userdata('nis_sekarang');
					if ($this->m_siswa->update($info, $id) === TRUE) {
						$this->session->set_flashdata('message_success', 'Berhasil menyimpan data.');
						$url = $this->session->userdata('urlback');
						redirect($url);
					}
					else
					{
						$this->data['pesan_error'] = 'Terjadi kesalahan input';
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
				$siswa = $this->m_siswa->cari($id);
				if ($siswa) {
					foreach ($siswa as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_userdata('nis_sekarang', $siswa->nis);
					$this->load->view('template', $this->data);
				}
				else
				{
					$this->session->set_flashdata('message_warning', 'Tidak ditemukan data yang di edit.');
					$url = $this->session->userdata('urlback');
					redirect($url);
				}
				
			}
			//end submit
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
			if($this->m_siswa->hapus($id) == TRUE)
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
		$this->data['title'] = 'Pencarian Data Siswa';
		//$this->session->unset_userdata('nis_sekarang', '');

		//UNTUK URL KEMBALI
		if (!empty($this->uri->segment(3)))
		{
	     	$url = $this->uri->uri_string();   
			$this->session->set_userdata('urlback', $url);
		}
		else
		{
			$url = $this->uri->uri_string().'/'.$this->input->post('keyword');
			$this->session->set_userdata('urlback', $url);
		}

		$keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
		$this->load->library('pagination');

		// add breadcrumbs
		$this->breadcrumbs->push('Cari Data Siswa', 'siswa/search/'.$keyword, 7);

		if ($this->uri->segment(2)=='search') {
            $config['base_url'] = site_url('siswa/search/' . $keyword);
            
        } else {
            $config['base_url'] = site_url('siswa/search/');
        }
		$this->data['keyword'] = $keyword;

        $config['total_rows'] = $this->m_siswa->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '';
        $config['first_url'] = site_url('siswa/search/'.$keyword);
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
		$siswa = $this->m_siswa->search_index_limit($config['per_page'], $start, $keyword);
		if ($siswa) {
			$table = $this->m_siswa->buat_tabel($siswa, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('siswa');
		}

	}

	public function index()
	{
		$this->load->library('pagination');

		$this->data['keyword'] = '';
		//$this->session->unset_userdata('nis_sekarang', '');

		//UNTUK URL KEMBALI
		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		$config['base_url'] =	site_url('siswa/page/');
        $config['total_rows'] = $this->m_siswa->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = site_url('siswa');
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
		$siswa = $this->m_siswa->index_limit($config['per_page'], $start);
		if ($siswa) {
			$table = $this->m_siswa->buat_tabel($siswa, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('siswa');
		}

	}

	public function is_nis_exist()
	{
		$nis_sekarang = $this->session->userdata('nis_sekarang');
		$nis_baru = $this->input->post('nis');

		if($nis_baru == $nis_sekarang)
		{
			return TRUE;
		}
		else
		{
			$query = $this->db->get_where('siswa', array('nis' => $nis_baru));
			if($query->num_rows() > 0)
			{
				$this->form_validation->set_message('is_nis_exist', "NIS sudah ada.");
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}

}