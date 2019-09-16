<?php
class Page_admin extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Admin_model');
    $this->load->model('Pic_model');
    $this->load->model('Anggota_model');
    $this->load->model('Group_model');
    $this->load->model('Pass_model');
    $this->load->model('pm/Pm_model');

    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);

		}
  }


  public function index(){
    
    if($this->session->userdata('akses') == 'admin')
      {
        $data['admin'] = $this->Admin_model->hitungAdmin();
        $data['pic'] = $this->Pic_model->hitungPic();
        $data['anggota'] = $this->Anggota_model->hitungAnggota();
        $data['group'] = $this->Group_model->hitungGroup();
        $data['calon'] = $this->Pm_model->getJumlahCalon();
        $data['aspek'] = $this->Pm_model->getJumlahAspek();
        $data['sub'] = $this->Pm_model->getJumlahSub();
        $data['bobot'] = $this->Pm_model->getJumlahBobot();
        $data['pertanyaan'] = $this->Pm_model->getJumlahPertanyaan();

    $this->load->view('admin/home_admin',$data);
      }
      else{

        echo "Anda tidak berhak mengakses halaman ini";

      }
  }

  public function save_password()
     { 
      $this->form_validation->set_rules('new','New','required|alpha_numeric');
      $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
        if($this->form_validation->run() == FALSE)
      {
        $this->load->view('admin/ganti_password');

      }
      else
      {
       $cek_old = $this->Pass_model->cek_old_Admin();
       if ($cek_old == False){
        $this->session->set_flashdata('error','Yang Lama Salah!');
        $this->load->view('admin/ganti_password');
       
       }else{
        $this->Pass_model->save_passAdmin();
        $this->session->sess_destroy();
        $this->session->set_flashdata('ganti','berhasil diubah. Silahkan login kembali !' );
        $this->load->view('login_view');
       }//end if valid_user
      }
     }


  public function crud_admin()
  {
    if($this->session->userdata('akses') == 'admin')
      {
          redirect('admin/crud_admin');
      }
      else{

        echo "Anda tidak berhak mengakses halaman ini";

      }
  }

    public function crud_pic()
  {
      if($this->session->userdata('akses') == 'admin')
        {
          redirect('admin/crud_pic');
      }
      else{

        echo "Anda tidak berhak mengakses halaman ini";

      }

  }

     public function crud_anggota()
  {
    if($this->session->userdata('akses') == 'admin')
      {
        redirect('admin/crud_anggota');
      }
      else{

        echo "Anda tidak berhak mengakses halaman ini";

      }
  }

    public function crud_group()
  {
    
    if($this->session->userdata('akses') == 'admin')
      {
        redirect('admin/crud_group');
      }
      else{

        echo "Anda tidak berhak mengakses halaman ini";

      }
  }

      public function v_calon()
  {
    
    if($this->session->userdata('akses') == 'admin')
      {
        redirect('admin/calon_tenan');
      }
      else{

        echo "Anda tidak berhak mengakses halaman ini";

      }
  }

// Crud profile matching
  public function crud_aspek()
  {
    redirect('admin/pm/aspek');
  }

  public function crud_sub()
  {
    redirect('admin/pm/sub_aspek');
  }

  public function crud_bobot()
  {
    redirect('admin/pm/nilai_bobot');
  }

    public function crud_pertanyaan()
  {
    redirect('admin/pm/pertanyaan');
  }

    public function nilai_calon()
  {
    redirect('admin/pm/nilai_calon');
  }

    public function hasil()
  {
    redirect('admin/pm/hasil');
  }
}
