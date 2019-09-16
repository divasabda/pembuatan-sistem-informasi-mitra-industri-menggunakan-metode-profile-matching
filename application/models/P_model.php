<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_model extends CI_Model {


////////////////////////// VIEW ANGGOTA //////////////////////////

	  public function getGroup1()
    {
    	$id_pic = array('nama_pic'=> $this->session->userdata('ses_nama'));
        $group1 = array('deskripsi'=>'Group1');

    	$this->db->select('*');
    	$this->db->from('grup');
    	$this->db->join('anggota','anggota.id_anggota = grup.id_anggota','RIGHT');
    	$this->db->join('pic','pic.id_pic = grup.id_pic','RIGHT');
    	$this->db->where($id_pic);
        $this->db->where($group1);
    	$result = $this->db->get();
    	return $result;
    }
      public function getGroup2()
    {
    	$id_pic = array('nama_pic'=>$this->session->userdata('ses_nama'));
        $group2 = array('deskripsi'=>'Group2');

        $this->db->select('*');
        $this->db->from('grup');
        $this->db->join('anggota','anggota.id_anggota = grup.id_anggota');
        $this->db->join('pic','pic.id_pic = grup.id_pic');
        $this->db->where($id_pic);
        $this->db->where($group2);

        $result = $this->db->get();
        return $result;
    }

        public function getAnggotaById($id_anggota)
    {
        $query = $this->db->get_where('anggota', array('id_anggota' => $id_anggota));   
        return $query; 

    }

/////////////////////////// proyek //////////////////////////////////

    public function buat_kode()
    {
        $this->db->select('RIGHT(proyek.id_proyek,3) as kode', FALSE);
        $this->db->order_by('id_proyek', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('proyek'); //cek apakah sudah ada di tabel.
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

    public function getAllProyek()
    {
        $id_pic = array('nama_pic'=>$this->session->userdata('ses_nama'));
        $this->db->select('*');
        $this->db->from('proyek');
        $this->db->join('anggota','anggota.id_anggota = proyek.id_anggota');
        $this->db->join('pic','pic.id_pic = proyek.id_pic');
        $this->db->where($id_pic);
        $result = $this->db->get();
        return $result;
    }

    public function getAnggota()
    {
        $id_pic = array('nama_pic'=>$this->session->userdata('ses_nama'));
        $this->db->select('*');
        $this->db->from('grup');
        $this->db->join('anggota','anggota.id_anggota = grup.id_anggota');
        $this->db->join('pic','pic.id_pic = grup.id_pic');
        $this->db->where($id_pic);

        $result = $this->db->get();
        return $result;
    }

    public function tambahProyek($data)
    {
        $this->db->insert('proyek', $data);
    }

    public function getProyekById($id_proyek)
    {
        $query = $this->db->get_where('proyek', array('id_proyek' => $id_proyek));   
        return $query;
    }

        public function getGroupById($id_anggota)
    {

        $grup = $this->db->select('id_group')
                  ->get_where('grup', array('id_anggota' => $id_anggota))
                  ->row()
                  ->id_group;
        return $grup;
    }

    public function updateProyek($data)
        {
        $this->db->where('id_proyek', $data['id_proyek']);
        $this->db->update('proyek', $data);
    }

    public function hapusProyek($id_proyek)
    {
        
        $this->db->where('id_proyek', $id_proyek); 
        $this->db->delete('proyek');
    }


//////////////////////// RAB ////////////////////////////////

    public function buat_kode_rab()
    {
        $this->db->select('RIGHT(rab.id_rab,3) as kode', FALSE);
        $this->db->order_by('id_rab', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('rab'); //cek apakah sudah ada di tabel.
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
            $kodejadi = "RA".$kodemax;
            return $kodejadi;
    }


    public function getAllRAB()
    {
        $id_pic = array('nama_pic'=>$this->session->userdata('ses_nama'));
        $this->db->select('*');
        $this->db->from('rab');
        $this->db->join('proyek','proyek.id_proyek = rab.id_proyek');
        $this->db->join('pic','pic.id_pic = rab.id_pic');
        $this->db->where($id_pic);
        $result = $this->db->get();
        return $result;
    }

    public function tambahRab($data)
    {
        $this->db->insert('rab', $data);
    }


    public function getRabById($id_rab)
    {
        $query = $this->db->get_where('rab', array('id_rab' => $id_rab));   
        return $query; 
    }    


    public function updateRAB($data)
    {
        $this->db->where('id_rab', $data['id_rab']);
        $this->db->update('rab', $data);
    }

    public function hapusRAB($id_rab)
    {
        
        $this->db->where('id_rab', $id_rab); 
        $this->db->delete('rab');
    }

    public function hitungRabById($id_proyek)
    {
        $this->db->select_sum('dana_rab', 'dana');
        $this->db->where('id_proyek',$id_proyek);
        $result = $this->db->get('rab')->row();  
        return $result->dana;
     }

    public function hitungDanaProyek($id_proyek)
    {

        $this->db->select_sum('nilai_proyek', 'dana_proyek');
        $this->db->where('id_proyek', $id_proyek);
        $result = $this->db->get('proyek')->row();  
        return $result->dana_proyek;
    }


//////////////////// laporan proyek /////////////////////////

        public function getDetailProyek($id_proyek)
    {
        $this->db->select('*');
        $this->db->from('proyek');
        $this->db->join('anggota','anggota.id_anggota = proyek.id_anggota');
        $this->db->where('id_proyek',$id_proyek);
        $query = $this->db->get();
        return $query;
    }  

    public function getDetailRab($id_proyek)
    {

        $query = $this->db->query("SELECT * FROM rab WHERE id_proyek='$id_proyek'");
        return $query->result();
    }


/////////////////// hitung jumlah pada home ///////////////////
    function hitungGroupByPic(){
     	$id_pic = $this->session->userdata('id_pic');
       	$this->db->distinct();
		$this->db->select('id_group');
		$this->db->where('id_pic', $id_pic); 
		$query = $this->db->get('grup');
		return $query->num_rows();
	 }
	
    function hitungProyek(){
        $query = $this->db->query("SELECT 'Count(Distinct id_proyek)' as id_proyek FROM proyek");
        return $query->num_rows();
     }

    function hitungRab(){
        $query = $this->db->query("SELECT 'Count(Distinct id_rab)' as id_rab FROM rab");
        return $query->num_rows();
     }

}

/* End of file P_model.php */
/* Location: ./application/models/P_model.php */