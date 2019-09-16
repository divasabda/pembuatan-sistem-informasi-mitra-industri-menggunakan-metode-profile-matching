<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon_tenan extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('pm/Pm_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        } 
	}

	public function index()
	{
		$data['calon_tenan'] = $this->Pm_model->getAllCalon();
		$this->load->view('admin/v_calon', $data);
	}

	public function hapus_calon()
    {
        $id_pendaftaran = $this->uri->segment(4);
        $this->Pm_model->hapus_hasil($id_pendaftaran);   
        $this->Pm_model->hapus_calon($id_pendaftaran);        
        $this->session->set_flashdata('crud', 'DIHAPUS');  
        redirect('admin/calon_tenan');
    }

}

/* End of file Calon_tenan.php */
/* Location: ./application/controllers/admin/Calon_tenan.php */