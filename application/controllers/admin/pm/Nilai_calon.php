<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_calon extends CI_Controller {

	public function __construct()
	  {
        parent::__construct();
        $this->load->model('pm/Pm_model');

        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
    }

	public function index()
	{

		$hasil = $this->Pm_model->getNilai();

		$datas = [];
		$id_pendaftaran = "";
		$index = -1;

		foreach ($hasil->result() as $key => $value) {
			if($id_pendaftaran != $value->id_pendaftaran) {
				$index++;
				$datas[$index] = [
					"id" => $value->id_pendaftaran,
					"nama" => $value->nama_pendaftaran,
					//"data" => [],
				];
			}

			$datas[$index]["data"][$value->id_sub] = $value->jawaban;

			$id_pendaftaran = $value->id_pendaftaran;
		}

		$sub = $this->Pm_model->getAllSub();

		$data = [
			"data" => $datas,
			"sub" => $sub
		];


		$this->load->view('admin/pm/nilai_calon/v_nilai_calon',$data);	
	}


	public function perhitungan()
	{

		$profile = [];

		$pendaftar = $this->Pm_model->getAllCalon();
		$aspek = $this->Pm_model->getAllAspek();
		$sub_aspek = $this->Pm_model->getNilai();
		$bot = $this->Pm_model->getAll_N_bobot();


		foreach ($pendaftar->result() as $key => $value) {
			$profile[$value->id_pendaftaran] = array();

			$total = 0;

			foreach ($aspek->result() as $asp => $valueAsp) {
				$profile[$value->id_pendaftaran][$valueAsp->id_aspek] = array();
				$rataCf = 0;
				$rataSf = 0;
				$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["cf"] = 0;
				$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["sf"] = 0;

				foreach ($sub_aspek->result() as $sub => $valueSub) {
					if ($valueSub->id_aspek == $valueAsp->id_aspek && $valueSub->id_pendaftaran == $value->id_pendaftaran) {
						$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"][$valueSub->id_sub]["nilai"] = intval($valueSub->jawaban);
						$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"][$valueSub->id_sub]["gap"] = intval($valueSub->jawaban) - intval($valueSub->nilai_ideal);

						foreach ($bot->result() as $bots => $valueBot) {
							if($profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"][$valueSub->id_sub]["gap"] == $valueBot->selisih) {
								$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"][$valueSub->id_sub]["bobot"] = (float) $valueBot->bobot;
							}
						}

						if($valueSub->jenis == "core"){
							$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["cf"] = $profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["cf"] + $profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"][$valueSub->id_sub]["bobot"];
							$rataCf++;
						} else {
							$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["sf"] = $profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["sf"] + $profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"][$valueSub->id_sub]["bobot"];
							$rataSf++;
						}
					}
				}

				$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["cf"] = $profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["cf"] / $rataCf;
				$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["sf"] = $profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["sf"] / $rataSf;

				$profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["ncsf"] = ($profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["cf"]*($valueAsp->bobot_cf/100))+($profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["sf"]*($valueAsp->bobot_sf/100));

				$total = $total + ($profile[$value->id_pendaftaran][$valueAsp->id_aspek]["sub"]["ncsf"]*($valueAsp->presentase/100));
			}

			$profile[$value->id_pendaftaran]["total"] = $total;

			$data=
				[
					'id_pendaftaran'=>$value->id_pendaftaran,
					'total_nilai'=>$total,
				];
			$this->Pm_model->updateNilai($data);

		}
		
        $this->session->set_flashdata('nilai','NILAI PENDAFTARAN BERHASIL DIHITUNG');
		redirect('admin/pm/hasil');
		// echo "<pre>";
		// var_dump($profile);

	}

}

/* End of file Nilai_calon.php */
/* Location: ./application/controllers/admin/pm/Nilai_calon.php */