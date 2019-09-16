<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends CI_Model {


	public function buat_kode()
    {
        $this->db->select('RIGHT(grup.id_group,3) as kode', FALSE);
        $this->db->order_by('id_group', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('grup'); //cek apakah sudah ada di tabel.
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
            $kodejadi = "GR".$kodemax;
            return $kodejadi;
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

      public function getPIC()
    {
        $result = $this->db->get('pic');
        return $result;
    }

      public function getAnggota()
    {
        $result = $this->db->get('anggota');
        return $result;
    }

    public function tambahGroup($data)
    {
    	$this->db->insert('grup',$data);
    }


    public function hapusGroup($id_group)
    {

        $this->db->where('id_group',$id_group); 
        $this->db->delete('grup');
    }

    public function cek($id_group)
    {

        $this->db->select('a.id_group');
        $this->db->from('proyek as a');
        $this->db->join('grup as b', 'a.id_group = b.id_group');
        $this->db->where('a.id_group',$id_group);
        $data=$this->db->get();
        return $data;
    }


    function hitungGroup(){
        $query = $this->db->query("SELECT 'Count(Distinct id_group)' as id_group FROM grup");
        return $query->num_rows();
    }

}

/* End of file Group_model.php */
/* Location: ./application/models/Group_model.php */