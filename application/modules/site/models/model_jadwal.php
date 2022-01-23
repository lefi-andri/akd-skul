<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_jadwal extends CI_Model 
{
	public $db_tabel = 'jadwal_pelajaran';

    public function semester_aktif()
    {
        return $this->db->get('pengaturan')->row();
    }

    public function cari_jadwal($id, $nip)
    {
        return $this->db->where('id_jadwal', $id)
                        ->where('nip', $nip)
                        ->get($this->db_tabel)->row();
    }

    public function cari_mapel($semester, $tahun)
    {
        return $this->db->select('a.id_jadwal, a.id_waktu, a.id_kelas, a.kode_mapel, a.nip, b.nama_kelas, b.kelas_bagian, c.hari, c.jam_masuk, d.nama_mapel, e.nama')
                        ->from('jadwal_pelajaran a')
                        ->join('kelas b', 'a.id_kelas = b.id_kelas')
                        ->join('waktu c', 'a.id_waktu = c.id_waktu')
                        ->join('mata_pelajaran d', 'a.kode_mapel = d.kode_mapel', 'left')
                        ->join('guru e', 'a.nip = e.nip', 'left')
                        ->where('b.semester', $semester)
                        ->where('b.tahun', $tahun)
                        ->group_by('a.kode_mapel')
                        ->get()->result();

    }

    public function cari($id)
    {
        return $this->db->where('id_jadwal', $id)
                        ->get($this->db_tabel)->row();
    }

    //method hapus
    public function hapus($id)
    {
        $this->db->where('id_jadwal', $id)->delete($this->db_tabel);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
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
    public function update($info, $id)
    {
        $this->db->where('id_jadwal', $id);
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

    public function search_total_rows($semester, $keyword, $key) {
        return $this->db->select('a.id_jadwal, a.id_waktu, a.id_kelas, a.kode_mapel, a.nip, b.nama_kelas, b.kelas_bagian, c.hari, c.jam_masuk, d.nama_mapel, e.nama')
                        ->from('jadwal_pelajaran a')
                        ->join('kelas b', 'a.id_kelas = b.id_kelas')
                        ->join('waktu c', 'a.id_waktu = c.id_waktu')
                        ->join('mata_pelajaran d', 'a.kode_mapel = d.kode_mapel', 'left')
                        ->join('guru e', 'a.nip = e.nip', 'left')
                        ->like('c.hari', $key)
                        ->or_like('b.nama_kelas', $key)
                        ->or_like('b.kelas_bagian', $key)
                        ->or_like('c.jam_masuk', $key)
                        ->or_like('d.nama_mapel', $key)
                        ->or_like('e.nama', $key)
                        ->where('b.semester', $semester)
                        ->where('b.tahun', $keyword)
                        ->count_all_results();
    }

    public function search_index_limit($limit, $start = 0, $semester, $keyword, $key)
    {
        return $this->db->select('a.id_jadwal, a.id_waktu, a.id_kelas, a.kode_mapel, a.nip, b.nama_kelas, b.kelas_bagian, c.hari, c.jam_masuk, d.nama_mapel, e.nama')
                        ->from('jadwal_pelajaran a')
                        ->join('kelas b', 'a.id_kelas = b.id_kelas')
                        ->join('waktu c', 'a.id_waktu = c.id_waktu')
                        ->join('mata_pelajaran d', 'a.kode_mapel = d.kode_mapel', 'left')
                        ->join('guru e', 'a.nip = e.nip', 'left')
                        ->like('c.hari', $key)
                        ->or_like('b.nama_kelas', $key)
                        ->or_like('b.kelas_bagian', $key)
                        ->or_like('c.jam_masuk', $key)
                        ->or_like('d.nama_mapel', $key)
                        ->or_like('e.nama', $key)
                        ->where('b.semester', $semester)
                        ->where('b.tahun', $keyword)
                        ->limit($limit, $start)
                        ->get()->result();

    }

	public function filter_total_rows($semester, $keyword) {
        return $this->db->select('a.id_jadwal, a.id_waktu, a.id_kelas, a.kode_mapel, a.nip, b.nama_kelas, b.kelas_bagian, c.hari, c.jam_masuk, d.nama_mapel, e.nama')
						->from('jadwal_pelajaran a')
						->join('kelas b', 'a.id_kelas = b.id_kelas')
						->join('waktu c', 'a.id_waktu = c.id_waktu')
						->join('mata_pelajaran d', 'a.kode_mapel = d.kode_mapel', 'left')
						->join('guru e', 'a.nip = e.nip', 'left')
						->where('b.semester', $semester)
						->where('b.tahun', $keyword)
						->count_all_results();
    }

    public function filter_index_limit($limit, $start = 0, $semester, $keyword)
	{
		return $this->db->select('a.id_jadwal, a.id_waktu, a.id_kelas, a.kode_mapel, a.nip, b.nama_kelas, b.kelas_bagian, c.hari, c.jam_masuk, d.nama_mapel, e.nama')
						->from('jadwal_pelajaran a')
						->join('kelas b', 'a.id_kelas = b.id_kelas')
						->join('waktu c', 'a.id_waktu = c.id_waktu')
						->join('mata_pelajaran d', 'a.kode_mapel = d.kode_mapel', 'left')
						->join('guru e', 'a.nip = e.nip', 'left')
						->where('b.semester', $semester)
						->where('b.tahun', $keyword)
						->limit($limit, $start)
						->get()->result();

	}

	public function buat_tabel($data, $start)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'HARI, JAM', 'MATA PELAJARAN', 'KELAS', 'GURU', 'AKSI');

        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-tiny w3-hoverable tbl">', 
        	'row_alt_start' => '<tr>',
        	'heading_row_start'   => '<tr class="w3-blue">');

        $this->table->set_template($tmpl);
        if (is_numeric($start)) {
        	$start = $start;
        }
       	else
       	{
       		$start = 0;
       	}

        foreach($data as $row)
        {

            $this->table->add_row(
                ++$start,
				strtoupper($row->hari).", ".$row->jam_masuk,
				strtoupper($row->nama_mapel),
				$row->nama_kelas." ".$row->kelas_bagian,
				strtoupper($row->nama),
				anchor('jadwal/edit/'.$row->id_jadwal, '<i class="fa fa-edit"></i> Edit', array('class' => 'w3-hover-text-red')).' '.anchor('jadwal/hapus/'.$row->id_jadwal, '<i class="fa fa-trash"></i> Delete', array('class' => 'w3-hover-text-red', 'onclick' => "return confirm('Anda yakin ingin menghapus data ini?')"))

            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}


}