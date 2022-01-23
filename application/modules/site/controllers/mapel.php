<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends Admin_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Data Mata Pelajaran',
		'main_view'	=> 'mapel/list_mapel'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('breadcrumbs');
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);
		// add breadcrumbs
		$this->breadcrumbs->push('Mata Pelajaran', 'mapel', 8);

		//models
		$this->load->model('model_mapel', 'm_mapel', TRUE);
	}

	public function _set_rule_add()
	{
		$this->form_validation->set_rules('kode_mapel','Kode Mata Pelajaran', 'trim|required|xss_clean|is_unique[mata_pelajaran.kode_mapel]');
		$this->form_validation->set_rules('nama_mapel','Nama Pelajaran', 'trim|required|xss_clean');
		$this->form_validation->set_rules('keterangan','Keterangan', 'xss_clean');
		$this->form_validation->set_rules('sts_mapel','Status', 'required');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function add()
	{
		$this->load->helper('security');

		$this->data['title'] = 'Tambah Mata Pelajaran';
		$this->data['form_action'] = 'mapel/add';
		$this->data['main_view'] = 'mapel/form_mapel';
		// add breadcrumbs
		$this->breadcrumbs->push('Tambah Mata Pelajaran', 'mapel/add', 7);


		if ($this->input->post('submit')) {
			$this->_set_rule_add();

			if ($this->form_validation->run() === TRUE) {
				$info = array(
						'kode_mapel' => $this->input->post('kode_mapel'),
						'nama_mapel' => $this->input->post('nama_mapel'),
						'keterangan' => $this->input->post('keterangan'),
						'sts_mapel' => $this->input->post('sts_mapel')
					);

				if ($this->m_mapel->simpan($info) === TRUE) {
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
		$this->form_validation->set_rules('kode_mapel','Kode Mata Pelajaran', 'trim|required|xss_clean|callback_is_kode_mapel_exist');
		$this->form_validation->set_rules('nama_mapel','Nama Pelajaran', 'trim|required|xss_clean');
		$this->form_validation->set_rules('keterangan','Keterangan', 'xss_clean');
		$this->form_validation->set_rules('sts_mapel','Status', 'required');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function edit($id = NULL)
	{
		$this->load->helper('security');

		$this->data['title'] = 'Edit Mata Pelajaran';
		$this->data['form_action'] = 'mapel/edit/'.$id;
		$this->data['main_view'] = 'mapel/form_mapel';
		// add breadcrumbs
		$this->breadcrumbs->push('Edit Mata Pelajaran', 'mapel/edit/'.$id, 7);

		if (!empty($id)) {
			if ($this->input->post('submit')) {
				$this->_set_rule_edit();

				if($this->form_validation->run() === TRUE)
				{
					$info = array(
							'kode_mapel' => $this->input->post('kode_mapel'),
							'nama_mapel' => $this->input->post('nama_mapel'),
							'keterangan' => $this->input->post('keterangan'),
							'sts_mapel' => $this->input->post('sts_mapel')
						);

					if ($this->m_mapel->update($info, $id) === TRUE) {
						$this->session->set_flashdata('message_success', 'Berhasil menyimpan data.');
						$url = $this->session->userdata('urlback');
						redirect($url);
					}
					else
					{
						$this->data['pesan_error'] = 'Gagal mengupdate';
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
				$mapel = $this->m_mapel->cari($id);
				if ($mapel) {
					foreach ($mapel as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_userdata('kode_mapel_sekarang', $mapel->kode_mapel);

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
			if($this->m_mapel->hapus($id) == TRUE)
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
		$this->data['title'] = 'Pencarian Mata Pelajaran';
		//$this->session->unset_userdata('kode_mapel_sekarang', '');

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
		$this->breadcrumbs->push('Cari Data Guru', 'mapel/search/'.$keyword, 7);

		if ($this->uri->segment(2)=='search') {
            $config['base_url'] = site_url('mapel/search/' . $keyword);
            
        } else {
            $config['base_url'] = site_url('mapel/search/');
        }
		$this->data['keyword'] = $keyword;

        $config['total_rows'] = $this->m_mapel->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '';
        $config['first_url'] = site_url('mapel/search/'.$keyword);
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
		$mapel = $this->m_mapel->search_index_limit($config['per_page'], $start, $keyword);
		if ($mapel) {
			$table = $this->m_mapel->buat_tabel($mapel, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('mapel');
		}

	}

	public function index()
	{
		$this->load->library('pagination');

		$this->data['keyword'] = '';
		//$this->session->unset_userdata('kode_mapel_sekarang', '');

		//UNTUK URL KEMBALI
		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		$config['base_url'] =	site_url('mapel/page/');
        $config['total_rows'] = $this->m_mapel->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = site_url('mapel');
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
		$mapel = $this->m_mapel->index_limit($config['per_page'], $start);
		if ($mapel) {
			$table = $this->m_mapel->buat_tabel($mapel, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('mapel');
		}


	}

	public function is_kode_mapel_exist()
	{
		$kode_mapel_sekarang = $this->session->userdata('kode_mapel_sekarang');
		$kode_mapel_baru = $this->input->post('kode_mapel');

		$ss = $this->session->userdata('loginuser');

		if($kode_mapel_baru == $kode_mapel_sekarang)
		{
			return TRUE;
		}
		else
		{
			$query = $this->db->get_where('mata_pelajaran', array('kode_mapel' => $kode_mapel_baru));
			if($query->num_rows() > 0)
			{
				$this->form_validation->set_message('is_kode_mapel_exist', "Kode Mata Pelajaran sudah ada. ".$kode_mapel_sekarang);
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}

}