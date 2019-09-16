<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

	 public function kode_pendaftaran()
    {
        $this->db->select('RIGHT(pendaftaran.id_pendaftaran,3) as kode', FALSE);
        $this->db->order_by('id_pendaftaran', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pendaftaran'); //cek apakah sudah ada di tabel.
            if($query->num_rows() <> 0)
            {
                //jika kode sudah ada.
                $data = $query->row();
                $kode = intval($data->kode) + 1;
            }
            else
            {
                $kode = 1;
            }

            $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodejadi = "CT".$kodemax;
            return $kodejadi;
    }

 public function id_hasil()
    {
        $this->db->select('RIGHT(hasil.id_hasil,3) as kode', FALSE);
        $this->db->order_by('id_hasil', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('hasil'); //cek apakah sudah ada di tabel.
            if($query->num_rows() <> 0)
            {
                //jika kode sudah ada.
                $data = $query->row();
                $kode = intval($data->kode) + 1;
            }
            else
            {
                $kode = 1;
            }

            $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodejadi = "HS".$kodemax;
            return $kodejadi;
    }

//////mengambil data pertanyaan ///////
	public function pertanyaan()
	{
		$result = $this->db->get('pertanyaan');
        return $result;
	}
////// insert pada calon pendaftgaran ////
	public function tambahCalon($data)
	{
		$this->db->insert('pendaftaran', $data);
	}

////////// insert db hasil jawaban ///////
		public function jawaban($jawaban)
	{
		$this->db->insert('hasil', $jawaban);
	}
}

/* End of file Pendaftaran_model.php */
/* Location: ./application/models/Pendaftaran_model.php */