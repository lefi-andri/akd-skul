<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_materi extends CI_Model 
{
	public $db_tabel = 'materi';

	public function cari_materi($nip)
	{
		return $this->db->get($this->db_tabel)->result();
	}

    public function cari($id, $nip)
    {
        return $this->db->where('id_materi', $id)                        
                        ->get($this->db_tabel)->row();
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
    public function update($info, $id, $nip)
    {
        $this->db->where('id_materi', $id);        
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
//method hapus
    public function hapus($id)
    {
        $this->db->where('id_materi', $id)->delete($this->db_tabel);


        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }





	public function buat_tabel($data)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO','NIP', 'NAMA MATERI', 'TGL. UPLOAD', 'KETERANGAN', 'DOWNLOAD');

        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-small w3-hoverable">', 
        	'row_alt_start' => '<tr>',
        	'heading_row_start'   => '<tr class="w3-blue">');

        $this->table->set_template($tmpl);
        $no=1;
        foreach($data as $row)
        {

            $this->table->add_row(
                $no++,
                $row->nip,
                $row->nama_materi,
                $row->tgl_upload,
                $row->keterangan,
                anchor('upload-materi-admin/download/'.$row->id_materi, '<i class="fa fa-download"></i> Download', array('class' => 'w3-text-blue w3-hover-text-red')).' '.
                anchor('upload-materi-admin/edit/'.$row->id_materi, '<i class="fa fa-edit"></i> Edit', array('class' => 'w3-text-blue w3-hover-text-red')).' '.
                anchor('upload-materi-admin/hapus/'.$row->id_materi, '<i class="fa fa-edit"></i> Delete', array('class' => 'w3-text-blue w3-hover-text-red'))
            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}

}