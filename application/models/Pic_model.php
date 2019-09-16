<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic_model extends CI_Model {


    public function getAll()
    {
        $result = $this->db->get('pic');
        return $result;
    }

    public function buat_kode()
    {
    	$this->db->select('RIGHT(pic.id_pic,3) as kode', FALSE);
    	$this->db->order_by('id_pic', 'DESC');
    	$this->db->limit(1);
    	$query = $this->db->get('pic'); //cek apakah sudah ada di tabel.
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
    		$kodejadi = "PC".$kodemax;
    		return $kodejadi;
    }

    public function getPicById($id_pic)
    {
    	$query = $this->db->get_where('pic', array('id_pic' => $id_pic));  	
 		return $query; 
    }

    public function tambahPic()
    {
        $user_pic = $this->input->post('user_pic');
        $sql = $this->db->query("SELECT user_pic FROM pic where user_pic='$user_pic'");
        $cek_user = $sql->num_rows();
        if ($cek_user > 0) {
        $this->session->set_flashdata('user', 'sudah dipakai');
        redirect('admin/crud_pic/tambah');
        }
        else
        {
    	$data = 
    		[ 
    			"id_pic" => $this->input->post('id_pic',true),
    			"nama_pic" => $this->input->post('nama_pic',true),
    			"user_pic" => $this->input->post('user_pic',true),
    			"pass_pic" => md5($this->input->post('pass_pic',true)),
    		];

    	$this->db->insert('pic', $data);
        }
    }

     public function updatePic($id_pic,$nama_pic,$user_pic)
    	{

    	$data = 
    		[ 
    			"id_pic" => $this->input->post('id_pic',true),
    			"nama_pic" => $this->input->post('nama_pic',true),
    			"user_pic" => $this->input->post('user_pic',true),
    		];

    	$this->db->where('id_pic', $id_pic);
    	$this->db->update('pic', $data);
    }

    public function hapusPic($id_pic)
    {
    	$this->db->where('id_pic', $id_pic); 
 		$this->db->delete('pic');
    }

    function hitungPic(){
        $query = $this->db->query("SELECT 'Count(Distinct id_pic)' as id_pic FROM pic");
        return $query->num_rows();
    }
}

