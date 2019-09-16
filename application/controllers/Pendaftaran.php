<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Pendaftaran_model');
	}

	public function index()
	{
		$data['calon'] = $this->Pendaftaran_model->kode_pendaftaran();
		$data['pertanyaan'] = $this->Pendaftaran_model->pertanyaan();
		$data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];
		$this->load->view('v_pendaftaran',$data);
	}

	public function daftar_calon()
	{

        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('nama_pendaftaran','Nama pendaftaran','required');
        $this->form_validation->set_rules('user_pendaftaran','User pendaftaran','required');
        $this->form_validation->set_rules('pass_pendaftaran','Password pendaftaran','required');
        $this->form_validation->set_rules('alamat_kantor_pendaftaran','Alamat Kantor pendaftaran','required');
                
        	$data['calon'] = $this->Pendaftaran_model->kode_pendaftaran();
        	$data['pertanyaan'] = $this->Pendaftaran_model->pertanyaan();
			$data['fokus'] = ['Pangan','Kesehatan','Obat','Energi','Transportasi','Teknologi Informasi dan Komunikasi','Pertahanan dan Keamanan','Bahan Baku', 'Material Maju'];

        if($this->form_validation->run() == false )
        {

			$this->load->view('v_pendaftaran',$data);
        }
        else
        {
        	$id_pendaftaran = $this->input->post('id_pendaftaran',true);
        	$data= 
                    [ 
                        "id_pendaftaran" => $id_pendaftaran,
                        "email" => $this->input->post('email',true),
                        "nama_pendaftaran" => $this->input->post('nama_pendaftaran',true),
                        "user_pendaftaran" => $this->input->post('user_pendaftaran',true),
                        "pass_pendaftaran" => md5($this->input->post('pass_pendaftaran',true)),
                        "fokus_usaha_pendaftaran" => $this->input->post('fokus_usaha_pendaftaran',true),
                        "alamat_kantor_pendaftaran" => $this->input->post('alamat_kantor_pendaftaran',true),
                    ];

            $this->Pendaftaran_model->tambahCalon($data);

        	$id_pertanyaan = $this->input->post('id_pertanyaan');
        	$jawaban = $this->input->post('jawaban');

            if ($id_pertanyaan){
            	foreach ($id_pertanyaan as $key => $value) {
            		$id_hasil = $this->Pendaftaran_model->id_hasil();
            		$jawab = 
            		[	'id_hasil' => $id_hasil,
            			'id_pendaftaran' => $id_pendaftaran,
            			'id_pertanyaan' => $value,
            			'jawaban' => $jawaban[$value],
            		];
            		$this->Pendaftaran_model->jawaban($jawab);
            	}
            }

            $this->load->view('login_view');
        }

	}

}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */