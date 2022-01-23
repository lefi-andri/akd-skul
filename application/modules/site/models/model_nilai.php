<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_nilai extends CI_Model 
{
	public $db_tabel = 'nilai';

	public function cari_nilai($nis, $kode_mapel, $id_kelas)
	{
		return $this->db->where('nis', $nis)
						->where('kode_mapel', $kode_mapel)
						->where('id_kelas', $id_kelas)
						->get($this->db_tabel)->row();
	}

	public function filter_total_rows($id, $nip) {
        return $this->db->from('jadwal_pelajaran')
        				->where('id_jadwal', $id)
                        ->where('nip', $nip)
        				->count_all_results();
    }

	public function filter_limit($limit, $start = 0, $id, $nip)
    {
        return $this->db->where('id_jadwal', $id)
                        ->where('nip', $nip)
                        ->limit($limit, $start)
                        ->get('jadwal_pelajaran')->result();
    }

	//simpan
    public function simpan($info)
    {
        $this->db->insert($this->db_tabel, $info);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    //update
    public function update($info, $nis, $kode_mapel, $id_kelas)
    {
        $this->db->where('nis', $nis);
        $this->db->where('kode_mapel', $kode_mapel);
        $this->db->where('id_kelas', $id_kelas);
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

	public function buat_input($data)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'NIS', 'NAMA', 'TUGAS', 'UTS', 'UAS');

        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-small w3-hoverable">', 
        	'row_alt_start' => '<tr>',
        	'heading_row_start'   => '<tr class="w3-blue">');

        $this->table->set_template($tmpl);

		$cari_siswa = $this->db->select('a.nis, b.nama')
						->where('a.id_kelas', $data->id_kelas)
						->from('kelas_detail a')
						->join('siswa b', 'a.nis = b.nis', 'left')
						->get()->result();

		if ($cari_siswa) {
			$no = 1;
			foreach ($cari_siswa as $row) {
				$tugas = 0;
				$uts = 0;
				$uas = 0;
				$nilai = $this->cari_nilai($row->nis, $data->kode_mapel, $data->id_kelas);
				if ($nilai) {
					$tugas = $nilai->tugas;
					$uts = $nilai->uts;
					$uas = $nilai->uas;
				}

				$this->table->add_row(
					$no++,
					$row->nis."<input type='hidden' name='nis[]' value='".$row->nis."'>",
					$row->nama,
					"<input type='text' name='tugas[]' class='w3-input w3-border w3-tiny' value='$tugas' placeholder='0.00'>",
					"<input type='text' name='uts[]' class='w3-input w3-border w3-tiny' value='$uts' placeholder='0.00'>",
					"<input type='text' name='uas[]' class='w3-input w3-border w3-tiny' value='$uas' placeholder='0.00'>"
				);
			}

			$tabel = $this->table->generate();

        	return $tabel;
		}



	}

}