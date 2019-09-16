<!DOCTYPE html>
<html>
<?php $this->load->view('anggota/template/head');?>
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('anggota/template/header');?>

<?php $this->load->view('anggota/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        List Kegiatan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-gears"></i> Kegiatan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="flash-kegiatan" data-flashdata="<?php echo $this->session->flashdata('upload');?>">

      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Proyek</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NAMA PROYEK</th>
                  <th>LAMA PROYEK</th>
                  <th>MULAI PROYEK</th>
                  <th>SELESAI PROYEK</th>
                  <th>NILAI PROYEK</th>
                  <th>STATUS PROYEK</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($proyek->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->nama_proyek;?>
                  </td>
                  <td>
                    <?php echo $row->lama_proyek." Hari";?>
                  </td>
                  <td>
                    <?php echo $row->mulai_proyek;?>
                  </td>
                  <td>
                    <?php echo $row->selesai_proyek;?>
                  </td>
                  <td>
                    <?php echo "Rp. ".number_format($row->nilai_proyek);?>
                  </td>
                  <td>
                    <?php if($row->status_proyek == "pending" ) :?>
                      <span class="label label-warning">Pending</span>
                    <?php elseif ($row->status_proyek == "proses") : ?>
                      <span class="label label-primary">Proses</span>
                   <?php elseif ($row->status_proyek == "selesai") : ?>
                      <span class="label label-success">Selesai</span>
                    <?php endif ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              </table>
            </div>
        </div>

         <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">RAB</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID RAB</th>
                  <th>NAMA PROYEK</th>
                  <th>NAMA RAB</th>
                  <th>DANA RAB</th>
                  <th>STATUS RAB</th>
                  <th width="10%">LAPORAN KEGIATAN</th>
                  <th width="10%">LAPORAN KEUANGAN</th>
                  <th width="10%">FOTO KEGIATAN</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($rab->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->id_rab;?>
                  </td>
                  <td>
                    <?php echo $row->nama_proyek;?>
                  </td>
                  <td>
                    <?php echo $row->nama_rab;?>
                  </td>
                  <td>
                    <?php echo "Rp. ".number_format($row->dana_rab);?>
                  </td>
                  <td>
                    <?php if($row->status_rab == "pending" ) :?>
                      <span class="label label-warning">Pending</span>
                    <?php elseif ($row->status_rab == "proses") : ?>
                      <span class="label label-primary">Proses</span>
                   <?php elseif ($row->status_rab == "selesai") : ?>
                      <span class="label label-success">Selesai</span>
                    <?php endif ?>
                  </td>
                  <td>
                    <?=(!empty($row->bukti_kegiatan)) ? '' : "&minus;";?>
                        <?php if (!empty($row->bukti_kegiatan)) { ?>
                        <a class="btn btn-primary btn-xs hp" href="<?=site_url('upload/rab/bukti_kegiatan/'.$row->bukti_kegiatan)?>" target="_blank" >Lihat</a>
                        <?php } ?>
                  </td>
                  <td>
                    <?=(!empty($row->bukti_keuangan)) ? '' : "&minus;";?>
                        <?php if (!empty($row->bukti_keuangan)) { ?>
                        <a class="btn btn-primary btn-xs hp" href="<?=site_url('upload/rab/bukti_keuangan/'.$row->bukti_keuangan)?>" target="_blank" >Lihat</a>
                        <?php } ?>
                  </td>
                  <td>
                    <?=(!empty($row->bukti_foto)) ? '' : "&minus;";?>
                        <?php if (!empty($row->bukti_foto)) { ?>
                        <a class="btn btn-primary btn-xs hp" href="<?=site_url('upload/rab/bukti_foto/'.$row->bukti_foto)?>" target="_blank" >Lihat</a>
                        <?php } ?>
                  </td>
                  <td>
                     <?php if($row->status_rab == "proses") :?>
                     <a href ="<?=base_url('anggota/kegiatan/upload_kegiatan/'.$row->id_rab)?>" class="btn btn-success"><i class="fa fa-calendar-plus-o"></i></a>                        
                    <?php endif ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              </table>
            </div>
        </div>
    </section>
    
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('anggota/template/footer');?>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>


<script>
  $(function () {
    $('#example').DataTable()
    $('#example2').DataTable()
  })
</script>
  </body>
</html>
<!-- 

<script>
      $('.tombol-hapus').on('click', function(e) {

          e.preventDefault();
          const href = $(this).attr('href');

        Swal({
          title: 'Apakah anda yakin?',
          text: "Ingin melakukan ini!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.value) {
              document.location.href = href;
          }
        })
    });
</script> -->