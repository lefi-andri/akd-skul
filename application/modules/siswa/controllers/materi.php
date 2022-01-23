<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends Ci_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Upload Materi',
		'main_view'	=> 'materi'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('breadcrumbs');

		$this->load->model('model_materi', 'm_materi', TRUE);
	}

	public function download_materi($id = NULL)
	{
		$this->load->helper('download');
		$nip = $this->session->userdata('usernm');

		if (!empty($id)) {
			$materi = $this->m_materi->cari($id, $nip);
			if ($materi) {
				force_download('./assets/file_upload/'.$materi->nama_file, NULL);
			}
			else
			{
				$this->session->set_flashdata('message_error', 'Tidak ditemukan file');
				redirect('upload-materi-admin');
			}
		}
		else
		{
			redirect('upload-materi-admin');
		}
	}

	public function _rule_upload_edit()
	{
		$this->form_validation->set_rules('nama_materi','Nama Materi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('keterangan','Keterangan', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('nama_file','File', 'trim|required');
		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function edit($id = NULL)
	{
		$this->load->helper("security");
		$this->data['title'] = "Upload Materi Edit";
		$this->data['main_view'] = "form_materi";
		$this->data['form_action'] = "upload-materi-admin/edit/".$id;

		$nip = $this->session->userdata('usernm');

		if (!empty($id)) {
			if ($this->input->post('submit')) {
				$this->_rule_upload_edit();

				if ($this->form_validation->run()) {
					$nmfile = $_FILES['nama_file']['name'];
					//jika file tidak kosong
		            if (!empty($nmfile)) {
		            	$config['file_name']		= rand(1,100).'_'.$nmfile;
		            	$config['upload_path']		= './assets/file_upload/';
			            $config['allowed_types']	= 'pdf|docx|doc|xlsx|xls|ppt|pptx';
			            $config['max_size']			= '2048';

			            $this->load->library('upload', $config);

			            if (!$this->upload->do_upload('nama_file')) {
			            	$this->data['pesan_error'] = array('error' => $this->upload->display_errors());

			            	$this->load->view('template', $this->data);   	
			            }
			            else
			            {
			            	$filenm = $this->upload->data('file_name');
			            	$info = array(
			            			'nama_materi' => $this->input->post('nama_materi'),
			            			'nama_file' => $filenm,
			            			'keterangan' => 'keterangan'
			            		);
			            	$this->m_materi->update($info, $id, $nip);
			            	redirect('upload-materi-admin');
			            }
		            }
		            //jika file kosong
		            else
		            {
		            	$info = array(
		            			'nama_materi' => $this->input->post('nama_materi'),
		            			'keterangan' => 'keterangan'
		            		);
		            	$this->m_materi->update($info, $id, $nip);
		            	redirect('upload-materi-admin');
		            }
				}
				else
				{
					$this->data['pesan_error'] = 'Terjadi kesalahan';
					$this->load->view('template', $this->data);
				}
			}
			else
			{
				$materi = $this->m_materi->cari($id, $nip);
				if ($materi) {
					foreach ($materi as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
				}
				$this->load->view('template', $this->data);
			}
		}
		else
		{
			redirect('upload-materi-admin');	
		}
	}

	public function _rule_add_upload()
	{
		$this->form_validation->set_rules('nama_materi','Nama Materi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('keterangan','Keterangan', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('nama_file','File', 'trim|required');
		
		$this->form_validation->set_error_delimiters("<span class=\"w3-text-red\">* ","</span>");

	}

	public function add_upload()
	{
		$this->load->helper("security");

		$this->data['title'] = "Upload Materi Baru";
		$this->data['main_view'] = "form_materi";
		$this->data['form_action'] = "upload-materi-admin/upload";

		if ($this->input->post('submit')) {
			$this->_rule_add_upload();

			if ($this->form_validation->run()) {
				$nm = $_FILES['nama_file']['name'];

				$config['file_name']		= rand(1,100).'_'.$nm;
				$config['upload_path']		= './assets/file_upload/';
	            $config['allowed_types']	= 'pdf|docx|doc|xlsx|xls|ppt|pptx';
	            $config['max_size']			= '2048';

	            $this->load->library('upload', $config);

	            if (!$this->upload->do_upload('nama_file')) {
	            	$this->data['pesan_error'] = array('error' => $this->upload->display_errors());

	            	$this->load->view('template', $this->data);   	
	            }
	            else
	            {
	            	$filenm = $this->upload->data('file_name');

	            	$nip = $this->session->userdata('usernm');
	            	$info = array(
	            			'nip' => $nip,
	            			'nama_materi' => $this->input->post('nama_materi'),
	            			'tgl_upload' => date('Y-m-d H:i:s'),
	            			'nama_file' => $filenm,
	            			'keterangan' => $this->input->post('keterangan')
	            		);

	            	if ($this->m_materi->simpan($info)) {
	            		redirect('upload-materi-admin');	
	            	}
	            	else
	            	{
	            		$this->load->view('template', $this->data); 
	            	}
	            	
	      
	            }
			}
			else
			{
				$this->load->view('template', $this->data);
			}

				
		}
		else
		{
			$this->load->view('template', $this->data);
		}

	}

	public function index()
	{
		$nip = $this->session->userdata('usernm');

		$materi = $this->m_materi->cari_materi($nip);
		if ($materi) {
			$tabel = $this->m_materi->buat_tabel($materi);
			$this->data['tabel_data'] = $tabel;
		}

		$this->load->view('template', $this->data);
	}

}