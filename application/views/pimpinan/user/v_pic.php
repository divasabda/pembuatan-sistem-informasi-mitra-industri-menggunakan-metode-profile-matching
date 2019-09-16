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
        PIC
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> User</a></li>
        <li class="active">Pic</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('crud');?>">
    </div>
      
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pic</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID PIC</th>
                  <th>NAMA PIC</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($pic->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->id_pic;?>
                  </td>
                  <td width="450">
                    <?php echo $row->nama_pic;?>
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
<?php $this->load->view('pimpinan/template/footer');?>
</div>
</body>
</html>
<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
