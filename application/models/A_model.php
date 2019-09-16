<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_model extends CI_Model {

	public function getAnggotaById()
    {
    	$id_anggota = $this->session->userdata('id_anggota');
        $query = $this->db->get_where('anggota', array('id_anggota' => $id_anggota));   
        return $query; 
    }	
	
	public function getProfilePerusahaan($id_anggota)
    {
        $query = $this->db->get_where('anggota', array('id_anggota' => $id_anggota));   
        return $query; 
    }

    public function update($id_anggota,$data){
		$this->db->where('id_anggota',$id_anggota);
		$this->db->update('anggota',$data);
	}

	public function getDetailProyek($id_anggota)

	{
        $this->db->select('*');
        $this->db->from('proyek');
        $this->db->where('id_anggota',$id_anggota);
        $query = $this->db->get();
        return $query;
    }

        public function getDetailRab($id_anggota)
    {	
    	$this->db->select('*');
    	$this->db->from('rab');
    	$this->db->join('proyek','proyek.id_proyek = rab.id_proyek','RIGHT');
    	$this->db->where('id_anggota',$id_anggota);
    	$result = $this->db->get();
    	return $result;
    }  

    public function getPIC()
    {
        $id_anggota = $this->session->userdata('id_anggota');
        $this->db->select('*');
        $this->db->from('grup');
        $this->db->join('pic','pic.id_pic = grup.id_pic');
        $this->db->where('id_anggota',$id_anggota);
        $result = $this->db->get();
        return $result;
    }

        public function getRabById($id_rab)
    {
        $query = $this->db->get_where('rab', array('id_rab' => $id_rab));   
        return $query; 
    }   

    public function updateLaporan($id_rab,$data){
        $this->db->where('id_rab',$id_rab);
        $this->db->update('rab',$data);
    }

    public function hitungProyek(){
        $id_anggota = $this->session->userdata('id_anggota');
        $this->db->distinct();
        $this->db->select('id_proyek');
        $this->db->where('id_anggota', $id_anggota); 
        $query = $this->db->get('proyek');
        return $query->num_rows();
     }

    public function hitungRab(){
        $id_anggota = $this->session->userdata('id_anggota');
        $this->db->distinct();
        $this->db->select('id_rab');
        $this->db->join('proyek','proyek.id_proyek = rab.id_proyek');
        $this->db->where('id_anggota',$id_anggota);
        $result = $this->db->get('rab');
        return $result->num_rows();

     }

}

/* End of file A_model.php */
/* Location: ./application/models/A_model.php */