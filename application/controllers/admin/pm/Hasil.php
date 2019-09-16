<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

	public function __construct()
	  {
        parent::__construct();
        $this->load->model('pm/Pm_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
    }

	public function index()
	{
		$data['hasil'] = $this->Pm_model->hasil();
		$this->load->view('admin/pm/hasil/v_hasil', $data);		
	}

    public function tambah_calon()
    {
        $id_calon = $this->uri->segment(5);
        $calon = $this->Pm_model->getCalonById($id_calon);
        $id_anggota = $this->Pm_model->buat_kode();
        $level="anggt";
        if($calon->num_rows() > 0)
        {
            $i = $calon->row_array();
            $data =  array(
                'id_anggota' => $id_anggota,
                'email' => $i['email'],
                'nama_anggota' => $i['nama_pendaftaran'],
                'user_anggota' => $i['user_pendaftaran'],
                'pass_anggota' => $i['pass_pendaftaran'],
                'fokus_usaha' => $i['fokus_usaha_pendaftaran'],
                'alamat_kantor' => $i['alamat_kantor_pendaftaran'],
                'level_anggota' => $level,
            );

            $this->Pm_model->tambah_anggota($data);
            $this->Pm_model->hapus_hasil($id_calon);   
        	$this->Pm_model->hapus_calon($id_calon);  
        $this->session->set_flashdata('crud', 'DITAMBAH');  
        redirect('admin/crud_anggota');
        }

    }

}

/* End of file Hasil.php */
/* Location: ./application/controllers/admin/pm/Hasil.php */