<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_pic extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pim_model');

		    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
	}

	public function index()
	{
		$data['pic'] = $this->Pim_model->getAllPic();
		$this->load->view('pimpinan/user/v_pic', $data);
	}

}

/* End of file V_pic.php */
/* Location: ./application/controllers/pimpinan/V_pic.php */