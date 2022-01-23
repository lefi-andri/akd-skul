<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_siswa extends CI_Model 
{
	public $db_tabel = 'siswa';

    public function cari($id)
    {
        return $this->db->where('nis', $id)
                        ->get($this->db_tabel)->row();
    }

	public function cari_siswa_kelas($nip, $id)
    {
        return $this->db->query("SELECT a.id_kelas, c.* 
        						FROM kelas_detail a, kelas b, siswa c
                                WHERE a.id_kelas = b.id_kelas 
                                AND a.nis = c.nis 
                                AND a.id_kelas = '$id' 
                                AND b.nip = '$nip'")->result();
    }

    public function cari_kelas($nip, $id)
    {
        return $this->db->where('nip', $nip)
                        ->where('id_kelas', $id)
                        ->get('kelas')->row();
    }

    public function buat_tabel($data)
	{
		$this->load->library('table');

        //heading tabel
        $this->table->set_heading('NO', 'NIS', 'NAMA', 'TMP, TGL LAHIR', 'NAMA ORTU', 'P/W', 'TELP.');

        $tmpl = array( 'table_open' => '<table class="w3-table w3-striped w3-bordered w3-small w3-hoverable">', 
        	'row_alt_start' => '<tr>',
        	'heading_row_start'   => '<tr class="w3-blue">');

        $this->table->set_template($tmpl);
        $no=1;
        foreach($data as $row)
        {
            $this->table->add_row(
                $no++,
                anchor('wali-kelas/lapor-siswa/'.$row->id_kelas.'/'.$row->nis, $row->nis, array('class' => 'w3-text-blue w3-hover-text-red')),
				strtoupper($row->nama),
				strtoupper($row->tmp_lahir)." ".$row->tgl_lahir,
				strtoupper($row->nama_ortu),
				$row->jk,
				$row->tlp
            );

        }

        $tabel = $this->table->generate();

        return $tabel;
	}

    public function tampil_nilai($nis)
    {
        $data = '';

        $sqlKels = $this->db->select('a.nis, a.id_kelas, b.nama_kelas, b.kelas_bagian')
                            ->from('kelas_detail a')
                            ->join('kelas b', 'a.id_kelas = b.id_kelas', 'left')
                            ->where('a.nis', $nis)
                            ->get()->result();

        if ($sqlKels) {
            $data .= '<ul class="w3-navbar w3-green">';
            foreach ($sqlKels as $row) {
                $data .= '<li><a href="#" class="tablink" onclick="openCity(event, \''.$row->id_kelas.'\');">'.$row->nama_kelas.' '.$row->kelas_bagian.'</a></li>';
            }
            $data .= '</ul>';

            foreach ($sqlKels as $row) {
                $data .= '<div id="'.$row->id_kelas.'" class="w3-container city">
                                <p>Kelas : '.$row->nama_kelas.' '.$row->kelas_bagian.'</p>
                              <table class="w3-table w3-tiny w3-border w3-hoverable w3-striped">
                                    <thead>
                                    <tr class="w3-yellow">
                                        <th>NO</th>
                                        <th>KODE</th>
                                        <th>MATA PELAJARAN</th>
                                        <th>TUGAS</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                    </tr>
                                    </thead>
                                    <tbody>';

                       $sqlNilai = $this->db->select('a.kode_mapel, c.nama_mapel, b.tugas, b.uts, b.uas')
                                            ->from('jadwal_pelajaran a')
                                            ->join('nilai b', 'a.kode_mapel = b.kode_mapel', 'left')
                                            ->join('mata_pelajaran c', 'a.kode_mapel = c.kode_mapel', 'left')
                                            ->where('a.id_kelas', $row->id_kelas)
                                            ->where('b.nis', $row->nis)
                                            ->group_by('a.kode_mapel')
                                            ->get()->result();
                        $no = 1;
                        foreach ($sqlNilai as $row2) {
                            $data .= '<tr>
                                        <td>'.$no++.'</td>
                                        <td>'.$row2->kode_mapel.'</td>
                                        <td>'.$row2->nama_mapel.'</td>
                                        <td>'.$row2->tugas.'</td>
                                        <td>'.$row2->uts.'</td>
                                        <td>'.$row2->uas.'</td>
                                    </tr>';
                        }

                    $data .= '</tbody>
                            </table>
                        </div>';
            }
        }

        return $data;

        
    }

}