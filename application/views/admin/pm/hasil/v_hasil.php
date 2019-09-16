<!DOCTYPE html>
<html>
<?php $this->load->view('admin/template/head');?>
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php $this->load->view('admin/template/head');?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('admin/template/header');?>

<?php $this->load->view('admin/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        HASIL PERHITUNGAN
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-gear"></i> Data Calon Tenan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="flash-hasil" data-flashdata="<?php echo $this->session->flashdata('nilai');?>">
    </div>
      
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA CALON TENAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID CALON TENAN</th>
                  <th>NAMA CALON TENAN</th>
                  <th>HASIL PENILAIAN</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($hasil->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <td>
                    <?php echo $count;?>
                  </td> 
                  <td>
                    <?php echo $row->id_pendaftaran;?>
                  </td>
                  <td>
                    <?php echo $row->nama_pendaftaran;?>
                  </td>
                  <td>
                    <?php echo $row->total_nilai;?>
                  </td>
                  <td>                  
                    <a href ="<?php echo base_url('admin/pm/hasil/tambah_calon/'.$row->id_pendaftaran);?>" class="btn btn-success tombol-hapus"><i class="glyphicon glyphicon-plus"></i></a>
                      
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>

    </section>
  
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/template/footer');?>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>



<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
  </body>
</html>
