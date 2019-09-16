<?php
class Crud_pic extends CI_Controller {
    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pic_model');
        
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);

        }
    }



    public function index()
    {
        
        $data['data_pic'] = $this->Pic_model->getAll();
        $this->load->view('admin/user/pic/user_pic', $data);
    }


    public function tambah()
    {

        $data['kodeunik'] = $this->Pic_model->buat_kode();
        $this->form_validation->set_rules('nama_pic','Nama pic','required');
        $this->form_validation->set_rules('user_pic','User pic','required');
        $this->form_validation->set_rules('pass_pic','Password pic','required');

        if($this->form_validation->run() == false )
        {

          $this->load->view('admin/user/pic/tambah',$data);

        }

        else
        {
            $this->Pic_model->tambahPic();
            $this->session->set_flashdata('crud','DITAMBAH');
            redirect('admin/crud_pic');
        }

    }


    public function get_edit()
    {
        $id_pic = $this->uri->segment(4);
        $result = $this->Pic_model->getPicById($id_pic);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_pic' => $i['id_pic'], 
                'nama_pic' => $i['nama_pic'],
                'user_pic' => $i['user_pic'],
            );
            $this->load->view('admin/user/pic/update', $data); 
        }
        else{
            echo "data tidak ada";
        }
    }

    public function update()
    {

        $id_pic = $this->input->post('id_pic'); 
        $nama_pic = $this->input->post('nama_pic'); 
        $user_pic = $this->input->post('user_pic'); 
        $this->Pic_model->updatePic($id_pic,$nama_pic,$user_pic);
         $this->session->set_flashdata('crud', 'DIUPDATE');    
        redirect('admin/crud_pic'); 
    }


    public function hapus()
    {

        $id_pic = $this->uri->segment(4);   
        $this->Pic_model->hapusPic($id_pic);  
        $this->session->set_flashdata('crud', 'DIHAPUS');  
        redirect('admin/crud_pic');
    }

}
