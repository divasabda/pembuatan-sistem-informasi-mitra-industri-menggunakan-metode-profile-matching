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
        LIST DETAIL RAB
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-cog"></i> Detail RAB</a></li>
        <li class="active">Data Detail</li>
      </ol>
      <br>
      <a href="<?= base_url()?>pic/d_rab/tambahDetail">
          <button type="button" class="btn btn-success">
             <span class="glyphicon glyphicon-plus"></span> Proyek baru
          </button>
      </a>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="flash-detail" data-flashdata="<?php echo $this->session->flashdata('crud');?>">
    <div class="flash-error_dana_detail" data-flashdata="<?php echo $this->session->flashdata('dana_error');?>">

      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Detail RAB</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID DETAIL</th>
                  <th>NAMA RAB</th>
                  <th>NAMA DETAIL RAB</th>
                  <th>DANA DETAIL RAB</th>
                  <th>STATUS DETAIL</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($detail->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->id_d_rab;?>
                  </td>
                  <td>
                    <?php echo $row->nama_rab;?>
                  </td>
                  <td>
                    <?php echo $row->nama_detail;?>
                  </td>
                  <td>
                    <?php echo "Rp. ".number_format($row->dana_detail);?>
                  </td>
                  <td>
                    <?php if($row->status_detail == "pending" ) :?>
                      <span class="label label-warning">Pending</span>
                    <?php elseif ($row->status_detail == "proses") : ?>
                      <span class="label label-primary">Proses</span>
                   <?php elseif ($row->status_detail == "selesai") : ?>
                      <span class="label label-success">Selesai</span>
                    <?php endif ?>
                  </td>
                  <td>
                    <a href ="<?=base_url('pic/d_rab/get_edit/'.$row->id_d_rab)?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href ="<?=base_url('pic/d_rab/hapus/'.$row->id_d_rab)?>" class="btn btn-danger tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
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