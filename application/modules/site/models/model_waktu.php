<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_waktu extends CI_Model 
{
	public $db_tabel = 'waktu';

	public function cari_semua()
	{
		return $this->db->order_by('id_waktu', 'ASC')
						->get($this->db_tabel)->result();
	}

    public function cari($id)
    {
        return $this->db->where('id_waktu', $id)
                        ->get($this->db_tabel)->row();
    }

    //method hapus
    public function hapus($id)
    {
        $this->db->where('id_waktu', $id)->delete($this->db_tabel);

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
        $this->db->where('id_waktu', $id);
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
        				->like('id_waktu', $keyword)
        				->or_like('hari', $keyword)
        				->or_like('jam_masuk', $keyword)
        				->or_like('jam_keluar', $keyword)
        				->count_all_results();
    }

    public function search_index_limit($limit, $start = 0, $keyword)
	{
		return $this->db->order_by('id_waktu', 'ASC')
						->like('id_waktu', $keyword)
        				->or_like('hari', $keyword)
        				->or_like('jam_masuk', $keyword)
        				->or_like('jam_keluar', $keyword)
						->limit($limit, $start)
						->get($this->db_tabel)->result();
	}

	public function total_rows() {
        return $this->db->from($this->db_tabel)
        				->count_all_results();
    }

	public function index_limit($limit, $start = 0)
	{
		return $this->db->order_by('id_waktu', 'ASC')
						->limit($limit, $start)
						->get($this->db_tabel)->result();
	}

	public function buat_tabel($data, $start)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'ID', 'HARI', 'JAM MASUK', 'JAM KELUAR', 'AKSI');


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
				$row->id_waktu,
				strtoupper($row->hari),
				$row->jam_masuk,
                $row->jam_keluar,
                anchor('waktu/edit/'.$row->id_waktu, '<i class="fa fa-edit"></i> Edit', array('class' => 'w3-hover-text-red')).' '.anchor('waktu/hapus/'.$row->id_waktu, '<i class="fa fa-trash"></i> Delete', array('class' => 'w3-hover-text-red', 'onclick' => "return confirm('Anda yakin ingin menghapus data ini?')"))

            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}

}