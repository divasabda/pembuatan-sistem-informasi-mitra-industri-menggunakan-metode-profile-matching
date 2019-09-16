<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('A_model');
    $this->load->model('Pass_model');

        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
          $url=base_url();
          redirect($url);
        }
	}

	public function index()
	{	
		$profile = $this->A_model->getAnggotaById();
		if($profile->num_rows() > 0)
        {
            $i = $profile->row_array();
            $data =  array(
                'id_anggota' => $i['id_anggota'],
                'email' => $i['email'],
                'nama_anggota' => $i['nama_anggota'],
                'user_anggota' => $i['user_anggota'],
                'fokus_usaha' => $i['fokus_usaha'],
                'alamat_kantor' => $i['alamat_kantor'],
                'produk' => $i['produk'],
                'legalitas' => $i['legalitas'],
                'struktur_organisasi' => $i['struktur_organisasi'],
                'branding' => $i['branding'],
                'ijin' => $i['ijin'],
            );

            $this->load->view('anggota/profile/profile_anggota', $data);
        }
        else
        {
            echo "data tidak ada";
        }
	}

	public function uploadProfile()
	{
		$id_anggota = $this->session->userdata('id_anggota');
        $result = $this->A_model->getProfilePerusahaan($id_anggota);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'produk' => $i['produk'],
                'legalitas' => $i['legalitas'],
                'struktur_organisasi' => $i['struktur_organisasi'],
                'branding' => $i['branding'],
                'ijin' => $i['ijin'],
            );

		$this->load->view('anggota/profile/upload',$data);

        }
	}

	public function saveUpload()
	{
			$id_anggota = $this->session->userdata('id_anggota');
            $produk = $_FILES['produk']['name'];
            $legalitas = $_FILES['legalitas']['name'];
            $struktur_organisasi = $_FILES['struktur_organisasi']['name'];
            $branding = $_FILES['branding']['name'];
            $ijin = $_FILES['ijin']['name'];

             $this->load->library('upload');

                if (!empty($produk)) {
                    $config['upload_path'] = './upload/produk/';
                    $config['allowed_types'] = 'jpg|jpeg|png|zip';
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '2048';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $produk);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $id_anggota."-produk.".$ext;
                    $produk = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('produk');

                    }

                if (!empty($legalitas)) {
                    $config['upload_path'] = './upload/legalitas/';
                    $config['allowed_types'] = 'jpg|jpeg|png|zip';
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '2048';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $legalitas);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $id_anggota."-legalitas.".$ext;
                    $legalitas = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('legalitas');

                    }

                if (!empty($struktur_organisasi)) {
                    $config['upload_path'] = './upload/struktur_organisasi/';
                    $config['allowed_types'] = 'jpg|jpeg|png|zip';
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '2048';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $struktur_organisasi);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $id_anggota."-struktur_organisasi.".$ext;
                    $struktur_organisasi = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('struktur_organisasi');

                    }

                if (!empty($branding)) {
                    $config['upload_path'] = './upload/branding/';
                    $config['allowed_types'] = 'jpg|jpeg|png|zip';
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '2048';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $branding);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $id_anggota."-branding.".$ext;
                    $branding = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('branding');

                    }

                 if (!empty($ijin)) {
                    $config['upload_path'] = './upload/ijin/';
                    $config['allowed_types'] = 'jpg|jpeg|png|zip';
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '2048';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $ijin);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $id_anggota."-ijin.".$ext;
                    $ijin = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('ijin');

                    }

                if (!empty($produk) && !$this->upload->do_upload('produk')) {
                    $result = $this->A_model->getProfilePerusahaan($id_anggota);
                    if($result->num_rows() > 0)
                    {
                        $i = $result->row_array();
                        $data =  array(
                            'produk' => $i['produk'],
                            'legalitas' => $i['legalitas'],
                            'struktur_organisasi' => $i['struktur_organisasi'],
                            'branding' => $i['branding'],
                            'ijin' => $i['ijin'],
                        );
                    $data ['er_produk'] = $this->upload->display_errors();
                    $this->load->view('anggota/profile/upload', $data);
                }

                }
                elseif (!empty($legalitas) && !$this->upload->do_upload('legalitas')) {
                $result = $this->A_model->getProfilePerusahaan($id_anggota);
                    if($result->num_rows() > 0)
                    {
                        $i = $result->row_array();
                        $data =  array(
                            'produk' => $i['produk'],
                            'legalitas' => $i['legalitas'],
                            'struktur_organisasi' => $i['struktur_organisasi'],
                            'branding' => $i['branding'],
                            'ijin' => $i['ijin'],
                        );
                    $data ['er_legal'] = $this->upload->display_errors();
                    $this->load->view('anggota/profile/upload', $data);
                }
                }
                elseif (!empty($struktur_organisasi) && !$this->upload->do_upload('struktur_organisasi')) {
                    $result = $this->A_model->getProfilePerusahaan($id_anggota);
                    if($result->num_rows() > 0)
                    {
                        $i = $result->row_array();
                        $data =  array(
                            'produk' => $i['produk'],
                            'legalitas' => $i['legalitas'],
                            'struktur_organisasi' => $i['struktur_organisasi'],
                            'branding' => $i['branding'],
                            'ijin' => $i['ijin'],
                        );
                    $data ['er_struk'] = $this->upload->display_errors();
                    $this->load->view('anggota/profile/upload', $data);
                }
                }
                elseif (!empty($branding) && !$this->upload->do_upload('branding')) {
                    $result = $this->A_model->getProfilePerusahaan($id_anggota);
                    if($result->num_rows() > 0)
                    {
                        $i = $result->row_array();
                        $data =  array(
                            'produk' => $i['produk'],
                            'legalitas' => $i['legalitas'],
                            'struktur_organisasi' => $i['struktur_organisasi'],
                            'branding' => $i['branding'],
                            'ijin' => $i['ijin'],
                        );
                    $data ['er_bran'] = $this->upload->display_errors();
                    $this->load->view('anggota/profile/upload', $data);
                }
                }
                elseif (!empty($ijin) && !$this->upload->do_upload('ijin')) {
                    $result = $this->A_model->getProfilePerusahaan($id_anggota);
                    if($result->num_rows() > 0)
                    {
                        $i = $result->row_array();
                        $data =  array(
                            'produk' => $i['produk'],
                            'legalitas' => $i['legalitas'],
                            'struktur_organisasi' => $i['struktur_organisasi'],
                            'branding' => $i['branding'],
                            'ijin' => $i['ijin'],
                        );
                    $data ['er_ijin'] = $this->upload->display_errors();
                    $this->load->view('anggota/profile/upload', $data);
                }
                }

                 else
                {			
                   $data = 
                    [ 
                        'produk' => (!empty($produk)) ? $produk : $this->input->post('old_produk',true),
                        'legalitas' => (!empty($legalitas)) ? $legalitas : $this->input->post('old_legal',true),
                        'struktur_organisasi' => (!empty($struktur_organisasi)) ? $struktur_organisasi : $this->input->post('old_struk',true),
                        'branding' => (!empty($branding)) ? $branding : $this->input->post('old_branding',true),
                        'ijin' => (!empty($ijin)) ? $ijin : $this->input->post('old_ijin',true),
                    ];

                    $this->A_model->update($id_anggota,$data);
                    $this->session->set_flashdata('upload','BERHASIL');
                    redirect('anggota/profile');
                }
	}

	  public function save_password()
     { 
      $this->form_validation->set_rules('new','New','required|alpha_numeric');
      $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
        if($this->form_validation->run() == FALSE)
      {
        $this->load->view('anggota/profile/ganti_password');

      }
      else
      {
       $cek_old = $this->Pass_model->cek_old_Anggota();
       if ($cek_old == False){
        $this->session->set_flashdata('error','Yang Lama Salah!');
        $this->load->view('anggota/profile/ganti_password');
       }
       else{
        $this->Pass_model->save_passAnggota();
        $this->session->sess_destroy();
        $this->session->set_flashdata('ganti','berhasil diubah. Silahkan login kembali !' );
        $this->load->view('login_view');
       }//end if valid_user
      }
     }

}

/* End of file Profile.php */
/* Location: ./application/controllers/anggota/Profile.php */