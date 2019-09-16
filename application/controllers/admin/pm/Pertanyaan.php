<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pm/Pm_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
      
    }

	public function index()
	{
		$data['pertanyaan'] = $this->Pm_model->getAllPertanyaan();
		$this->load->view('admin/pm/pertanyaan/v_pertanyaan', $data);
	}

	public function tambah_pertanyaan()
	{
		$data['kode_pertanyaan'] = $this->Pm_model->kodepertanyaan();
		$data['sub_aspek'] = $this->Pm_model->getAllSub();
		$this->form_validation->set_rules('id_sub', 'Id Sub Aspek', 'required');
		$this->form_validation->set_rules('nama_pertanyaan', 'Pertanyaan', 'required');
		if ($this->form_validation->run() == false ) 
		{
			$this->load->view('admin/pm/pertanyaan/tambah_pertanyaan', $data);
		}
		else
		{
			$data = 
			[
				'id_pertanyaan' => $this->input->post('id_pertanyaan'),
				'id_sub' => $this->input->post('id_sub'),
				'nama_pertanyaan' => $this->input->post('nama_pertanyaan'),
				
			];
			$this->Pm_model->tambah_pertanyaan($data);
			$this->session->set_flashdata('crud','DITAMBAHKAN');
            redirect('admin/pm/pertanyaan');
		}

	}

	public function get_edit()
	{
		$id_pertanyaan = $this->uri->segment(5);
		$result = $this->Pm_model->get_Pertanyaan($id_pertanyaan);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_pertanyaan' => $i['id_pertanyaan'], 
                'id_sub' => $i['id_sub'],
                'nama_pertanyaan' => $i['nama_pertanyaan'],
            );
			$data['sub_aspek'] = $this->Pm_model->getAllSub();
            $this->load->view('admin/pm/pertanyaan/update_pertanyaan', $data); 
        }
        else{
            echo "data tidak ada";
        }

	}

	public function update_pertanyaan()
    {
        $data = 
	        [
				'id_pertanyaan' => $this->input->post('id_pertanyaan'),
				'id_sub' => $this->input->post('id_sub'),
				'nama_pertanyaan' => $this->input->post('nama_pertanyaan'),
	        ];
	 
        $this->Pm_model->update_pertanyaan($data);
        $this->session->set_flashdata('crud', 'DIUPDATE');    
        redirect('admin/pm/pertanyaan');
    }

    public function hapus_pertanyaan()
    {
        $id_pertanyaan = $this->uri->segment(5);   
        $this->Pm_model->hapus_pertanyaan($id_pertanyaan);  
        $this->session->set_flashdata('crud', 'DIHAPUS');  
        redirect('admin/pm/pertanyaan');
    }
}

/* End of file Pertanyaan.php */
/* Location: ./application/controllers/admin/pm/Pertanyaan.php */