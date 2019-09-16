<?php
class Login_model extends CI_Model{
	//cek user dan password dosen
	function auth_admin($username,$password){
		$query=$this->db->query("SELECT * FROM admin WHERE user_admin='$username' AND pass_admin=MD5('$password') LIMIT 1");
		return $query;
	}

	//cek user dan password anggota
	function auth_anggota($username,$password){
		$query=$this->db->query("SELECT * FROM anggota WHERE user_anggota='$username' AND pass_anggota=MD5('$password') LIMIT 1");
		return $query;
	}

	//cek user dan password pic
	function auth_pic($username,$password){
		$query=$this->db->query("SELECT * FROM pic WHERE user_pic='$username' AND pass_pic=MD5('$password') LIMIT 1");
		return $query;
	}

}
