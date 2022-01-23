<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends Admin_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Data Guru',
		'main_view'	=> 'guru/list_guru'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('breadcrumbs');
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);
		// add breadcrumbs
		$this->breadcrumbs->push('Data Guru', 'guru', 8);

		//models
		$this->load->model('model_guru', 'm_guru', TRUE);
	}

	public function _set_rule_add()
	{
		$this->form_validation->set_rules('nip','NIP', 'trim|required|is_unique[guru.nip]');
		$this->form_validation->set_rules('nama','Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tmp_lahir','Tempat Lahir', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat','Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tlp','Telepon', 'trim|required|is_numeric');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('status','Status', 'trim|required');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function add()
	{
		$this->load->helper('security');

		$this->data['title'] = 'Tambah Data Guru';
		$this->data['form_action'] = 'guru/add';
		$this->data['main_view'] = 'guru/form_guru';
		// add breadcrumbs
		$this->breadcrumbs->push('Tambah Data Guru', 'guru/add', 7);


		//urlback
		$url = $this->session->userdata('urlback');
		$this->data['urlback'] = $url;


		if ($this->input->post('submit')) {
			$this->_set_rule_add();

			if ($this->form_validation->run() === TRUE) {
				$info = array(
						'nip' => $this->input->post('nip'),
						'nama' => $this->input->post('nama'),
						'tmp_lahir' => $this->input->post('tmp_lahir'),
						'tgl_lahir' => $this->input->post('tgl_lahir'),
						'alamat' => $this->input->post('alamat'),
						'jk' => $this->input->post('jk'),
						'tlp' => $this->input->post('tlp'),
						'status' => $this->input->post('status'),
					);

				if ($this->m_guru->simpan($info) === TRUE) {
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
		$this->form_validation->set_rules('nip','NIP', 'trim|required|callback_is_nip_exist');
		$this->form_validation->set_rules('nama','Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tmp_lahir','Tempat Lahir', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat','Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tlp','Telepon', 'trim|required|is_numeric');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('status','Status', 'trim|required');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function edit($id = NULL)
	{
		$this->load->helper('security');

		$this->data['title'] = 'Edit Data Guru';
		$this->data['form_action'] = 'guru/edit/'.$id;
		$this->data['main_view'] = 'guru/form_guru';
		// add breadcrumbs
		$this->breadcrumbs->push('Edit Data Guru', 'guru/edit/'.$id, 7);

		if (!empty($id)) {
			if ($this->input->post('submit')) {
				$this->_set_rule_edit();

				if($this->form_validation->run() === TRUE)
				{
					$info = array(
							'nip' => $this->input->post('nip'),
							'nama' => $this->input->post('nama'),
							'tmp_lahir' => $this->input->post('tmp_lahir'),
							'tgl_lahir' => $this->input->post('tgl_lahir'),
							'alamat' => $this->input->post('alamat'),
							'jk' => $this->input->post('jk'),
							'tlp' => $this->input->post('tlp'),
							'status' => $this->input->post('status'),
						);
					$id = $this->session->userdata('nip_sekarang');
					if ($this->m_guru->update($info, $id) === TRUE) {
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
					$this->data['pesan_error'] = 'Terjadi kesalahan input ';
					$this->load->view('template', $this->data);
				}
					
				

			}
			else
			{
				$guru = $this->m_guru->cari($id);
				if ($guru) {
					foreach ($guru as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_userdata('nip_sekarang', $guru->nip);

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
			if($this->m_guru->hapus($id) == TRUE)
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
		$this->data['title'] = 'Pencarian Data Guru';
		//$this->session->unset_userdata('nip_sekarang', '');

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
		$this->breadcrumbs->push('Cari Data Guru', 'guru/search/'.$keyword, 7);

		if ($this->uri->segment(2)=='search') {
            $config['base_url'] = site_url('guru/search/' . $keyword);
            
        } else {
            $config['base_url'] = site_url('guru/search/');
        }
		$this->data['keyword'] = $keyword;

        $config['total_rows'] = $this->m_guru->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '';
        $config['first_url'] = site_url('guru/search/'.$keyword);
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
		$guru = $this->m_guru->search_index_limit($config['per_page'], $start, $keyword);
		if ($guru) {
			$table = $this->m_guru->buat_tabel($guru, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('guru');
		}

	}

	public function index()
	{
		$this->load->library('pagination');

		$this->data['keyword'] = '';

		//UNTUK URL KEMBALI
		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		$config['base_url'] =	site_url('guru/page/');
        $config['total_rows'] = $this->m_guru->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = site_url('guru');
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
		$guru = $this->m_guru->index_limit($config['per_page'], $start);
		if ($guru) {
			$table = $this->m_guru->buat_tabel($guru, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('guru');
		}


	}

	public function is_nip_exist()
	{
		$nip_sekarang = $this->session->userdata('nip_sekarang');
		$nip_baru = $this->input->post('nip');

		if($nip_baru == $nip_sekarang)
		{
			return TRUE;
		}
		else
		{
			$query = $this->db->get_where('guru', array('nip' => $nip_baru));
			if($query->num_rows() > 0)
			{
				$this->form_validation->set_message('is_nip_exist', "NIP sudah ada.");
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}

}