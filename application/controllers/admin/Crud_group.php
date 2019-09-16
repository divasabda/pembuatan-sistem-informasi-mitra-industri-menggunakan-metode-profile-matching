<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_group extends CI_Controller {

	    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Group_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);

        }
    }

	public function index()
	{
		$data['group1'] = $this->Group_model->getGroup1();
        $data['group2'] = $this->Group_model->getGroup2();
		$this->load->view('admin/group/g_anggota', $data);
	}

	public function tambahGroup()
	{
		$data['kodeunik'] = $this->Group_model->buat_kode();
		$data['pic'] = $this->Group_model->getPIC();
		$data['anggota'] = $this->Group_model->getAnggota();
         $this->load->view('admin/group/tambah',$data);
	}

	public function save()
	{
		   $data = 
            [ 
                "id_group" => $this->input->post('id_group',true),
                "id_anggota" => $this->input->post('id_anggota',true),
                "id_pic" => $this->input->post('id_pic',true),
                "deskripsi" => $this->input->post('deskripsi',true),
 
            ];

            $this->Group_model->tambahGroup($data);
            $this->session->set_flashdata('crud','DITAMBAH');
            redirect('admin/Crud_group');
	}

    public function hapus()
    {

        $id_group = $this->uri->segment(4);
        $cek = $this->Group_model->cek($id_group)->result();

        if ($cek != null) {
            
            $this->session->set_flashdata('error', 'Tidak Bisa Dihapus');  
            redirect('admin/Crud_group');
        }
   
        $this->Group_model->hapusGroup($id_group);
        $this->session->set_flashdata('crud', 'DIHAPUS');  
        redirect('admin/Crud_group');
    }

}

/* End of file Crud_group.php */
/* Location: ./application/controllers/admin/Crud_group.php */