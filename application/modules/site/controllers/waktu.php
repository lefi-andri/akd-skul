<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu extends Admin_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Data Waktu',
		'main_view'	=> 'waktu/list_waktu'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('breadcrumbs');
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);
		// add breadcrumbs
		$this->breadcrumbs->push('Data Waktu', 'waktu', 8);

		//models
		$this->load->model('model_waktu', 'm_waktu', TRUE);
	}

	public function _set_rule_add()
	{
		$this->form_validation->set_rules('id_waktu','ID', 'trim|required|is_unique[waktu.id_waktu]');
		$this->form_validation->set_rules('hari','Hari', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jam_masuk','Jam Masuk', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jam_keluar','Jam Keluar', 'trim|required');

		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function add()
	{
		$this->load->helper('security');

		$this->data['title'] = 'Tambah Data Waktu';
		$this->data['form_action'] = 'waktu/add';
		$this->data['main_view'] = 'waktu/form_waktu';
		// add breadcrumbs
		$this->breadcrumbs->push('Tambah Data Waktu', 'waktu/add', 7);


		//urlback
		$url = $this->session->userdata('urlback');
		$this->data['urlback'] = $url;


		if ($this->input->post('submit')) {
			$this->_set_rule_add();

			if ($this->form_validation->run() === TRUE) {
				$info = array(
						'id_waktu' => $this->input->post('id_waktu'),
						'hari' => $this->input->post('hari'),
						'jam_masuk' => $this->input->post('jam_masuk'),
						'jam_keluar' => $this->input->post('jam_keluar'),
					);

				if ($this->m_waktu->simpan($info) === TRUE) {
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
		$this->form_validation->set_rules('id_waktu','ID', 'trim|required|callback_is_id_waktu_exist');
		$this->form_validation->set_rules('hari','Hari', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jam_masuk','Jam Masuk', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jam_keluar','Jam Keluar', 'trim|required');

		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function edit($id = NULL)
	{
		$this->load->helper('security');

		$this->data['title'] = 'Edit Data Waktu';
		$this->data['form_action'] = 'waktu/edit/'.$id;
		$this->data['main_view'] = 'waktu/form_waktu';
		// add breadcrumbs
		$this->breadcrumbs->push('Edit Data Waktu', 'waktu/edit/'.$id, 7);

		if (!empty($id)) {
			if ($this->input->post('submit')) {
				$this->_set_rule_edit();

				if($this->form_validation->run() === TRUE)
				{
					$info = array(
							'id_waktu' => $this->input->post('id_waktu'),
							'hari' => $this->input->post('hari'),
							'jam_masuk' => $this->input->post('jam_masuk'),
							'jam_keluar' => $this->input->post('jam_keluar'),
						);
					$id = $this->session->userdata('id_waktu_sekarang');
					if ($this->m_waktu->update($info, $id) === TRUE) {
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
				$waktu = $this->m_waktu->cari($id);
				if ($waktu) {
					foreach ($waktu as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_userdata('id_waktu_sekarang', $waktu->id_waktu);
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
			if($this->m_waktu->hapus($id) == TRUE)
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
		$this->data['title'] = 'Pencarian Data Waktu';
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
		$this->breadcrumbs->push('Cari Data Waktu', 'waktu/search/'.$keyword, 7);

		if ($this->uri->segment(2)=='search') {
            $config['base_url'] = site_url('waktu/search/' . $keyword);
            
        } else {
            $config['base_url'] = site_url('waktu/search/');
        }
		$this->data['keyword'] = $keyword;

        $config['total_rows'] = $this->m_waktu->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '';
        $config['first_url'] = site_url('waktu/search/'.$keyword);
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
		$waktu = $this->m_waktu->search_index_limit($config['per_page'], $start, $keyword);
		if ($waktu) {
			$table = $this->m_waktu->buat_tabel($waktu, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('waktu');
		}

	}

	public function index()
	{
		$this->load->library('pagination');

		$this->data['keyword'] = '';
		//$this->session->unset_userdata('nip_sekarang');

		//UNTUK URL KEMBALI
		$url = $this->uri->uri_string();
		$this->session->set_userdata('urlback', $url);

		$config['base_url'] =	site_url('waktu/page/');
        $config['total_rows'] = $this->m_waktu->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '';
        $config['first_url'] = site_url('waktu');
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
		$waktu = $this->m_waktu->index_limit($config['per_page'], $start);
		if ($waktu) {
			$table = $this->m_waktu->buat_tabel($waktu, $start);
			$this->data['tabel_data'] = $table;

			$this->data['pagination'] = $this->pagination->create_links();

			$this->load->view('template', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Data not found.');
			redirect('waktu');
		}


	}

	public function is_id_waktu_exist()
	{
		$id_waktu_sekarang = $this->session->userdata('id_waktu_sekarang');
		$id_waktu_baru = $this->input->post('id_waktu');

		if($id_waktu_baru == $id_waktu_sekarang)
		{
			return TRUE;
		}
		else
		{
			$query = $this->db->get_where('waktu', array('id_waktu' => $id_waktu_baru));
			if($query->num_rows() > 0)
			{
				$this->form_validation->set_message('is_id_waktu_exist', "ID sudah ada.");
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}

}