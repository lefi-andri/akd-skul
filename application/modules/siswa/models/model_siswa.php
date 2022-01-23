<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_siswa extends CI_Model 
{
	public $db_tabel = 'siswa';

	public function cari($nis)
	{
		return $this->db->where('nis', $nis)
						->get($this->db_tabel)->row();
	}
}