<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_nilai extends CI_Model {
	

public function get_nilai($nis)
	{
		return $this->db
						->from('nilai')						
						->where('nis', $nis)
						->get()->result();

	}

public function buat_tabel($data)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'TUGAS', 'UTS', 'UAS');

        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-small w3-hoverable">', 
        	'row_alt_start' => '<tr>',
        	'heading_row_start'   => '<tr class="w3-blue">');

        $this->table->set_template($tmpl);
        $no=1;
        foreach($data as $row)
        {

            $this->table->add_row(
                $no++,
				
				$row->tugas,
				$row->uts,
				$row->uas
				
            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}


}