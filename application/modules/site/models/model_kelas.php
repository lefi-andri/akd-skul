<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_kelas extends CI_Model 
{
	public $db_tabel = 'kelas';

    /************* Penambahan siswa ke kelas **************************/
    public function cari_siswa_kelas($id)
    {
        return $this->db->query("SELECT a.*, b.nama, b.jk, b.thn_masuk FROM kelas_detail a, siswa b 
                                WHERE a.nis = b.nis AND a.id_kelas = '$id'")
                        ->result();
    }

    public function kosong_kelas($id)
    {
        $this->db->where('id_kelas', $id)->delete('kelas_detail');
    }

	public function cari_semua()
	{
		return $this->db->order_by('id_kelas', 'ASC')
						->get($this->db_tabel)->result();
	}

    public function cari($id)
    {
        return $this->db->where('id_kelas', $id)
                        ->get($this->db_tabel)->row();
    }

    public function simpan_siswa($info)
    {
        $this->db->insert('kelas_detail', $info);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    /************* Penambahan siswa ke kelas **************************/
    public function cari_kelas($semester, $keyword)
    {
        return $this->db->where('semester', $semester)
                        ->where('tahun', $keyword)
                        ->get($this->db_tabel)->result();
    }

    //method hapus
    public function hapus($id)
    {
        $this->db->where('id_kelas', $id)->delete($this->db_tabel);

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
        $this->db->where('id_kelas', $id);
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

	public function search_total_rows($semester, $keyword) {
        return $this->db->from($this->db_tabel)
        				->where('semester', $semester)
                        ->where('tahun', $keyword)
        				->count_all_results();
    }

    public function search_index_limit($limit, $start = 0, $semester, $keyword)
	{
		return $this->db->order_by('id_kelas', 'ASC')
						->where('semester', $semester)
                        ->where('tahun', $keyword)
						->limit($limit, $start)
						->get($this->db_tabel)->result();
	}

	public function total_rows() {
        return $this->db->from($this->db_tabel)
        				->count_all_results();
    }

	public function index_limit($limit, $start = 0)
	{
		return $this->db->order_by('id_kelas', 'ASC')
						->limit($limit, $start)
						->get($this->db_tabel)->result();
	}

	public function buat_tabel($data, $start)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'ID', 'KELAS', 'SEMESTER', 'TAHUN', 'WALI KELAS', 'TOT. SISWA', 'AKSI');


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
            $guru = $this->m_guru->cari($row->nip);
            $tot = $this->db->where('id_kelas', $row->id_kelas)
                            ->from('kelas_detail')
                            ->count_all_results();

            $this->table->add_row(
                ++$start,
				$row->id_kelas,
				strtoupper($row->nama_kelas).' '.$row->kelas_bagian,
				$row->semester,
                $row->tahun,
                strtoupper($guru->nama),
                $tot.' Orang',
                anchor('kelas/siswa/'.$row->id_kelas, '<i class="fa fa-group"></i> Siswa', array('class' => 'w3-hover-text-red')).' '.
                anchor('kelas/edit/'.$row->id_kelas, '<i class="fa fa-edit"></i> Edit', array('class' => 'w3-hover-text-red')).' '.anchor('kelas/hapus/'.$row->id_kelas, '<i class="fa fa-trash"></i> Delete', array('class' => 'w3-hover-text-red', 'onclick' => "return confirm('Anda yakin ingin menghapus data ini?')"))

            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}

    public function buat_tabel_add($data, $id)
    {
        $this->load->library('table');

        //heading tabel
        $this->table->set_heading('#', 'NIS', 'NAMA', 'P/W', 'AGAMA', 'ANGKATAN', 'KELAS');

        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-tiny w3-hoverable tbl">', 'row_alt_start' => '<tr>', 'heading_row_start'   => '<tr class="w3-blue">');

        $this->table->set_template($tmpl);

        foreach($data as $row)
        {
            $kelas = $this->db->where('id_kelas', $id)
                            ->get($this->db_tabel)->row();

            $kls = $this->db->query("SELECT a.*, b.nama_kelas, b.kelas_bagian 
                                    FROM kelas_detail a, kelas b 
                                    WHERE a.id_kelas = b.id_kelas 
                                    AND b.semester = '$kelas->semester' 
                                    AND b.tahun = '$kelas->tahun' 
                                    AND a.nis = '$row->nis'")->row();
            if ($kls) {
                if($id == $kls->id_kelas)
                {
                    $inp = '<input type="checkbox" name="nis[]" value="'.$row->nis.'" checked>';
                    $nmkls = $kls->nama_kelas.' '.$kls->kelas_bagian;    
                }
                else
                {
                    $inp = '<input type="checkbox" name="nis[]" value="'.$row->nis.'" checked disabled>';
                    $nmkls = $kls->nama_kelas.' '.$kls->kelas_bagian;    
                }
            }
            else
            {
                $inp = '<input type="checkbox" name="nis[]" value="'.$row->nis.'">';
                $nmkls = "";
            }

            $this->table->add_row(
                $inp,
                $row->nis,
                strtoupper($row->nama),
                $row->jk,
                strtoupper($row->agama),
                $row->thn_masuk,
                $nmkls
            );

        }

        $tabel = $this->table->generate();

        return $tabel;
    }

    public function buat_tabel_siswa($data)
    {
        $this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'NIS', 'NAMA', 'P/W', 'ANGKATAN', 'KETERANGAN');


        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-tiny w3-hoverable tbl">', 
            'row_alt_start' => '<tr>',
            'heading_row_start'   => '<tr class="w3-blue">');

        $this->table->set_template($tmpl);

        $no = 1;
        foreach($data as $row)
        {
            $this->table->add_row(
                $no++,
                $row->nis,
                strtoupper($row->nama),
                $row->jk,
                $row->thn_masuk,
                $row->keterangan
            );

        }

        $tabel = $this->table->generate();

        return $tabel;
    }

}