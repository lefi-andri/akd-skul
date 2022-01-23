<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_pengaturan extends CI_Model 
{
	public $db_tabel = 'pengaturan';

	public function cari_set_ta()
	{
		return $this->db->get($this->db_tabel)->row();
	}

	 //update
    public function simpan($info)
    {
        $this->db->update($this->db_tabel, $info);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}