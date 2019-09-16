<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {


	public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('P_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
    }

	public function index()
	{
		$data['proyek'] = $this->P_model->getAllProyek();
		$this->load->view('pic/proyek/v_proyek',$data);
	}

	public function tambahProyek()
	{
        $data['kodeunik'] = $this->P_model->buat_kode();
        $data['anggota'] = $this->P_model->getAnggota();

        $this->form_validation->set_rules('nama_proyek','Nama proyek','required');
        $this->form_validation->set_rules('nilai_proyek','Nilai proyek','required');
        $this->form_validation->set_rules('lama_proyek','Lama proyek','required');
        if($this->form_validation->run() == false )
        {

          $this->load->view('pic/proyek/tambah_proyek',$data);

        }
        else
        {
            $id_pic = $this->session->userdata('id_pic');
            $id_anggota = $this->input->post('id_anggota',true);
            $id_group = $this->P_model->getGroupById($id_anggota);


            $data=
            [
                "id_proyek" => $this->input->post('id_proyek',true),
                "id_anggota" => $id_anggota,
                "id_pic" => $id_pic,
                "id_group" => $id_group,
                "nama_proyek" => $this->input->post('nama_proyek',true),
                "lama_proyek" => $this->input->post('lama_proyek',true),
                "mulai_proyek" => $this->input->post('mulai_proyek',true),
                "selesai_proyek" => $this->input->post('selesai_proyek',true),
                "nilai_proyek" => $this->input->post('nilai_proyek',true),
                "status_proyek" => $this->input->post('status_proyek',true),
            ];

            $this->P_model->tambahProyek($data);
            $this->session->set_flashdata('crud','Ditambah');
            redirect('pic/proyek');
        }
	}

    public function get_edit()
    {
        $id_proyek = $this->uri->segment(4);
        $result = $this->P_model->getProyekById($id_proyek);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_proyek' => $i['id_proyek'], 
                'id_anggota' => $i['id_anggota'],
                'id_group' => $i['id_group'],
                'nama_proyek' => $i['nama_proyek'],
                'lama_proyek' => $i['lama_proyek'],
                'mulai_proyek' => $i['mulai_proyek'],
                'selesai_proyek' => $i['selesai_proyek'],
                'nilai_proyek' => $i['nilai_proyek'],

            );
            $data['anggota'] =$this->P_model->getAnggota();
            $this->load->view('pic/proyek/edit_proyek', $data); 
        }
        else{
            echo "data tidak ada";
        }
    }

    public function editProyek()
    {
        $id_pic = $this->session->userdata('id_pic');
        $id_anggota = $this->input->post('id_anggota',true);
        $id_group = $this->P_model->getGroupById($id_anggota);
        $data = 
        [
                "id_proyek" => $this->input->post('id_proyek',true),
                "id_anggota" => $id_anggota,
                "id_pic" => $id_pic,
                "id_group" => $id_group,
                "nama_proyek" => $this->input->post('nama_proyek',true),
                "lama_proyek" => $this->input->post('lama_proyek',true),
                "mulai_proyek" => $this->input->post('mulai_proyek',true),
                "selesai_proyek" => $this->input->post('selesai_proyek',true),
                "nilai_proyek" => $this->input->post('nilai_proyek',true),
                "status_proyek" => $this->input->post('status_proyek',true),
        ];

        $this->P_model->updateProyek($data);
        $this->session->set_flashdata('crud','Diupdate');
        redirect('pic/proyek');
    }

    public function hapus()
    {
        $id_proyek = $this->uri->segment(4);
        $this->P_model->hapusProyek($id_proyek);
        $this->session->set_flashdata('crud','Dihapus');
        redirect('pic/proyek');
    }

}

/* End of file Proyek.php */
/* Location: ./application/controllers/pic/Proyek.php */