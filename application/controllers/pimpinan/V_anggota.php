<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_anggota extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pim_model');

		    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
	}

	public function index()
	{
		$data['tenan'] = $this->Pim_model->getAllAnggota();
		$this->load->view('pimpinan/user/v_anggota', $data);
	}

    public function view()
    {
        $id_anggota = $this->uri->segment(4);
        $result = $this->Pim_model->getAnggotaById($id_anggota);
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

            $this->load->view('pimpinan/user/detail_anggota', $data); 
        }
        else{
            echo "data tidak ada";
        
        }
    }

}

/* End of file V_anggota.php */
/* Location: ./application/controllers/pimpinan/V_anggota.php */