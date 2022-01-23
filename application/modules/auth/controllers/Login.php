<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
    {
		parent::__construct();
		$this->load->model('model_login', 'login', TRUE);
	}

	public function index()
	{
		$this->data['form_action'] = "login";

        $this->data['opt_user']['admin'] = "Administrator";
        $this->data['opt_user']['guru'] = "Guru";
        $this->data['opt_user']['siswa'] = "Siswa";

		// status user login = BENAR, pindah ke halaman absen
        if ($this->session->userdata('sttslogin') == TRUE)
        {
            if ($this->session->userdata('loginadmin')) {
                redirect('dashboard');
            }
            else
            {
                redirect('profile');
            }
			
		}
		// status login salah, tampilkan form login
        else
        {
            // validasi sukses
            if($this->login->validasi() === TRUE)
            {
                if ($this->input->post('user') == "admin") {
                    // cek di database sukses
                    if($this->login->cek_login() === TRUE)
                    {
                        redirect('dashboard');
                    }
                    // cek database gagal
                    else
                    {
                        $this->data['pesan'] = '<b><i class="fa fa-warning"></i> Warning!</b>
                        <br>Username atau Password salah.';
                        //$this->load->view('login/login_form', $this->data);
                        $this->load->view('login', $this->data);
                    }
                }
                else
                {
                    if ($this->input->post('user') == "guru") {
                    if ($this->login->cek_login_guru()) {
                        redirect('profile');
                    }
                    else
                    {
                        $this->data['pesan'] = '<b><i class="fa fa-warning"></i> Warning!</b>
                        <br>Username atau Password salah.';
                        //$this->load->view('login/login_form', $this->data);
                        $this->load->view('login', $this->data);
                    }
                }
                    
                   

                if ($this->input->post('user') == "siswa") {
                    if ($this->login->cek_login_siswa()) {
                        redirect('profile-siswa');
                    }
                    else
                    {
                        $this->data['pesan'] = '<b><i class="fa fa-warning"></i> Warning!</b>
                        <br>Username atau Password salah.';
                        //$this->load->view('login/login_form', $this->data);
                        $this->load->view('login', $this->data);
                    }
                }








                }
                 
            }
            // validasi gagal
            else
            {
                //$this->load->view('login/login_form', $this->data);
				$this->load->view('login', $this->data);
            }
                
		}

	}


	public function logout()
	{
	    //session_destroy();
        $this->login->logout();
		redirect('login');
	}
}