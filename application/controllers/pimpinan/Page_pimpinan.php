<?php
class Page_pimpinan extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Pim_model');

    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
  }

  function index(){
    $data['pic'] = $this->Pim_model->hitungPic();
    $data['anggota'] = $this->Pim_model->hitungAnggota();
    $data['proyek'] = $this->Pim_model->hitungProyek();
    $data['grafik'] = $this->Pim_model->get_tanggal();

    // echo '<pre>';
    // var_dump($data);
           
    $this->load->view('pimpinan/home_pimpinan',$data);
  }

  public function v_pic()
  {
    redirect('pimpinan/v_pic');
  }

    public function v_anggota()
  {
    redirect('pimpinan/v_anggota');
  }

    public function v_group()
  {
    redirect('pimpinan/v_group');
  }

    public function v_laporan()
  {
    redirect('pimpinan/v_laporan');
  }  

}
