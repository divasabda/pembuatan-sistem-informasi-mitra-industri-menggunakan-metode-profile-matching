<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pim_model extends CI_Model {

	function hitungPic(){
        $query = $this->db->query("SELECT 'Count(Distinct id_pic)' as id_pic FROM pic");
        return $query->num_rows();
    }

    function hitungAnggota(){
        $query = $this->db->query("SELECT 'Count(Distinct id_anggota)' as id_anggota FROM anggota");
        return $query->num_rows();
    }

    function hitungProyek(){
        $query = $this->db->query("SELECT 'Count(Distinct id_proyek)' as id_proyek FROM proyek");
        return $query->num_rows();
    }

    function get_tanggal(){
		$this->db->select('YEAR(mulai_proyek) as tahun, count(id_proyek) as jumlah');
		$this->db->from('proyek');
		$this->db->group_by('mulai_proyek');
		$query = $this->db->get();
		return $query;
	 }

    public function getAllPic()
    {
        $result = $this->db->get('pic');
        return $result;
    }

    public function getAllAnggota()
    {	
    	$this->db->select('*');
    	$this->db->from('grup');
    	$this->db->join('anggota', 'anggota.id_anggota = grup.id_anggota','left');
    	$this->db->join('pic', 'pic.id_pic = grup.id_pic', 'left');
        $result = $this->db->get();
        return $result;
    }

    public function getAnggotaById($id_anggota)
    {
    	$query = $this->db->get_where('anggota', array('id_anggota' => $id_anggota));   
        return $query; 
    }

    // public function getAllGroup()
    // {
    //     $result = $this->db->get('grup');
    //     return $result;
    // }

   	public function getAllPro()
    {
        $result = $this->db->get('proyek');
        return $result;
    }

    public function getAllRabs()
    {
        $result = $this->db->get('rab');
        return $result;
    }

   	public function getGroup1()
    {
         $group1 = array('deskripsi'=>'Group1');

    	$this->db->select('*');
    	$this->db->from('grup');
    	$this->db->join('anggota','anggota.id_anggota = grup.id_anggota');
    	$this->db->join('pic','pic.id_pic = grup.id_pic');
        $this->db->where($group1);
    	$result = $this->db->get();
    	return $result;
    }
     
    public function getGroup2()
    {
         $group2 = array('deskripsi'=>'Group2');

        $this->db->select('*');
        $this->db->from('grup');
        $this->db->join('anggota','anggota.id_anggota = grup.id_anggota');
        $this->db->join('pic','pic.id_pic = grup.id_pic');
        $this->db->where($group2);
        $result = $this->db->get();
        return $result;
    }

    public function getAllProyek()
    {
    	$this->db->select('*');
        $this->db->from('proyek');
        $this->db->join('anggota','anggota.id_anggota = proyek.id_anggota');
        $this->db->join('pic','pic.id_pic = proyek.id_pic');
        $result = $this->db->get();
        return $result;
    }

    public function getAllRab()
    {
        $this->db->select('*');
        $this->db->from('rab');
        $this->db->join('proyek','proyek.id_proyek = rab.id_proyek');
        $this->db->join('pic','pic.id_pic = rab.id_pic');
        $result = $this->db->get();
        return $result;
    }
}

/* End of file Pim_model.php */
/* Location: ./application/models/Pim_model.php */