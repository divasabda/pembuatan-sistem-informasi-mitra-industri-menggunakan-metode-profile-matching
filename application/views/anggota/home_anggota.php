
<!DOCTYPE html>
<html>

<?php $this->load->view('anggota/template/head');?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('anggota/template/header');?>

<?php $this->load->view('anggota/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i>Home</li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h2 class="profile-username text-center">PIC ANDA :</h2>
              <!-- <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> -->
              <h3 class="profile-username text-center"><?php echo $nama_pic?></h3>
<!--               <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>ID anggota :</b>
                  <br>
                  <a><?php echo $nomer_pic?></a>
                </li>
                <li class="list-group-item">
                  <b>Email :</b> 
                  <br>
                  <a><?php echo $email?></a>
                </li>
              </ul> -->
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $proyek ?></h3>

              <p>PROYEK</p>
            </div>
            <div class="icon">
              <i class="fa fa-gear"></i>
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $rab ?></h3>

              <p>RAB</p>
            </div>
            <div class="icon">
              <i class="fa fa-gear"></i>
            </div>
          </div>
        </div>

      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('anggota/template/footer');?>
  </body>
</html>
