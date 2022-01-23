<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_siswa extends CI_Model 
{
	public $db_tabel = 'siswa';

	public function cari_semua()
	{
		return $this->db->order_by('nis', 'ASC')
						->get($this->db_tabel)->result();
	}

    public function cari($id)
    {
        return $this->db->where('nis', $id)
                        ->get($this->db_tabel)->row();
    }

    public function cari_angkatan($thn)
    {
        return $this->db->where('thn_masuk', $thn)
                        ->get($this->db_tabel)->result();
    }

    //method hapus
    public function hapus($id)
    {
        $this->db->where('nis', $id)->delete($this->db_tabel);

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
        $this->db->where('nis', $id);
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
        return $this->db->from($this->db_tabel)
        				->like('nis', $keyword)
        				->or_like('nama', $keyword)
        				->or_like('tmp_lahir', $keyword)
        				->or_like('alamat', $keyword)
        				->count_all_results();
    }

    public function search_index_limit($limit, $start = 0, $keyword)
	{
		return $this->db->order_by('nis', 'ASC')
						->like('nis', $keyword)
        				->or_like('nama', $keyword)
        				->or_like('tmp_lahir', $keyword)
        				->or_like('alamat', $keyword)
						->limit($limit, $start)
						->get($this->db_tabel)->result();
	}

	public function total_rows() {
        return $this->db->from($this->db_tabel)
        				->count_all_results();
    }

	public function index_limit($limit, $start = 0)
	{
		return $this->db->order_by('nis', 'ASC')
						->limit($limit, $start)
						->get($this->db_tabel)->result();
	}

	public function buat_tabel($data, $start)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'NIS', 'NAMA', 'TAHUN', 'TEMPAT, TGL. LAHIR', 'ALAMAT', 'TELP.', 'AKSI');

        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-tiny w3-hoverable tbl">', 'row_alt_start' => '<tr>', 'heading_row_start'   => '<tr class="w3-blue">');

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

            $tgl1 = $row->tgl_lahir;

            $bulan_array = array('','Januari', 'Februari', 'Maret', 'April', 'Mei', 
            	'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            $bln1 = number_format(date('m', strtotime($tgl1)), 0);
            $bulan1 = strtoupper($bulan_array[$bln1]);

            $tgl_lahir = date('d', strtotime($tgl1))." ".$bulan1." ".date('Y', strtotime($tgl1));


            $this->table->add_row(
                ++$start,
				$row->nis,
				strtoupper($row->nama),
                $row->thn_masuk,
                strtoupper($row->tmp_lahir).', '.$tgl_lahir,
				strtoupper($row->alamat),
				$row->tlp,
                anchor('siswa/edit/'.$row->nis, '<i class="fa fa-edit"></i> Edit', array('class' => 'w3-hover-text-red')).' '.anchor('siswa/hapus/'.$row->nis, '<i class="fa fa-trash"></i> Delete', array('class' => 'w3-hover-text-red', 'onclick' => "return confirm('Anda yakin ingin menghapus data ini?')"))

            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}

}