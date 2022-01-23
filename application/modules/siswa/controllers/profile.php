<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Ci_Controller 
{

	public $data = array(
		'pesan' 	=> '',
		'title' 	=> 'Profie',
		'main_view'	=> 'profile'
	);

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('breadcrumbs');

		$this->load->model('model_siswa', 'm_siswa', TRUE);
	}

	public function index()
	{
		// unshift crumb
		$this->breadcrumbs->unshift('Dashboard', '/', 9);

		$nis = $this->session->userdata('usernm');
		$profile = $this->m_siswa->cari($nis);
		if ($profile) {
			foreach ($profile as $key => $value) {
				$this->data['lst_data'][$key] = $value;
			}

			$tgl1 = $this->data['lst_data']['tgl_lahir'];

            $bulan_array = array('','Januari', 'Februari', 'Maret', 'April', 'Mei', 
            	'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            $bln1 = number_format(date('m', strtotime($tgl1)), 0);
            $bulan1 = strtoupper($bulan_array[$bln1]);

            $this->data['lst_data']['tgl_lahir'] = date('d', strtotime($tgl1))." ".$bulan1." ".date('Y', strtotime($tgl1));
		}
		
		$this->load->view('template', $this->data);
	}

}