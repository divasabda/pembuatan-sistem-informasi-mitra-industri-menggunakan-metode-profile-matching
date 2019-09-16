<!DOCTYPE html>
<html>
<?php $this->load->view('pimpinan/template/head');?>
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('pimpinan/template/header');?>

<?php $this->load->view('pimpinan/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TENAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> User</a></li>
        <li class="active">Tenan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('crud');?>">
    <div class="flash-error" data-flashdata="<?php echo $this->session->flashdata('error');?>">
      
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tenan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID TENAN</th>
                  <th>EMAIL TENAN</th>
                  <th>PIC TENAN</th>
                  <th>NAMA TENAN</th>
                  <th>USER TENAN</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($tenan->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->id_anggota;?>
                  </td>
                  <td width="450">
                    <?php echo $row->email;?>
                  </td>
                  <td>
                    <?php echo $row->nama_pic;?>
                  </td>
                  <td>
                    <?php echo $row->nama_anggota;?>
                  </td>
                  <td>
                    <?php echo $row->user_anggota;?>
                  </td>
                  <td width="150">
                    <a href ="<?php echo base_url('pimpinan/v_anggota/view/'.$row->id_anggota);?>" class="btn btn-primary"><i class="glyphicon glyphicon-zoom-in"></i></a>
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
  })
</script>
  </body>
</html>
