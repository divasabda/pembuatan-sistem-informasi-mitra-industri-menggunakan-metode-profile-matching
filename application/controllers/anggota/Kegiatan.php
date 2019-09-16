<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	function __construct(){
	    parent::__construct();
	    $this->load->library('form_validation');
	    $this->load->model('A_model');

    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
      $url=base_url();
      redirect($url);
		}
	}


	public function index()
	{	
		$id_anggota = $this->session->userdata('id_anggota');
		$data['proyek'] = $this->A_model->getDetailProyek($id_anggota);
	    $data['rab'] = $this->A_model->getDetailRab($id_anggota);
	    $this->load->view('anggota/kegiatan/v_kegiatan', $data);
	}

		public function upload_kegiatan()
	{

 		$id_rab = $this->uri->segment(4);
		$rab = $this->A_model->getRabById($id_rab);
        if($rab->num_rows() > 0)
        {
            $i = $rab->row_array();
            $data =  array(
                'id_rab' => $i['id_rab'],
                'bukti_kegiatan' => $i['bukti_kegiatan'],
                'bukti_keuangan' => $i['bukti_keuangan'],
                'bukti_foto' => $i['bukti_foto'],
            );
            $this->load->view('anggota/kegiatan/upload_kegiatan', $data);
        }
	}

	public function saveUpload()
	{
			$id_rab = $this->input->post('id_rab');
            $bukti_kegiatan = $_FILES['bukti_kegiatan']['name'];
            $bukti_keuangan = $_FILES['bukti_keuangan']['name'];
            $bukti_foto = $_FILES['bukti_foto']['name'];

             $this->load->library('upload');

                if (!empty($bukti_kegiatan)) {
                    $config['upload_path'] = './upload/rab/bukti_kegiatan/';
                    $config['allowed_types'] = 'xlsx|xls|pdf';
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '2048';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $bukti_kegiatan);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $id_rab."-bukti-kegiatan.".$ext;
                    $bukti_kegiatan = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('bukti_keuangan');

                    }

                if (!empty($bukti_keuangan)) {
                    $config['upload_path'] = './upload/rab/bukti_keuangan/';
                    $config['allowed_types'] = 'xlsx|xls|doc';
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '2048';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $bukti_keuangan);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $id_rab."-bukti-keuangan.".$ext;
                    $bukti_keuangan = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('bukti_keuangan');

                    }

                if (!empty($bukti_foto)) {
                    $config['upload_path'] = './upload/rab/bukti_foto/';
                    $config['allowed_types'] = 'jpg|jpeg|png|zip';
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = '2048';
                    $config['overwrite'] = TRUE;
                    $x = explode(".", $bukti_foto);
                    $ext = strtolower(end($x));
                    $config['file_name'] = $id_rab."-bukti-Foto.".$ext;
                    $bukti_foto = $config['file_name'];
                    $this->upload->initialize($config);
                    $this->upload->do_upload('bukti_foto');

                    }

                if (!empty($bukti_kegiatan) && !$this->upload->do_upload('bukti_kegiatan')) {

                    	$rab = $this->A_model->getRabById($id_rab);
        				if($rab->num_rows() > 0)
        				{
            				$i = $rab->row_array();
           	 				$data =  array(
			                'id_rab' => $i['id_rab'],
			                'bukti_kegiatan' => $i['bukti_kegiatan'],
			                'bukti_keuangan' => $i['bukti_keuangan'],
			                'bukti_foto' => $i['bukti_foto'],
            				);
           	 				$data['er_kegiatan'] = $this->upload->display_errors();
            				$this->load->view('anggota/kegiatan/upload_kegiatan', $data);
     					}
                }
                elseif (!empty($bukti_keuangan) && !$this->upload->do_upload('bukti_keuangan')) {
                    	$rab = $this->A_model->getRabById($id_rab);
        				if($rab->num_rows() > 0)
        				{
            				$i = $rab->row_array();
           	 				$data =  array(
			                'id_rab' => $i['id_rab'],
			                'bukti_kegiatan' => $i['bukti_kegiatan'],
			                'bukti_keuangan' => $i['bukti_keuangan'],
			                'bukti_foto' => $i['bukti_foto'],
            			);
           	 				$data['er_keuangan'] = $this->upload->display_errors();
            				$this->load->view('anggota/kegiatan/upload_kegiatan', $data);
     					}
                }
                elseif (!empty($bukti_foto) && !$this->upload->do_upload('bukti_foto')) {
                   		$rab = $this->A_model->getRabById($id_rab);
        				if($rab->num_rows() > 0)
        				{
            				$i = $rab->row_array();
           	 				$data =  array(
			                'id_rab' => $i['id_rab'],
			                'bukti_kegiatan' => $i['bukti_kegiatan'],
			                'bukti_keuangan' => $i['bukti_keuangan'],
			                'bukti_foto' => $i['bukti_foto'],
            			);
           	 				$data['er_foto'] = $this->upload->display_errors();
            				$this->load->view('anggota/kegiatan/upload_kegiatan', $data);
     					}
                }

                 else
                {
					
                   $data = 
                    [ 
                        'bukti_kegiatan' => (!empty($bukti_kegiatan)) ? $bukti_kegiatan : $this->input->post('old_kegiatan',true),
                        'bukti_keuangan' => (!empty($bukti_keuangan)) ? $bukti_keuangan : $this->input->post('old_keuangan',true),
                        'bukti_foto' => (!empty($bukti_foto)) ? $bukti_foto : $this->input->post('old_foto',true),
                     ];

                    $this->A_model->updateLaporan($id_rab,$data);
                    $this->session->set_flashdata('upload','BERHASIL');
                    redirect('anggota/kegiatan');
                }
	}

}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/anggota/Kegiatan.php */