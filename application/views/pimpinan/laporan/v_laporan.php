
<!DOCTYPE html>
<html>
<?php $this->load->view('pimpinan/template/head');?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- <div class="wrapper"> -->

<?php $this->load->view('pimpinan/template/header');?>

<?php $this->load->view('pimpinan/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>Proyek</h3>
              <p>Laporan Proyek</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text-o"></i>
            </div>
            <a href="<? echo base_url()?>pimpinan/v_laporan/laporan_proyek" class="small-box-footer" target="_blank">
                <button type="button" class="btn btn-block btn-primary">Download Laporan</button>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>RAB</h3>

              <p>Laporan Rab</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text-o"></i>
            </div>
            <a href="<? echo base_url()?>pimpinan/v_laporan/laporan_rab" class="small-box-footer" target="_blank">
               <button type="button" class="btn btn-block btn-primary">Download Laporan</button>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-teal">
            <div class="inner">
              <h3>GROUP 1</h3>

              <p>Laporan Group 1</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text-o"></i>
            </div>
            <a href="<? echo base_url()?>pimpinan/v_laporan/laporan_group1" class="small-box-footer" target="_blank">
               <button type="button" class="btn btn-block btn-primary">Download Laporan</button>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-teal">
            <div class="inner">
              <h3>GROUP 2</h3>

              <p>Laporan Group 2</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text-o"></i>
            </div>
            <a href="<? echo base_url()?>pimpinan/v_laporan/laporan_group2" class="small-box-footer" target="_blank">
               <button type="button" class="btn btn-block btn-primary">Download Laporan</button>
            </a>
          </div>
        </div>


      </div>
        <!-- ./col -->

      </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('pimpinan/template/footer');?>
</body>
</html>
