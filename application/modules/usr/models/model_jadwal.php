<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_jadwal extends CI_Model 
{
	public $db_tabel = 'jadwal_pelajaran';

	
	public function semester_aktif()
	{
		return $this->db->get('pengaturan')->row();
	}

	public function cari($id, $nip)
	{
		return $this->db->where('id_jadwal', $id)
						->where('nip', $nip)
						->get($this->db_tabel)->row();
	}

	public function cari_mapel($nip, $semester, $tahun)
	{
		return $this->db->select('a.id_jadwal, a.id_waktu, a.id_kelas, a.kode_mapel, a.nip, b.nama_kelas, b.kelas_bagian, c.hari, c.jam_masuk, d.nama_mapel, e.nama')
						->from('jadwal_pelajaran a')
						->join('kelas b', 'a.id_kelas = b.id_kelas')
						->join('waktu c', 'a.id_waktu = c.id_waktu')
						->join('mata_pelajaran d', 'a.kode_mapel = d.kode_mapel', 'left')
						->join('guru e', 'a.nip = e.nip', 'left')
						->where('b.semester', $semester)
						->where('b.tahun', $tahun)
						->where('a.nip', $nip)
						->group_by('a.kode_mapel')
						->get()->result();

	}

    public function cari_semua($nip, $semester, $tahun)
	{
		return $this->db->select('a.id_jadwal, a.id_waktu, a.id_kelas, a.kode_mapel, a.nip, b.nama_kelas, b.kelas_bagian, c.hari, c.jam_masuk, d.nama_mapel, e.nama')
						->from('jadwal_pelajaran a')
						->join('kelas b', 'a.id_kelas = b.id_kelas')
						->join('waktu c', 'a.id_waktu = c.id_waktu')
						->join('mata_pelajaran d', 'a.kode_mapel = d.kode_mapel', 'left')
						->join('guru e', 'a.nip = e.nip', 'left')
						->where('b.semester', $semester)
						->where('b.tahun', $tahun)
						->where('a.nip', $nip)
						->get()->result();

	}

	public function buat_tabel($data)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'HARI, JAM', 'MATA PELAJARAN', 'KELAS');

        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-small w3-hoverable">', 
        	'row_alt_start' => '<tr>',
        	'heading_row_start'   => '<tr class="w3-blue">');

        $this->table->set_template($tmpl);
        $no=1;
        foreach($data as $row)
        {

            $this->table->add_row(
                $no++,
				strtoupper($row->hari).", ".$row->jam_masuk,
				strtoupper($row->nama_mapel),
				$row->nama_kelas." ".$row->kelas_bagian
            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}

}