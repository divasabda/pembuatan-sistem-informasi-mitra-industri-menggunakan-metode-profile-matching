<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_bobot extends CI_Controller {

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
		$data['n_bobot'] = $this->Pm_model->getAll_N_Bobot();
		$this->load->view('admin/pm/nilai_bobot/v_nilai_bobot', $data);
	}

	public function tambah_nilai()
	{
        $this->form_validation->set_rules('bobot','Bobot','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');

        if($this->form_validation->run() == false )
        {

          $this->load->view('admin/pm/nilai_bobot/tambah_nilai');

        }

        else
        {
        	$data=
        	[
        		'selisih' => $this->input->post('selisih'),
        		'bobot' => $this->input->post('bobot'),
        		'keterangan' => $this->input->post('keterangan'),
        	];

            $this->Pm_model->tambah_nilai($data);
            $this->session->set_flashdata('crud','DITAMBAHKAN');
            redirect('admin/pm/nilai_bobot');
        }

	}

	  public function get_edit()
    {
        $selisih = $this->uri->segment(5);
        $result = $this->Pm_model->get_N_bobot($selisih);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'selisih' => $i['selisih'], 
                'bobot' => $i['bobot'],
                'keterangan' => $i['keterangan'],
            );

            $this->load->view('admin/pm/nilai_bobot/update_nilai', $data); 
        }
        else{
            echo "data tidak ada";
        }
    }

    public function update_nilai()
    {
        $data = 
	        [
        		'selisih' => $this->input->post('selisih'),
        		'bobot' => $this->input->post('bobot'),
        		'keterangan' => $this->input->post('keterangan'),
	        ];
	 
        $this->Pm_model->update_nilai($data);
        $this->session->set_flashdata('crud', 'DIUPDATE');    
        redirect('admin/pm/nilai_bobot');
    }


    public function hapus()
    {
        $selisih = $this->uri->segment(5);   
        $this->Pm_model->hapus_nilai($selisih);  
        $this->session->set_flashdata('crud', 'DIHAPUS');  
        redirect('admin/pm/nilai_bobot');
    }

}

/* End of file Nilai_bobot.php */
/* Location: ./application/controllers/admin/pm/Nilai_bobot.php */