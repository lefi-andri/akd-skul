<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model
{
	public $db_tabel = 'admin';
	
	public function load_form_rules()
    {
        $form_rules = array(
                            array(
                                'field' => 'username',
                                'label' => 'Username',
                                'rules' => 'required'
                            ),
                            array(
                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'required'
                            ),
                            array(
                                'field' => 'user',
                                'label' => 'User',
                                'rules' => 'required'
                            ),
        );
        return $form_rules;
    }
	
	public function validasi()
    {
        $form = $this->load_form_rules();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	// cek status user, login atau tidak?
    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $query = $this->db->where('username', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get($this->db_tabel);

        if ($query->num_rows() == 1)
        {
			
            $data = array(
				'usernm' => $username, 
				'iduser' => $query->row()->id_admin,
                'status' => $query->row()->status,
				'loginadmin' => TRUE,
                'sttslogin' => TRUE
			);
            // buat data session jika login benar
            $this->session->set_userdata($data);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    // cek login guru
    public function cek_login_guru()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $query = $this->db->where('nip', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get("guru");

        if ($query->num_rows() == 1)
        {
            
            $data = array(
                'usernm' => $username, 
                'status' => $query->row()->status,
                'loginguru' => TRUE,
                'sttslogin' => TRUE
            );
            // buat data session jika login benar
            $this->session->set_userdata($data);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    // LOGIN SISWA
    public function cek_login_siswa()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $query = $this->db->where('nis', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get("siswa");

        if ($query->num_rows() == 1)
        {
            
            $data = array(
                'usernm' => $username, 
                'status' => $query->row()->status,
                'loginguru' => TRUE,
                'sttslogin' => TRUE
            );
            // buat data session jika login benar
            $this->session->set_userdata($data);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
    public function logout()
    {
        $this->session->unset_userdata(array('username' => '', 'sttslogin' => FALSE, 'loginadmin' => FALSE, 'loginguru' => FALSE, 'status' => '', 'iduser' => ''));
        $this->session->sess_destroy();
    }
}

/* PATH : /models/login_model.php
| 	Model login di gunakan untuk user
*/