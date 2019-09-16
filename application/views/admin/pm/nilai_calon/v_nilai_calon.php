<!DOCTYPE html>
<html>
<?php $this->load->view('admin/template/head');?>
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('admin/template/header');?>

<?php $this->load->view('admin/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        NILAI CALON
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-gear"></i> Nilai calon</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered">
                <tr style="background-color: #00c0ef;">
                  <th rowspan="2" class="text-center" width="50">NO</th>
                  <th rowspan="2" class="text-center" width="200">CALON TENAN</th>
                  <th colspan="10" class="text-center">NILAI SUB ASPEK</th>
                </tr>
                <tr style="background-color: #d2d6de;">
                  <?php 
                    foreach ($sub->result() as $row) : 
                  ?>
                    <th class="text-center"><?= $row->nama_sub?></th>
                  <?php endforeach; ?>
                </tr>
                  <?php 
                    $count = 0;
                     foreach ($data as $row) : 
                    $count++;
                  ?>
                <tr>
                  <td><?= $count ?></td>
                  <td><?= $row["nama"] ?></td>
                  <?php foreach ($sub->result() as $key) : ?>
                    <td><?= $row["data"][$key->id_sub] ?></td>
                  <?php endforeach; ?>
                </tr>
                <?php endforeach; ?> 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

        <a href="<?= base_url()?>admin/pm/nilai_calon/perhitungan">
            <button type="button" class="btn btn-danger">
              MULAI HITUNG PROFILE MATCHING
            </button>
        </a>
    </section>
  
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/template/footer');?>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

  </body>
</html>
