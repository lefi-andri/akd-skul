<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_guru extends CI_Model 
{
	public $db_tabel = 'guru';

	public function cari($nip)
	{
		return $this->db->where('nip', $nip)
						->get($this->db_tabel)->row();
	}
}