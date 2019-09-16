<?php
class Page_pic extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('P_model');
    $this->load->model('Pass_model');

    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
      $url=base_url();
      redirect($url);

    }
  }

  function index(){
    $data['grup'] = $this->P_model->hitungGroupByPic();
    $data['proyek'] = $this->P_model->hitungProyek();
    $data['rab'] = $this->P_model->hitungRab();
    $this->load->view('pic/home_pic', $data);
  }


  public function v_anggota()
  {
    redirect('pic/v_anggotaPic');
  } 

  public function v_proyek()
  {
    redirect('pic/proyek');
  }

  public function v_Rab()
  {
    redirect('pic/Rab');
  }
   
  // public function v_detail()
  // {
  //   redirect('pic/d_rab');
  // }

  public function v_laporan()
  {
    redirect('pic/laporan');
  }

  public function save_password()
       { 
          $this->form_validation->set_rules('new','New','required|alpha_numeric');
          $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
          if($this->form_validation->run() == FALSE)
        {
          $this->load->view('pic/ganti_password');

        }
        else
        {
         $cek_old = $this->Pass_model->cek_old_Pic();
          if ($cek_old == False){
          $this->session->set_flashdata('error','Yang Lama Salah!');
          $this->load->view('pic/ganti_password');
         }else{
          $this->Pass_model->save_passPic();
          $this->session->sess_destroy();
          $this->session->set_flashdata('ganti','berhasil diubah. Silahkan login kembali !' );
          $this->load->view('login_view');
         }
        }
       }      

}
