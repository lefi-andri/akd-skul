<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_mapel extends CI_Model 
{
	public $db_tabel = 'mata_pelajaran';

	public function cari_semua()
	{
		return $this->db->order_by('kode_mapel', 'ASC')
						->get($this->db_tabel)->result();
	}

    public function cari_semua_sts($sts)
    {
        return $this->db->order_by('kode_mapel', 'ASC')
                        ->where('sts_mapel', $sts)
                        ->get($this->db_tabel)->result();
    }

    public function cari($id)
    {
        return $this->db->where('kode_mapel', $id)
                        ->get($this->db_tabel)->row();
    }

    //method hapus
    public function hapus($id)
    {
        $this->db->where('kode_mapel', $id)->delete($this->db_tabel);

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
        $this->db->where('kode_mapel', $id);
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
        				->like('kode_mapel', $keyword)
                        ->or_like('nama_mapel', $keyword)
                        ->or_like('kelas', $keyword)
        				->count_all_results();
    }

    public function search_index_limit($limit, $start = 0, $keyword)
	{
		return $this->db->order_by('kode_mapel', 'ASC')
						->like('kode_mapel', $keyword)
        				->or_like('nama_mapel', $keyword)
        				->or_like('kelas', $keyword)
						->limit($limit, $start)
						->get($this->db_tabel)->result();
	}

	public function total_rows() {
        return $this->db->from($this->db_tabel)
        				->count_all_results();
    }

	public function index_limit($limit, $start = 0)
	{
		return $this->db->order_by('kode_mapel', 'ASC')
						->limit($limit, $start)
						->get($this->db_tabel)->result();
	}

	public function buat_tabel($data, $start)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'KODE', 'MATA PELAJARAN', 'KETERANGAN', 'SATUS MAPEL', 'AKSI');


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
				$row->kode_mapel,
				strtoupper($row->nama_mapel),
                $row->keterangan,
                $row->sts_mapel, 
                anchor('mapel/edit/'.$row->kode_mapel, '<i class="fa fa-edit"></i> Edit', array('class' => 'w3-hover-text-red')).' '.anchor('mapel/hapus/'.$row->kode_mapel, '<i class="fa fa-trash"></i> Delete', array('class' => 'w3-hover-text-red', 'onclick' => "return confirm('Anda yakin ingin menghapus data ini?')"))

            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}

}