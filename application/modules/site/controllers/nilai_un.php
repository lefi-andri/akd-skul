<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_un extends Admin_Controller 
{
	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Data Nilai UN',
		'main_view'	=> 'nilai_un/list_nilai_un'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('breadcrumbs');
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);
		// add breadcrumbs
		$this->breadcrumbs->push('Manjemen Nilai UN', 'nilai-un', 8);

		//models
		$this->load->model('model_nilai_un', 'm_nilai_un', TRUE);
		$this->load->model('model_mapel', 'm_mapel', TRUE);
	}

	public function _set_rule_edit()
	{
		$this->form_validation->set_rules('nis','NIS', 'trim|required');
		$this->form_validation->set_rules('kode_mapel','Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('nilai','Nilai', 'trim|required|numeric');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function edit($id = NULL)
	{

		$this->data['title'] = 'Edit Data Nilai UN';
		$this->data['form_action'] = 'nilai-un/edit/'.$id;
		$this->data['main_view'] = 'nilai_un/form_nilai_un';
		// add breadcrumbs
		$this->breadcrumbs->push('Edit Data Nilai UN', 'nilai-un/edit/'.$id, 7);

		$this->_opt_value();

		if (!empty($id)) {
			if ($this->input->post('submit')) {
				$this->_set_rule_edit();

				if($this->form_validation->run() === TRUE)
				{
					$info = array(
							'nis' => $this->input->post('nis'),
							'kode_mapel' => $this->input->post('kode_mapel'),
							'nilai' => $this->input->post('nilai'),
						);
					$id = $this->session->userdata('id_nilai_sekarang');
					if ($this->m_nilai_un->update($info, $id) === TRUE) {
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
				$nilaiun = $this->m_nilai_un->cari($id);
				if ($nilaiun) {
					foreach ($nilaiun as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_userdata('id_nilai_sekarang', $nilaiun->id_nilai);

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

	public function _set_rule_add()
	{
		$this->form_validation->set_rules('nis','NIS', 'trim|required');
		$this->form_validation->set_rules('kode_mapel','Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('nilai','Nilai', 'trim|required|numeric');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function add()
	{
		$this->data['title'] = 'Tambah Data Nilai UN';
		$this->data['form_action'] = 'nilai-un/add';
		$this->data['main_view'] = 'nilai_un/form_nilai_un';
		// add breadcrumbs
		$this->breadcrumbs->push('Tambah Data Nilai UN', 'nilai-un/add', 7);

		$this->_opt_value();

		//urlback
		$url = $this->session->userdata('urlback');
		$this->data['urlback'] = $url;


		if ($this->input->post('submit')) {
			$this->_set_rule_add();

			if ($this->form_validation->run() === TRUE) {
				$info = array(
						'nis' => $this->input->post('nis'),
						'kode_mapel' => $this->input->post('kode_mapel'),
						'nilai' => $this->input->post('nilai'),
					);

				if ($this->m_nilai_un->simpan($info) === TRUE) {
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

	//function hapus
	public function hapus($id = NULL)
	{
		if(!empty($id))
		{
			if($this->m_nilai_un->hapus($id) == TRUE)
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
		$this->data['title'] = 'Pencarian Data Nilai UN';
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
		$this->breadcrumbs->push('Cari Data Nilai UN', 'nilai-un/search/'.$keyword, 7);

		if ($this->uri->segment(2)=='search') {
            $config['base_url'] = site_url('nilai-un/search/' . $keyword);
            
        } else {
            $config['base_url'] = site_url('nilai-un/search/');
        }
		$this->data['keyword'] = $keyword;

        $config['total_rows'] = $this->m_nilai_un->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '';
        $config['first_url'] = site_url('nilai-un/search/'.$keyword);
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
		$nilaiun = $this->m_nilai_un->search_index_limit($config['per_page'], $start, $keyword);
		if ($nilaiun) {
			$table = $this->m_nilai_un->buat_tabel($nilaiun, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('nilai-un');
		}

	}

	public function index()
	{
		$this->load->library('pagination');

		$this->data['keyword'] = '';

		//UNTUK URL KEMBALI
		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		$config['base_url'] =	site_url('nilai-un/page/');
        $config['total_rows'] = $this->m_nilai_un->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = site_url('nilai-un');
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
		$nilaiun = $this->m_nilai_un->index_limit($config['per_page'], $start);
		if ($nilaiun) {
			$table = $this->m_nilai_un->buat_tabel($nilaiun, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('nilai-un');
		}
	}

	public function _opt_value()
	{
		//pilih mata pelajaran
		$mapel = $this->m_mapel->cari_semua_sts('un');
		$this->data['opt_mapel'][''] = "- Pilih Mata Pelajaran -";
		if ($mapel) {
			foreach ($mapel as $row) {
				$this->data['opt_mapel'][$row->kode_mapel] = $row->nama_mapel;
			}
			
		}
	}

}