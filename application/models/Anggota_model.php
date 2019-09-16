<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {


    public function getAll()
    {
        $result = $this->db->get('anggota');
        return $result;
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

    public function getAnggotaById($id_anggota)
    {
        $query = $this->db->get_where('anggota', array('id_anggota' => $id_anggota));   
        return $query; 

    }

    public function tambahAnggota($data)
    {
        $user_anggota = $this->input->post('user_anggota');
        $sql = $this->db->query("SELECT user_anggota FROM anggota where user_anggota='$user_anggota'");
        $cek_user = $sql->num_rows();
        if ($cek_user > 0) {
        $this->session->set_flashdata('user', 'sudah dipakai');
        redirect('admin/crud_anggota/tambah');
        }
        else
        {   
            $this->db->insert('anggota', $data);
            
        }
        
    }


    public function updateAnggota($data)
        {
        $this->db->where('id_anggota', $data['id_anggota']);
        $this->db->update('anggota', $data);
    }



    public function hapusAnggota($id_anggota)
    {
        
        $this->db->where('id_anggota', $id_anggota); 
        $this->db->delete('anggota');
    }

    public function cek($id_anggota)
    {

        $this->db->select('a.id_anggota');
        $this->db->from('grup as a');
        $this->db->join('anggota as b', 'a.id_anggota = b.id_anggota');
        $this->db->where('a.id_anggota',$id_anggota);
        $data=$this->db->get();
        return $data;
    }

    function hitungAnggota(){
        $query = $this->db->query("SELECT 'Count(Distinct id_anggota)' as id_anggota FROM anggota");
        return $query->num_rows();
    }
}

