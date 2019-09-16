<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspek extends CI_Controller {

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
		$data['aspek'] = $this->Pm_model->getAllAspek();
		$this->load->view('admin/pm/aspek/v_aspek', $data);
		
	}
	 public function tambah_aspek()
    {
        $data['kodeunik'] = $this->Pm_model->buat_kode_aspek();
        $this->form_validation->set_rules('nama_aspek','Nama aspek','required');
        $this->form_validation->set_rules('presentase','Presentase','required');
        $this->form_validation->set_rules('bobot_cf','nilai cf','required');
        $this->form_validation->set_rules('bobot_sf','nilai sf','required');

        if($this->form_validation->run() == false )
        {

          $this->load->view('admin/pm/aspek/tambah_aspek',$data);

        }

        else
        {
        	$data=
        	[
        		'id_aspek' => $this->input->post('id_aspek'),
        		'nama_aspek' => $this->input->post('nama_aspek'),
        		'presentase' => $this->input->post('presentase'),
        		'bobot_cf' => $this->input->post('bobot_cf'),
        		'bobot_sf' => $this->input->post('bobot_sf'),
        	];

            $this->Pm_model->tambah_aspek($data);
            $this->session->set_flashdata('crud','DITAMBAHKAN');
            redirect('admin/pm/aspek');
        }

    }


    public function get_edit()
    {
        $id_aspek = $this->uri->segment(5);
        $result = $this->Pm_model->getAspekById($id_aspek);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_aspek' => $i['id_aspek'], 
                'nama_aspek' => $i['nama_aspek'],
                'presentase' => $i['presentase'],
                'bobot_cf' => $i['bobot_cf'],
                'bobot_sf' => $i['bobot_sf'],
            );
            $this->load->view('admin/pm/aspek/update_aspek', $data); 
        }
        else{
            echo "data tidak ada";
        }
    }

    public function update_aspek()
    {

        $data= 
        [
        	'id_aspek' => $this->input->post('id_aspek'),
        	'nama_aspek' => $this->input->post('nama_aspek'),
            'presentase' => $this->input->post('presentase'),
            'bobot_cf' => $this->input->post('bobot_cf'),
            'bobot_sf' => $this->input->post('bobot_sf'),	
        ];
 
        $this->Pm_model->update_aspek($data);
        $this->session->set_flashdata('crud', 'DIUPDATE');    
        redirect('admin/pm/aspek');
    }


    public function hapus()
    {
        $id_admin = $this->uri->segment(5);   
        $this->Pm_model->hapus_aspek($id_admin);  
        $this->session->set_flashdata('crud', 'DDIHAPUS');  
        redirect('admin/pm/aspek');
    }

}

/* End of file Aspek.php */
/* Location: ./application/controllers/admin/pm/Aspek.php */