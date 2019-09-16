<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pm_model extends CI_Model {
//////////// mengambil data semua calon tenan ////////
        public function getAllCalon()
    {
        $result = $this->db->get('pendaftaran');
        return $result;
    }

    public function getNilai()
    {

        $this->db->select('pendaftaran.id_pendaftaran, pendaftaran.nama_pendaftaran, sub_aspek.id_sub, sub_aspek.id_aspek, hasil.jawaban, sub_aspek.nilai_ideal, sub_aspek.jenis');
        $this->db->from('pendaftaran');
        $this->db->join('hasil', 'hasil.id_pendaftaran = pendaftaran.id_pendaftaran', 'left');
        $this->db->join('pertanyaan', 'pertanyaan.id_pertanyaan = hasil.id_pertanyaan', 'left');
        $this->db->join('sub_aspek', 'sub_aspek.id_sub = pertanyaan.id_sub', 'left');
        $result = $this->db->get();
        return $result;
    }

    public function updateNilai($data)
    {   
        $this->db->where('id_pendaftaran',$data['id_pendaftaran']);
        $this->db->update('pendaftaran', $data);
    }

    public function hapus_calon($id_pendaftaran)
    {
        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $this->db->delete('pendaftaran');
    }

    public function hapus_hasil($id_pendaftaran)
    {
        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $this->db->delete('hasil');
    }

    public function getJumlahCalon(){
        $query = $this->db->query("SELECT 'Count(Distinct id_pendaftaran)' as id_pendaftaran FROM pendaftaran");
        return $query->num_rows();
    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(anggota.id_anggota,3) as kode', FALSE);
        $this->db->order_by('id_anggota', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('anggota'); //cek apakah sudah ada di tabel.
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
            $kodejadi = "AG".$kodemax;
            return $kodejadi;
    }


    public function getCalonById($id_calon)
    {
        $query = $this->db->get_where('pendaftaran', array('id_pendaftaran' => $id_calon));   
        return $query; 
    }

    public function tambah_anggota($data)
    {
        $this->db->insert('anggota', $data);
    }

//////////////////// mengambil nilai hasil /////
    public function hasil()
    {
        $this->db->order_by('total_nilai', 'DESC');
        $result = $this->db->get('pendaftaran');
        return $result;
    }

////////////////////// aspek ////////////////////
	    public function getAllAspek()
    {
        $result = $this->db->get('aspek');
        return $result;
    }

    public function buat_kode_aspek()
    {
        $this->db->select('RIGHT(aspek.id_aspek,3) as kode', FALSE);
        $this->db->order_by('id_aspek', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('aspek'); //cek apakah sudah ada di tabel.
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
            $kodejadi = "AP".$kodemax;
            return $kodejadi;
    }

    public function tambah_aspek($data)
    {
    	$this->db->insert('aspek', $data);
    }

    public function getAspekById($id_aspek)
    {
    	$query = $this->db->get_where('aspek', array('id_aspek' => $id_aspek ));
    	return $query;
    }

    public function update_aspek($data)
    {	
    	$this->db->where('id_aspek',$data['id_aspek']);
    	$this->db->update('aspek', $data);
    }

    public function hapus_aspek($id_aspek)
    {	
    	$this->db->where('id_aspek',$id_aspek);
    	$this->db->delete('aspek');
    }

    public function getJumlahAspek(){
        $query = $this->db->query("SELECT 'Count(Distinct id_aspek)' as id_aspek FROM aspek");
        return $query->num_rows();
    }

    ////////////////////// sub aspek ////////////////

	    public function getAllSub()
    {	
    	$this->db->select('*');
    	$this->db->from('sub_aspek');
    	$this->db->join('aspek', 'aspek.id_aspek = sub_aspek.id_aspek');
        $result = $this->db->get();
        return $result;
    }


    public function buat_kode_sub()
    {
        $this->db->select('RIGHT(sub_aspek.id_sub,3) as kode', FALSE);
        $this->db->order_by('id_sub', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('sub_aspek'); //cek apakah sudah ada di tabel.
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
            $kodejadi = "SA".$kodemax;
            return $kodejadi;
    }

    public function tambah_sub($data)
    {
    	$this->db->insert('sub_aspek', $data);
    }

    public function getSubById($id_sub)
    {
    	$query = $this->db->get_where('sub_aspek', array('id_sub' => $id_sub ));
    	return $query;
    }

    public function update_sub($data)
    {	
    	$this->db->where('id_sub',$data['id_sub']);
    	$this->db->update('sub_aspek', $data);
    }

    public function hapus_sub($id_sub)
    {	
    	$this->db->where('id_sub',$id_sub);
    	$this->db->delete('sub_aspek');
    }

    public function getJumlahSub(){
        $query = $this->db->query("SELECT 'Count(Distinct id_sub)' as id_sub FROM sub_aspek");
        return $query->num_rows();
    }

    /////////////////// nilai bobot //////////////////////

    public function getAll_N_bobot()
    {
    	$query = $this->db->get('bobot');
    	return $query;
    }

    public function tambah_nilai($data)
    {
    	$this->db->insert('bobot', $data);
    }


    public function get_N_bobot($selisih)
    {
    	$query = $this->db->get_where('bobot', array('selisih' => $selisih));
    	return $query;
    }

    public function update_nilai($data)
    {	
    	$this->db->where('selisih',$data['selisih']);
    	$this->db->update('bobot', $data);
    }

    public function hapus_nilai($selisih)
    {	
    	$this->db->where('selisih',$selisih);
    	$this->db->delete('bobot');
    }

    public function getJumlahBobot(){
        $query = $this->db->query("SELECT 'Count(Distinct selisih)' as selisih FROM bobot");
        return $query->num_rows();
    }

    ///////////////// pertanyaan ///////////////////////

    public function getAllPertanyaan()
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        $this->db->join('sub_aspek', 'sub_aspek.id_sub = pertanyaan.id_sub');
        $result = $this->db->get();
        return $result;
    }

      public function kodepertanyaan()
    {
        $this->db->select('RIGHT(pertanyaan.id_pertanyaan,3) as kode', FALSE);
        $this->db->order_by('id_pertanyaan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pertanyaan'); //cek apakah sudah ada di tabel.
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
            $kodejadi = "PR".$kodemax;
            return $kodejadi;
    }

    public function tambah_pertanyaan($data)
    {
        $this->db->insert('pertanyaan', $data);
    }

    public function get_pertanyaan($id_pertanyaan)
    {
        $query = $this->db->get_where('pertanyaan', array('id_pertanyaan' => $id_pertanyaan));
        return $query;
    }

    public function update_pertanyaan($data)
    {   
        $this->db->where('id_pertanyaan', $data['id_pertanyaan']);
        $this->db->update('pertanyaan', $data);
    }

    public function hapus_pertanyaan($id_pertanyaan)
    {
        $this->db->where('id_pertanyaan', $id_pertanyaan);
        $this->db->delete('pertanyaan');
    }

    public function getJumlahPertanyaan(){
        $query = $this->db->query("SELECT 'Count(Distinct id_pertanyaan)' as id_pertanyaan FROM pertanyaan");
        return $query->num_rows();
    }
}

/* End of file Pm_model.php */
/* Location: ./application/models/pm/Pm_model.php */