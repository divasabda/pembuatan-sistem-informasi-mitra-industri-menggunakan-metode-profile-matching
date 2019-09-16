<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_group extends CI_Controller {

	public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Group_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);

        }
    }

	public function index()
	{
		$data['group1'] = $this->Group_model->getGroup1();
        $data['group2'] = $this->Group_model->getGroup2();
		$this->load->view('pimpinan/group/v_group', $data);
	}

}

/* End of file V_group.php */
/* Location: ./application/controllers/pimpinan/V_group.php */