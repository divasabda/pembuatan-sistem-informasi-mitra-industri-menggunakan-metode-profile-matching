<?php
class Crud_anggota extends CI_Controller {
    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Anggota_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }

        
    }

    public function index()
    {
        if($this->session->userdata('akses') == 'admin')
        {
            $data['data_anggota'] = $this->Anggota_model->getAll();
            $this->load->view('admin/user/anggota/user_anggota', $data);
        }
      else{

        echo "Anda tidak berhak mengakses halaman ini";

      }
        
    }


    public function tambah()
    {
        $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
        $data['kodeunik'] = $this->Anggota_model->buat_kode();
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('nama_anggota','Nama anggota','required');
        $this->form_validation->set_rules('user_anggota','User anggota','required');
        $this->form_validation->set_rules('pass_anggota','Password anggota','required');
        $this->form_validation->set_rules('alamat_kantor','Alamat kantor','required');

        if($this->form_validation->run())
        {


            $data = $this->Anggota_model->buat_kode();
            $id_anggota = $data;
            $level_anggota = 'anggt';
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
                    $data = array('er_pro' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/tambah', $data);
                }
                elseif (!empty($legalitas) && !$this->upload->do_upload('legalitas')) {
                    $data = array('er_legal' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/tambah', $data);
                }
                elseif (!empty($struktur_organisasi) && !$this->upload->do_upload('struktur_organisasi')) {
                    $data = array('er_struk' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/tambah', $data);
                }
                elseif (!empty($branding) && !$this->upload->do_upload('branding')) {
                    $data = array('er_bran' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/tambah', $data);
                }
                elseif (!empty($ijin) && !$this->upload->do_upload('ijin')) {
                    $data = array('er_ijin' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/tambah', $data);
                }

                 else{

                   $data = 
                    [ 
                        "id_anggota" => $id_anggota,
                        "email" => $this->input->post('email',true),
                        "nama_anggota" => $this->input->post('nama_anggota',true),
                        "user_anggota" => $this->input->post('user_anggota',true),
                        "pass_anggota" => md5($this->input->post('pass_anggota',true)),
                        "fokus_usaha" => $this->input->post('fokus_usaha',true),
                        "alamat_kantor" => $this->input->post('alamat_kantor',true),
                        'produk' => (!empty($produk)) ? $produk : NULL,
                        'legalitas' => (!empty($legalitas)) ? $legalitas : NULL,
                        'struktur_organisasi' => (!empty($struktur_organisasi)) ? $struktur_organisasi : NULL,
                        'branding' => (!empty($branding)) ? $branding : NULL,
                        'ijin' => (!empty($ijin)) ? $ijin : NULL,
                        'level_anggota' => $level_anggota,
                    ];

                    $this->Anggota_model->tambahAnggota($data);
                    $this->session->set_flashdata('crud','DITAMBAH');
                    redirect('admin/crud_anggota');
            }

        }

        else
        {
            
            $this->load->view('admin/user/anggota/tambah',$data);  

        }

    }


    public function get_edit()
    {
        $id_anggota = $this->uri->segment(4);
        $result = $this->Anggota_model->getAnggotaById($id_anggota);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_anggota' => $i['id_anggota'],
                'email' => $i['email'],
                'nama_anggota' => $i['nama_anggota'],
                'user_anggota' => $i['user_anggota'],
                'pass_anggota' => $i['pass_anggota'],
                'fokus_usaha' => $i['fokus_usaha'],
                'alamat_kantor' => $i['alamat_kantor'],
                'produk' => $i['produk'],
                'legalitas' => $i['legalitas'],
                'struktur_organisasi' => $i['struktur_organisasi'],
                'branding' => $i['branding'],
                'ijin' => $i['ijin'],
            );

            $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];

            $this->load->view('admin/user/anggota/update', $data); 
        }
        else{
            echo "data tidak ada";
        }
    }

    public function update()
    {

            $id_anggota = $this->input->post('id_anggota');
            $level_anggota = 'anggt';
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
                    $data = array('er_pro' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/update', $data);
                }
                elseif (!empty($legalitas) && !$this->upload->do_upload('legalitas')) {
                    $data = array('er_legal' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/update', $data);
                }
                elseif (!empty($struktur_organisasi) && !$this->upload->do_upload('struktur_organisasi')) {
                    $data = array('er_struk' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/update', $data);
                }
                elseif (!empty($branding) && !$this->upload->do_upload('branding')) {
                    $data = array('er_bran' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/update', $data);
                }
                elseif (!empty($ijin) && !$this->upload->do_upload('ijin')) {
                    $data = array('er_ijin' => $this->upload->display_errors());
                    $data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
                    $this->load->view('admin/user/anggota/update', $data);
                }

                 else{

                   $data = 
                    [ 
                        "id_anggota" => $id_anggota,
                        "email" => $this->input->post('email',true),
                        "nama_anggota" => $this->input->post('nama_anggota',true),
                        "user_anggota" => $this->input->post('user_anggota',true),
                        "fokus_usaha" => $this->input->post('fokus_usaha',true),
                        "alamat_kantor" => $this->input->post('alamat_kantor',true),
                        'produk' => (!empty($produk)) ? $produk : $this->input->post('old_produk',true),
                        'legalitas' => (!empty($legalitas)) ? $legalitas : $this->input->post('old_legal',true),
                        'struktur_organisasi' => (!empty($struktur_organisasi)) ? $struktur_organisasi : $this->input->post('old_struk',true),
                        'branding' => (!empty($branding)) ? $branding : $this->input->post('old_branding',true),
                        'ijin' => (!empty($ijin)) ? $ijin : $this->input->post('old_ijin',true),
                        'level_anggota' => $level_anggota,
                    ];


        $this->Anggota_model->updateAnggota($data);
        $this->session->set_flashdata('crud', 'DIUPDATE');    
        redirect('admin/crud_anggota'); 
        }
    }


    public function hapus()
    {
        $id_anggota = $this->uri->segment(4);
        $cek = $this->Anggota_model->cek($id_anggota)->result();

        if ($cek != null) {
            
            $this->session->set_flashdata('error', 'Tidak Bisa Dihapus');  
            redirect('admin/Crud_anggota');
        }
   
        $this->Anggota_model->hapusAnggota($id_anggota);
        $this->session->set_flashdata('crud', 'DIHAPUS');  
        redirect('admin/crud_anggota');

    }

    public function view()
    {
        $id_anggota = $this->uri->segment(4);
        $result = $this->Anggota_model->getAnggotaById($id_anggota);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
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

            $this->load->view('admin/user/anggota/v_anggota', $data); 
        }
        else{
            echo "data tidak ada";
        
        }
    }
}
