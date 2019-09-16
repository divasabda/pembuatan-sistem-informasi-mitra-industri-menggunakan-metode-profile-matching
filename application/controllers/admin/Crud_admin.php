<?php
class Crud_admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);

        }
      
    }

    public function index()
    {
        
        $data['data_admin'] = $this->Admin_model->getAll();
        $this->load->view('admin/user/admin/user_admin', $data);
    }


    public function tambah()
    {
        $data['level'] = ['admin','pmpin'];
        $data['kodeunik'] = $this->Admin_model->buat_kode();
        $this->form_validation->set_rules('nama_admin','Nama admin','required');
        $this->form_validation->set_rules('user_admin','User admin','required');
        $this->form_validation->set_rules('pass_admin','Password admin','required');

        if($this->form_validation->run() == false )
        {

          $this->load->view('admin/user/admin/tambah',$data);

        }

        else
        {
            $this->Admin_model->tambahAdmin();
            $this->session->set_flashdata('crud','DITAMBAH');
            redirect('admin/crud_admin');
        }

    }


    public function get_edit()
    {
        $id_admin = $this->uri->segment(4);
        $result = $this->Admin_model->getAdminById($id_admin);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_admin' => $i['id_admin'], 
                'nama_admin' => $i['nama_admin'],
                'user_admin' => $i['user_admin'],
                'level_admin' => $i['level_admin'],
            );
            $data['level'] = ['---pilih-level---','admin','pmpin'];
            $this->load->view('admin/user/admin/update', $data); 
        }
        else{
            echo "data tidak ada";
        }
    }

    public function update()
    {

        $id_admin = $this->input->post('id_admin'); 
        $nama_admin = $this->input->post('nama_admin'); 
        $user_admin = $this->input->post('user_admin'); 
        $level_admin = $this->input->post('level_admin'); 
        $this->Admin_model->updateAdmin($id_admin,$nama_admin,$user_admin,$level_admin);
         $this->session->set_flashdata('crud', 'DIUPDATE');    
        redirect('admin/crud_admin'); 
    }


    public function hapus()
    {
        $id_admin = $this->uri->segment(4);   
        $this->Admin_model->hapusAdmin($id_admin);  
        $this->session->set_flashdata('crud', 'DIHAPUS');  
        redirect('admin/crud_admin');
    }

}
