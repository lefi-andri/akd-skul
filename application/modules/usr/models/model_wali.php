<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_wali extends CI_Model 
{
	public $db_tabel = 'kelas';

	public function cari_semua($nip)
	{
		return $this->db->where('nip', $nip)
						->get($this->db_tabel)->result();
	}

	public function buat_tabel($data)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'ID', 'KELAS', 'SEMESTER', 'TOTAL SISWA', 'VIEW');

        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-small w3-hoverable">', 
        	'row_alt_start' => '<tr>',
        	'heading_row_start'   => '<tr class="w3-blue">');

        $this->table->set_template($tmpl);
        $no=1;
        foreach($data as $row)
        {
        	$tot = $this->db->where('id_kelas', $row->id_kelas)
                            ->from('kelas_detail')
                            ->count_all_results();

            $this->table->add_row(
                $no++,
                $row->id_kelas,
				$row->nama_kelas." ".$row->kelas_bagian,
				$row->semester." ".$row->tahun,
				$tot." Orang",
				anchor('wali-kelas/kelas/'.$row->id_kelas, "Lihat Siswa", array('class' => 'w3-text-blue w3-hover-text-red'))
            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}
}