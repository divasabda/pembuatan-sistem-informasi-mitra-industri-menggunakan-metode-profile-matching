<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_aspek extends CI_Controller {

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
		$data['sub_aspek'] = $this->Pm_model->getAllSub();
		$this->load->view('admin/pm/sub_aspek/v_sub', $data);
	}

	 public function tambah_sub()
    {
        $data['kodeunik'] = $this->Pm_model->buat_kode_sub();
        $data['aspek'] = $this->Pm_model->getAllAspek();
        $data['jen'] = ['core','secondary'];
        $this->form_validation->set_rules('id_aspek','Nama aspek','required');
        $this->form_validation->set_rules('nama_sub','Nama sub aspek','required');
        $this->form_validation->set_rules('nilai_ideal','Nilai ideal','required');
        $this->form_validation->set_rules('jenis','Jenis','required');

        if($this->form_validation->run() == false )
        {
          $this->load->view('admin/pm/sub_aspek/tambah_sub',$data);
        }

        else
        {
        	$data =
	        	[	
	        		'id_sub' => $this->input->post('id_sub'),
	        		'id_aspek' => $this->input->post('id_aspek'),
	        		'nama_sub' => $this->input->post('nama_sub'),
	        		'nilai_ideal' => $this->input->post('nilai_ideal'),
	        		'jenis' => $this->input->post('jenis'),
	        	];

            $this->Pm_model->tambah_sub($data);
            $this->session->set_flashdata('crud','DITAMBAH');
            redirect('admin/pm/sub_aspek');
        }

    }


    public function get_edit()
    {
        $id_sub = $this->uri->segment(5);
        $result = $this->Pm_model->getSubById($id_sub);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_sub' => $i['id_sub'], 
                'id_aspek' => $i['id_aspek'],
                'nama_sub' => $i['nama_sub'],
                'nilai_ideal' => $i['nilai_ideal'],
                'jenis' => $i['jenis'],
            );

            $data['aspek'] = $this->Pm_model->getAllAspek();
            $data['jen'] = ['core','secondary'];
            $this->load->view('admin/pm/sub_aspek/update_sub', $data); 
        }
        else{
            echo "data tidak ada";
        }
    }

    public function update_sub()
    {
        $data = 
	        [
	        		'id_sub' => $this->input->post('id_sub'),
	        		'id_aspek' => $this->input->post('id_aspek'),
	        		'nama_sub' => $this->input->post('nama_sub'),
	        		'nilai_ideal' => $this->input->post('nilai_ideal'),
	        		'jenis' => $this->input->post('jenis'),	
	        ];
	 
        $this->Pm_model->update_sub($data);
        $this->session->set_flashdata('crud', 'DIUPDATE');    
        redirect('admin/pm/sub_aspek');
    }


    public function hapus()
    {
        $id_sub = $this->uri->segment(5);   
        $this->Pm_model->hapus_sub($id_sub);  
        $this->session->set_flashdata('crud', 'DIHAPUS');  
        redirect('admin/pm/sub_aspek');
    }

}

/* End of file Sub_aspek.php */
/* Location: ./application/controllers/admin/pm/Sub_aspek.php */