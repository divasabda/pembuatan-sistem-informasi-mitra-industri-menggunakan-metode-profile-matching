<?php
class Page_anggota extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('A_model');
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
  }

 public function index(){
    $pic = $this->A_model->getPIC();

        if($pic->num_rows() > 0)
        {
            $i = $pic->row_array();
            $data =  array(
                'nama_pic' => $i['nama_pic'],
            );
          $data['proyek']= $this->A_model->hitungProyek();
          $data['rab']= $this->A_model->hitungRab();
          $this->load->view('anggota/home_anggota',$data);
        }

  }

  public function profile()
  {
    redirect('anggota/profile');
  }

  public function kegiatan()
  {
    redirect('anggota/kegiatan');
  }

}
