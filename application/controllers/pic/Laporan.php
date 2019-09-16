<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('P_model');

    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
      $url=base_url();
      redirect($url);
    }

  }

	public function index()
	{
		$data['data'] = $this->P_model->getAllProyek();
		$this->load->view('pic/laporan/v_laporan',$data);	
	}

	public function laporan_detail()
	{

		$id_proyek = $this->input->get('id_proyek', TRUE);

        if ($_GET) {
            sleep(1);
	        $data['proyek'] = $this->P_model->getDetailProyek($id_proyek);
	        $data['rab'] = $this->P_model->getDetailRab($id_proyek);
	        $this->load->view('pic/laporan/hasil_laporan', $data);

        }
	}


}

/* End of file Laporan.php */
/* Location: ./application/controllers/pic/Laporan.php */