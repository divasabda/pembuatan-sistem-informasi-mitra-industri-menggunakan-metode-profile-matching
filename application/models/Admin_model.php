<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


    public function getAll()
    {
        $result = $this->db->get('admin');
        return $result;
    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(admin.id_admin,3) as kode', FALSE);
        $this->db->order_by('id_admin', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('admin'); //cek apakah sudah ada di tabel.
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
            $kodejadi = "AD".$kodemax;
            return $kodejadi;
    }

    public function getAdminById($id_admin)
    {
        $query = $this->db->get_where('admin', array('id_admin' => $id_admin));   
        return $query; 
    }

    public function tambahAdmin()
    {
        $user_admin = $this->input->post('user_admin');
        $sql = $this->db->query("SELECT user_admin FROM admin where user_admin='$user_admin'");
        $cek_user = $sql->num_rows();
        if ($cek_user > 0) {
        $this->session->set_flashdata('user', 'sudah dipakai');
        redirect('admin/crud_admin/tambah');
        }
        else
        {

         $data = 
            [ 
                "id_admin" => $this->input->post('id_admin',true),
                "nama_admin" => $this->input->post('nama_admin',true),
                "user_admin" => $this->input->post('user_admin',true),
                "pass_admin" => md5($this->input->post('pass_admin',true)),
                "level_admin" => $this->input->post('level_admin',true),
            ];

            $this->db->insert('admin', $data);   
        }
        
    }

     public function updateAdmin($id_admin,$nama_admin,$user_admin)
        {

        $data = 
            [ 
                "id_admin" => $this->input->post('id_admin',true),
                "nama_admin" => $this->input->post('nama_admin',true),
                "user_admin" => $this->input->post('user_admin',true),
                "level_admin" => $this->input->post('level_admin',true),
            ];

        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $data);
    }

    public function hapusAdmin($id_admin)
    {   
        $id = "AD001";
        if($id == $id_admin)
        {
            redirect('admin/crud_admin');
        }
        else
        {
            $this->db->where('id_admin', $id_admin); 
            $this->db->delete('admin'); 
        }

    }

    function hitungAdmin(){
        $query = $this->db->query("SELECT 'Count(Distinct id_admin)' as id_admin FROM admin");
        return $query->num_rows();
    }
}

