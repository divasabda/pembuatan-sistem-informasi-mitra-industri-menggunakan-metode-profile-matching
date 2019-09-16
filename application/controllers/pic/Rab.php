<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rab extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('P_model');

    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
      $url=base_url();
      redirect($url);

    }
  }

	public function index()
	{   
		$data['data'] = $this->P_model->getAllRAB();		
		$this->load->view('pic/rab/v_Rab',$data);
	}

    public function ceks()
    {
        $id = $this->input->post('id_proyek');
        $proyek = $this->P_model->hitungDanaProyek($id);
        $dana_r = $this->P_model->hitungRabById($id);
        $sisa = $proyek - $dana_r;
        echo json_encode($sisa);
    }


	public function tambah_rab()
	{
		$data['proyek'] = $this->P_model->getAllProyek();
		$data['kode'] = $this->P_model->buat_kode_rab();

		$this->form_validation->set_rules('id_proyek', 'ID proyek', 'required');
		$this->form_validation->set_rules('nama_rab', 'Nama RAB', 'required|min_length[5]');
		$this->form_validation->set_rules('dana_rab', 'Dana RAB', 'required');

		if($this->form_validation->run() == false )
		{
			$this->load->view('pic/rab/tambah_rab', $data);
		}
		else
		{    
            $id_proyek = $this->input->post('id_proyek',TRUE);
            $id_pic = $this->session->userdata('id_pic');
            $dana_rab = $this->input->post('dana_rab',true);
            $proyek = $this->P_model->hitungDanaProyek($id_proyek);
            $dana_r = $this->P_model->hitungRabById($id_proyek);
            $total_dana = $dana_r + $dana_rab;

        if ($total_dana > $proyek) 
            {
            $this->session->set_flashdata('dana_error', 'TIDAK BOLEH LEBIH DARI DANA PROYEK');  
            redirect('pic/rab/tambah_rab');  
            }


            $data=
            [
                "id_rab" => $this->input->post('id_rab',TRUE),
                "id_proyek" => $id_proyek,
                "id_pic" => $id_pic,
                "nama_rab" => $this->input->post('nama_rab', TRUE),
                "dana_rab" => $dana_rab,
                "status_rab" => $this->input->post('status_rab',TRUE),
            ];

            $this->P_model->tambahRAB($data);
            $this->session->set_flashdata('crud','Ditambah');
            redirect('pic/rab');

		}
	}

	public function get_edit()
	{
		$id_rab = $this->uri->segment(4);
		$result = $this->P_model->getRabById($id_rab);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_rab' => $i['id_rab'],
                'id_proyek' => $i['id_proyek'],
                'nama_rab' => $i['nama_rab'],
                'dana_rab' => $i['dana_rab'],
            );

			$data['proyek'] = $this->P_model->getAllProyek();
            $this->load->view('pic/rab/update_rab', $data); 
        }
	}

	public function Update_rab()
    {
        $id_pic = $this->session->userdata('id_pic');
        $id_proyek = $this->input->post('id_proyek',TRUE);

        $data = 
        [
                "id_rab" => $this->input->post('id_rab',true),
                "id_proyek" => $id_proyek,
                "id_pic" => $id_pic,
                "nama_rab" => $this->input->post('nama_rab',true),
                "dana_rab" => $this->input->post('dana_rab',true),
                "status_rab" => $this->input->post('status_rab',TRUE),
        ];

        $this->P_model->updateRAB($data);
        $this->session->set_flashdata('crud','Diupdate');
        redirect('pic/rab');
    }

    public function hapus()
    {
        $id_rab = $this->uri->segment(4);
        $this->P_model->hapusRAB($id_rab);
        $this->session->set_flashdata('crud','Dihapus');
        redirect('pic/rab');
    }

}

/* End of file Grub_1.php */
/* Location: ./application/controllers/pic/Grub_1.php */