<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_nilai_un extends CI_Model 
{
    public $db_tabel = 'nilai_un';

    public function cari_semua()
    {
        return $this->db->order_by('id_nilai', 'ASC')
                        ->get($this->db_tabel)->result();
    }

    public function cari($id)
    {
        return $this->db->where('id_nilai', $id)
                        ->get($this->db_tabel)->row();
    }

    //method hapus
    public function hapus($id)
    {
        $this->db->where('id_nilai', $id)->delete($this->db_tabel);

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
        $this->db->where('id_nilai', $id);
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

    public function search_total_rows($keyword) {
        return $this->db->from('nilai_un a')
                        ->join('siswa b', 'a.nis = b.nis', 'left')
                        ->join('mata_pelajaran c', 'a.kode_mapel = c.kode_mapel', 'left')
                        ->where('a.nis', $keyword)
                        ->count_all_results();
    }

    public function search_index_limit($limit, $start = 0, $keyword)
    {
        return $this->db->select('a.*, b.nama, c.nama_mapel')
                        ->from('nilai_un a')
                        ->join('siswa b', 'a.nis = b.nis', 'left')
                        ->join('mata_pelajaran c', 'a.kode_mapel = c.kode_mapel', 'left')
                        ->where('a.nis', $keyword)
                        ->limit($limit, $start)
                        ->get()->result();
    }

    public function total_rows() {
        return $this->db->from('nilai_un a')
                        ->join('siswa b', 'a.nis = b.nis', 'left')
                        ->join('mata_pelajaran c', 'a.kode_mapel = c.kode_mapel', 'left')
                        ->count_all_results();
    }

    public function index_limit($limit, $start = 0)
    {
        return $this->db->select('a.*, b.nama, c.nama_mapel')
                        ->from('nilai_un a')
                        ->join('siswa b', 'a.nis = b.nis', 'left')
                        ->join('mata_pelajaran c', 'a.kode_mapel = c.kode_mapel', 'left')
                        ->limit($limit, $start)
                        ->get()->result();
    }

    public function buat_tabel($data, $start)
    {
        $this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'NIS', 'NAMA', 'MATA PELAJARAN', 'NILAI', 'AKSI');


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
                $row->nis,
                strtoupper($row->nama),
                strtoupper($row->nama_mapel),
                $row->nilai,
                anchor('nilai-un/edit/'.$row->id_nilai, '<i class="fa fa-edit"></i> Edit', array('class' => 'w3-hover-text-red')).' '.anchor('nilai-un/hapus/'.$row->id_nilai, '<i class="fa fa-trash"></i> Delete', array('class' => 'w3-hover-text-red', 'onclick' => "return confirm('Anda yakin ingin menghapus data ini?')"))

            );

        }

        $tabel = $this->table->generate();

        return $tabel;
    }

}