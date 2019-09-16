<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_laporan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pim_model');
		$this->load->library('pdf');

		    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
	}

	public function index()
	{
		$this->load->view('pimpinan/laporan/v_laporan');	
	}

	public function laporan_proyek()
	{
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'INKUBATOR BISNIS UNIVERSITAS PEMBANGUNAN NASIONAL JAWA TIMUR',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN PROYEK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(22,6,'ID PROYEK',1,0);
        $pdf->Cell(35,6,'NAMA ANGGOTA',1,0);
        $pdf->Cell(20,6,'NAMA PIC',1,0);
        $pdf->Cell(35,6,'NAMA PROYEK',1,0);
        $pdf->Cell(28,6,'LAMA PROYEK',1,0);
        $pdf->Cell(30,6,'MULAI PROYEK',1,0);
        $pdf->Cell(33,6,'SELESAI PROYEK',1,0);
        $pdf->Cell(34,6,'NILAI PROYEK',1,0);
        $pdf->Cell(32,6,'STATUS PROYEK',1,1);
        $pdf->SetFont('Arial','',10);
        $proyek = $this->Pim_model->getAllProyek();
        foreach ($proyek->result() as $row){
            $pdf->Cell(22,6,$row->id_proyek,1,0);
            $pdf->Cell(35,6,$row->nama_anggota,1,0);
            $pdf->Cell(20,6,$row->nama_pic,1,0);
            $pdf->Cell(35,6,$row->nama_proyek,1,0);
            $pdf->Cell(28,6,$row->lama_proyek." Hari",1,0); 
            $pdf->Cell(30,6,$row->mulai_proyek,1,0);
            $pdf->Cell(33,6,$row->selesai_proyek,1,0);
            $pdf->Cell(34,6,"Rp.".number_format($row->nilai_proyek),1,0);     
            $pdf->Cell(32,6,$row->status_proyek,1,1); 
        }
        $pdf->Output();
	}


	public function laporan_rab()
	{
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'INKUBATOR BISNIS UNIVERSITAS PEMBANGUNAN NASIONAL JAWA TIMUR',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN RAB',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(22,6,'ID RAB',1,0);
        $pdf->Cell(40,6,'NAMA PROYEK',1,0);
        $pdf->Cell(60,6,'NAMA RAB',1,0);
        $pdf->Cell(35,6,'DANA RAB',1,0);
        $pdf->Cell(25,6,'STATUS RAB',1,1);
        $pdf->SetFont('Arial','',10);
        $rab = $this->Pim_model->getAllRab();
        foreach ($rab->result() as $row){
            $pdf->Cell(22,6,$row->id_rab,1,0);
            $pdf->Cell(40,6,$row->nama_proyek,1,0);
            $pdf->Cell(60,6,$row->nama_rab,1,0);
            $pdf->Cell(35,6,"Rp.".number_format($row->dana_rab),1,0);  
            $pdf->Cell(25,6,$row->status_rab,1,1);   
        }
        $pdf->Output();
	}


	public function laporan_group1()
	{  
        $laporan = [];
        $group = $this->Pim_model->getGroup1();
        $proyek = $this->Pim_model->getAllPro();
        $rab = $this->Pim_model->getAllRabs();

        foreach ($group->result() as $key => $value) {
          
           $laporan[$value->nama_pic][$value->nama_anggota]["proyek"] = array();
           $idx = 0;
           foreach ($proyek->result() as $pro => $valuepro) {
               if ($valuepro->id_anggota == $value->id_anggota ) {
                    $laporan[$value->nama_pic][$value->nama_anggota]["proyek"][$idx] = 
                    [
                        'id_proyek' => $valuepro->id_proyek,
                        'nama_proyek'=> $valuepro->nama_proyek,
                        'mulai_proyek' => $valuepro->mulai_proyek,
                        'lama_proyek' => $valuepro->lama_proyek,
                        'selesai_proyek' => $valuepro->selesai_proyek,
                        'nilai_proyek' => $valuepro->nilai_proyek,
                        'status_proyek' => $valuepro->status_proyek,
                    ];

                    $idxs = 0;

                   foreach ($rab->result() as $rabs => $valuerab) {
                       if ($valuerab->id_proyek == $valuepro->id_proyek) {
                        $laporan[$value->nama_pic][$value->nama_anggota]["proyek"][$idx]["rab"][$idxs] = 
                            [
                                'id_rab' => $valuerab->id_rab,
                                'nama_rab'=> $valuerab->nama_rab,
                                'dana_rab' => $valuerab->dana_rab,
                                'bukti_kegiatan' => $valuerab->bukti_kegiatan,
                                'bukti_keuangan' => $valuerab->bukti_keuangan,
                                'bukti_foto' => $valuerab->bukti_foto,
                                'status_rab' => $valuerab->status_rab,                       
                            ];

                        $idxs++;
                       }
                   }
                 $idx++;
                } 

           }
            
        }
        
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'INKUBATOR BISNIS UNIVERSITAS PEMBANGUNAN NASIONAL JAWA TIMUR',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN GROUP 1',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        foreach ($laporan as $key => $value) {

            foreach ($laporan[$key] as $lap => $val) {
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,6,'NAMA PIC',1,0);
            $pdf->Cell(35,6,'NAMA ANGGOTA',1,1);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,6,$key,1,0);
            $pdf->Cell(35,6,$lap,1,1);

                foreach ($laporan[$key][$lap] as $laps => $vue) {
                    if (isset($vue)) {
                    foreach ($vue as $pr => $vapro) {
                        $pdf->Cell(10,7,'',0,1);
                        $pdf->Cell(10,7,'',0,1);
                        $pdf->SetFont('Arial','B',10);
                        $pdf->Cell(23,6,'ID PROYEK',1,0);
                        $pdf->Cell(60,6,'NAMA PROYEK',1,0);
                        $pdf->Cell(35,6,'LAMA PROYEK',1,0);
                        $pdf->Cell(35,6,'MULAI PROYEK',1,0);
                        $pdf->Cell(35,6,'SELESAI PROYEK',1,0);
                        $pdf->Cell(35,6,'NILAI PROYEK',1,0);
                        $pdf->Cell(35,6,'STATUS PROYEK',1,1);
                        $pdf->SetFont('Arial','',10);
                        $pdf->Cell(23,6,$vapro['id_proyek'],1,0);
                        $pdf->Cell(60,6,$vapro['nama_proyek'],1,0);
                        $pdf->Cell(35,6,$vapro['lama_proyek']." Hari",1,0);
                        $pdf->Cell(35,6,$vapro['mulai_proyek'],1,0);
                        $pdf->Cell(35,6,$vapro['selesai_proyek'],1,0);
                        $pdf->Cell(35,6,"Rp.".number_format($vapro['nilai_proyek']),1,0);
                        $pdf->Cell(35,6,$vapro['status_proyek'],1,0);
                        $pdf->Cell(10,7,'',0,1);
                        if (isset($vapro['rab'])) {
                                $pdf->Cell(10,7,'',0,1);
                                $pdf->SetFont('Arial','B',10);
                                $pdf->Cell(23,6,'ID RAB',1,0);
                                $pdf->Cell(60,6,'NAMA RAB',1,0);
                                $pdf->Cell(35,6,'DANA RAB',1,0);
                                $pdf->Cell(35,6,'BUKTI KEGIATAN',1,0);
                                $pdf->Cell(35,6,'BUKTI KEUANGAN',1,0);
                                $pdf->Cell(35,6,'BUKTI FOTO',1,0);
                                $pdf->Cell(35,6,'STATUS RAB',1,1);
                            foreach ($vapro['rab'] as $ra => $varab) {

                                $pdf->SetFont('Arial','',10);
                                $pdf->Cell(23,6,$varab['id_rab'],1,0);
                                $pdf->Cell(60,6,$varab['nama_rab'],1,0);
                                $pdf->Cell(35,6,"Rp.".number_format($varab['dana_rab']),1,0);
                                $pdf->Cell(35,6,($varab['bukti_kegiatan']) ? 'sudah' : 'belum' ,1,0);
                                $pdf->Cell(35,6,($varab['bukti_keuangan']) ? 'sudah' : 'belum' ,1,0);
                                $pdf->Cell(35,6,($varab['bukti_foto']) ? 'sudah' : 'belum' ,1,0);
                                $pdf->Cell(35,6,$varab['status_rab'],1,1);
                                
                            }
                        }
                    }
                }



                }
            }
            
        }
        
    
        $pdf->Output();
	}


    public function laporan_group2()
    {

 $laporan = [];
        $group = $this->Pim_model->getGroup2();
        $proyek = $this->Pim_model->getAllPro();
        $rab = $this->Pim_model->getAllRabs();

        foreach ($group->result() as $key => $value) {
          
           $laporan[$value->nama_pic][$value->nama_anggota]["proyek"] = array();
           $idx = 0;
           foreach ($proyek->result() as $pro => $valuepro) {
               if ($valuepro->id_anggota == $value->id_anggota ) {
                    $laporan[$value->nama_pic][$value->nama_anggota]["proyek"][$idx] = 
                    [
                        'id_proyek' => $valuepro->id_proyek,
                        'nama_proyek'=> $valuepro->nama_proyek,
                        'mulai_proyek' => $valuepro->mulai_proyek,
                        'lama_proyek' => $valuepro->lama_proyek,
                        'selesai_proyek' => $valuepro->selesai_proyek,
                        'nilai_proyek' => $valuepro->nilai_proyek,
                        'status_proyek' => $valuepro->status_proyek,
                    ];

                    $idxs = 0;

                   foreach ($rab->result() as $rabs => $valuerab) {
                       if ($valuerab->id_proyek == $valuepro->id_proyek) {
                        $laporan[$value->nama_pic][$value->nama_anggota]["proyek"][$idx]["rab"][$idxs] = 
                            [
                                'id_rab' => $valuerab->id_rab,
                                'nama_rab'=> $valuerab->nama_rab,
                                'dana_rab' => $valuerab->dana_rab,
                                'bukti_kegiatan' =>$valuerab->bukti_kegiatan,
                                'bukti_keuangan' =>$valuerab->bukti_keuangan,
                                'bukti_foto' =>$valuerab->bukti_foto,
                                'status_rab' => $valuerab->status_rab,                        
                            ];

                        $idxs++;
                       }
                   }
                 $idx++;
                } 

           }
            
        }
        
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'INKUBATOR BISNIS UNIVERSITAS PEMBANGUNAN NASIONAL JAWA TIMUR',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN GROUP 2',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        foreach ($laporan as $key => $value) {

            foreach ($laporan[$key] as $lap => $val) {
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,6,'NAMA PIC',1,0);
            $pdf->Cell(35,6,'NAMA ANGGOTA',1,1);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,6,$key,1,0);
            $pdf->Cell(35,6,$lap,1,1);

                foreach ($laporan[$key][$lap] as $laps => $vue) {
                    if (isset($vue)) {
                    foreach ($vue as $pr => $vapro) {
                        $pdf->Cell(10,7,'',0,1);
                        $pdf->Cell(10,7,'',0,1);
                        $pdf->SetFont('Arial','B',10);
                        $pdf->Cell(23,6,'ID PROYEK',1,0);
                        $pdf->Cell(60,6,'NAMA PROYEK',1,0);
                        $pdf->Cell(35,6,'LAMA PROYEK',1,0);
                        $pdf->Cell(35,6,'MULAI PROYEK',1,0);
                        $pdf->Cell(35,6,'SELESAI PROYEK',1,0);
                        $pdf->Cell(35,6,'NILAI PROYEK',1,0);
                        $pdf->Cell(35,6,'STATUS PROYEK',1,1);
                        $pdf->SetFont('Arial','',10);
                        $pdf->Cell(23,6,$vapro['id_proyek'],1,0);
                        $pdf->Cell(60,6,$vapro['nama_proyek'],1,0);
                        $pdf->Cell(35,6,$vapro['lama_proyek']." Hari",1,0);
                        $pdf->Cell(35,6,$vapro['mulai_proyek'],1,0);
                        $pdf->Cell(35,6,$vapro['selesai_proyek'],1,0);
                        $pdf->Cell(35,6,"Rp.".number_format($vapro['nilai_proyek']),1,0);
                        $pdf->Cell(35,6,$vapro['status_proyek'],1,0);
                        $pdf->Cell(10,7,'',0,1);
                        if (isset($vapro['rab'])) {
                                $pdf->Cell(10,7,'',0,1);
                                $pdf->SetFont('Arial','B',10);
                                $pdf->Cell(23,6,'ID RAB',1,0);
                                $pdf->Cell(60,6,'NAMA RAB',1,0);
                                $pdf->Cell(35,6,'DANA RAB',1,0);
                                $pdf->Cell(35,6,'BUKTI KEGIATAN',1,0);
                                $pdf->Cell(35,6,'BUKTI KEUANGAN',1,0);
                                $pdf->Cell(35,6,'BUKTI FOTO',1,0);
                                $pdf->Cell(35,6,'STATUS RAB',1,1);
                            foreach ($vapro['rab'] as $ra => $varab) {

                                $pdf->SetFont('Arial','',10);
                                $pdf->Cell(23,6,$varab['id_rab'],1,0);
                                $pdf->Cell(60,6,$varab['nama_rab'],1,0);
                                $pdf->Cell(35,6,"Rp.".number_format($varab['dana_rab']),1,0);
                                $pdf->Cell(35,6,($varab['bukti_kegiatan']) ? 'sudah' : 'belum' ,1,0);
                                $pdf->Cell(35,6,($varab['bukti_keuangan']) ? 'sudah' : 'belum' ,1,0);
                                $pdf->Cell(35,6,($varab['bukti_foto']) ? 'sudah' : 'belum' ,1,0);
                                $pdf->Cell(35,6,$varab['status_rab'],1,1);
                            }
                        }
                    }
                }



                }
            }
            
        }
        
    
        $pdf->Output();
        
    }

}

/* End of file V_laporan.php */
/* Location: ./application/controllers/pimpinan/V_laporan.php */