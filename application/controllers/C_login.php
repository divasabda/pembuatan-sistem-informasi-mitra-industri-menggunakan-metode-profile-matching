<?php
class C_login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	function index(){
		$this->load->view('login_view');
	}

	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_admin=$this->login_model->auth_admin($username,$password);
        $cek_anggota=$this->login_model->auth_anggota($username,$password);
        $cek_pic=$this->login_model->auth_pic($username,$password);

		//jika login sebagai dosen
        if($cek_admin->num_rows() > 0){ 
				$data_login=$cek_admin->row_array();
        		$this->session->set_userdata('masuk',TRUE);
		         if($data_login['level_admin']=='admin'){ //Akses admin
		            $this->session->set_userdata('akses','admin');
		            $this->session->set_userdata('id_admin',$data_login['id_admin']);
					$this->session->set_userdata('ses_nama',$data_login['nama_admin']);
		            redirect('admin/page_admin');

		         }else{ //akses pimpinan
		            $this->session->set_userdata('akses','pmpin');
		            $this->session->set_userdata('ses_nama',$data_login['nama_admin']);
		            redirect('pimpinan/page_pimpinan');
		         }
		     }

       		elseif($cek_anggota->num_rows() > 0){ 
				$data_login=$cek_anggota->row_array();
        		$this->session->set_userdata('masuk',TRUE);
		         if($data_login['level_anggota']=='anggt'){ //Akses anggota
		            $this->session->set_userdata('akses','anggt');
		            $this->session->set_userdata('id_anggota',$data_login['id_anggota']);
					$this->session->set_userdata('ses_nama',$data_login['nama_anggota']);
		            redirect('anggota/page_anggota');

		         }
		       }

       			else{ //jika login sebagai pic
					if($cek_pic->num_rows() > 0){
							$data_login=$cek_pic->row_array();
        					$this->session->set_userdata('masuk',TRUE);
							$this->session->set_userdata('akses','pic');
							$this->session->set_userdata('id_pic',$data_login['id_pic']);
							$this->session->set_userdata('ses_nama',$data_login['nama_pic']);
							redirect('pic/page_pic');
					}else{  // jika username dan password tidak ditemukan atau salah
							$url=base_url();
							$this->session->set_flashdata('gagal','Username Atau Password Salah');
							redirect($url);
					}
       			}

    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

}
