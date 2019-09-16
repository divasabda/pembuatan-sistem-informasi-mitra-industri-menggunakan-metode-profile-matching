<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pass_model extends CI_Model {

//////// untuk admin ///////////
public function save_passAdmin()
 {
  $pass = md5($this->input->post('new'));
  $data = array (
   'pass_admin' => $pass
   );
  $this->db->where('id_admin', $this->session->userdata('id_admin'));
  $this->db->update('admin', $data);
 }

//fungsi untuk mengecek password lama :
 public function cek_old_Admin()
  {
   $old = md5($this->input->post('old'));  
  $this->db->where('pass_admin',$old);
   $query = $this->db->get('admin');
      return $query->result();
  }  

  //////// untuk pic ///////////
public function save_passPic()
 {
  $pass = md5($this->input->post('new'));
  $data = array (
   'pass_pic' => $pass
   );
  $this->db->where('id_pic', $this->session->userdata('id_pic'));
  $this->db->update('pic', $data);
 }

//fungsi untuk mengecek password lama :
 public function cek_old_Pic()
  {
   $old = md5($this->input->post('old'));  
  $this->db->where('pass_pic',$old);
   $query = $this->db->get('pic');
      return $query->result();
  }  

///////// anggota ////////////
  public function save_passAnggota()
 {
  $pass = md5($this->input->post('new'));
  $data = array (
   'pass_anggota' => $pass
   );
  $this->db->where('id_anggota', $this->session->userdata('id_anggota'));
  $this->db->update('anggota', $data);
 }

//fungsi untuk mengecek password lama :
 public function cek_old_Anggota()
  {
   $old = md5($this->input->post('old'));  
   $this->db->where('pass_anggota',$old);
   $query = $this->db->get('anggota');
      return $query->result();
  }  

}

/* End of file Pass_model.php */
/* Location: ./application/models/Pass_model.php */