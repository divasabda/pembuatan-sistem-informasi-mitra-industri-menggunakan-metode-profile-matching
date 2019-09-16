<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_anggotaPic extends CI_Controller {

	
	public function __construct()
    {

        parent::__construct();
        $this->load->model('P_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
    }

	public function index()
	{
		$data['group1'] = $this->P_model->getGroup1();
        $data['group2'] = $this->P_model->getGroup2();
		$this->load->view('pic/anggota/v_anggota', $data);
	}

    public function view()
    {
        $id_anggota = $this->uri->segment(4);
        $result = $this->P_model->getAnggotaById($id_anggota);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_anggota' => $i['id_anggota'],
                'email' => $i['email'],
                'nama_anggota' => $i['nama_anggota'],
                'user_anggota' => $i['user_anggota'],
                'fokus_usaha' => $i['fokus_usaha'],
                'alamat_kantor' => $i['alamat_kantor'],
                'produk' => $i['produk'],
                'legalitas' => $i['legalitas'],
                'struktur_organisasi' => $i['struktur_organisasi'],
                'branding' => $i['branding'],
                'ijin' => $i['ijin'],
            );

            $this->load->view('pic/anggota/detail_anggota', $data); 
        }
        else{
            echo "data tidak ada";
        
        }
    }

}

/* End of file V_anggota.php */
/* Location: ./application/controllers/pic/V_anggota.php */