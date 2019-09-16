<!DOCTYPE html>
<html>
<?php $this->load->view('pimpinan/template/head');?>
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php $this->load->view('pimpinan/template/head');?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('pimpinan/template/header');?>

<?php $this->load->view('pimpinan/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Group Anggota
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Group</a></li>
        <li class="active">Group Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('crud');?>">
    <div class="flash-error" data-flashdata="<?php echo $this->session->flashdata('error');?>">
      
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Group 1</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID GROUP</th>
                  <th>NAMA ANGGOTA</th>
                  <th>NAMA PIC</th>
                  <th>KETERANGAN</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($group1->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->id_group;?>
                  </td>
                  <td>
                    <?php echo $row->nama_anggota;?>
                  </td>
                  <td>
                    <?php echo $row->nama_pic;?>
                  </td>
                  <td>
                    <?php echo $row->deskripsi;?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>


                  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Group 2</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID GROUP</th>
                  <th>NAMA ANGGOTA</th>
                  <th>NAMA PIC</th>
                  <th>KETERANGAN</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($group2->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->id_group;?>
                  </td>
                  <td>
                    <?php echo $row->nama_anggota;?>
                  </td>
                  <td>
                    <?php echo $row->nama_pic;?>
                  </td>
                  <td>
                    <?php echo $row->deskripsi;?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>

    </section>
    
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('pimpinan/template/footer');?>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
  })
</script>
  </body>
</html>
