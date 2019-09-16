<!DOCTYPE html>
<html>
<?php $this->load->view('pic/template/head');?>
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('pic/template/header');?>

<?php $this->load->view('pic/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        List Proyek
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-gears"></i> Proyek</a></li>
        <li class="active">Proyek</li>
      </ol>
      <br>
      <a href="<?= base_url()?>pic/proyek/tambahProyek">
          <button type="button" class="btn btn-success">
             <span class="glyphicon glyphicon-plus"></span> Proyek baru
          </button>
      </a>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="flash-proyek" data-flashdata="<?php echo $this->session->flashdata('crud');?>">

      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Proyek</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID PROYEK</th>
                  <th>NAMA ANGGOTA</th>
                  <th>NAMA PIC</th>
                  <th>NAMA PROYEK</th>
                  <th>LAMA PROYEK</th>
                  <th>MULAI PROYEK</th>
                  <th>SELESAI PROYEK</th>
                  <th>NILAI PROYEK</th>
                  <th>STATUS PROYEK</th>
                  <th>AKSI</th>
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
                    <?php echo $row->id_proyek;?>
                  </td>
                  <td>
                    <?php echo $row->nama_anggota;?>
                  </td>
                  <td>
                    <?php echo $row->nama_pic;?>
                  </td>
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
                  <td>
                    <a href ="<?=base_url('pic/proyek/get_edit/'.$row->id_proyek)?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href ="<?=base_url('pic/proyek/hapus/'.$row->id_proyek)?>" class="btn btn-danger tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>

    </section>
    
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('pic/template/footer');?>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>


<script>
  $(function () {
    $('#example2').DataTable()
  })
</script>
  </body>
</html>


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
</script>