
<!DOCTYPE html>
<html>
<?php $this->load->view('pic/template/head');?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('pic/template/header');?>

<?php $this->load->view('pic/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <!-- <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> -->

              <h3 class="profile-username text-center"><?php echo $nama_anggota?></h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>ID anggota :</b>
                  <br>
                  <a><?php echo $id_anggota?></a>
                </li>
                <li class="list-group-item">
                  <b>Email :</b> 
                  <br>
                  <a><?php echo $email?></a>
                </li>
                <li class="list-group-item">
                  <b>Fokus Usaha :</b>
                  <br>
                  <a ><?php echo $fokus_usaha?></a>
                </li>
                <li class="list-group-item">
                  <b>Alamat Kantor :</b> 
                  <br>
                  <a><?php echo $alamat_kantor?></a>
                </li>
              </ul>

              <br>
              <a href="<?php echo base_url()?>pic/v_anggota" class="btn btn-default btn-block"><b>Back</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">PROFILE PERUSAHAAN</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="14.285%">Produk</th>
                            <th width="14.285%">Legalitas</th>
                            <th width="14.285%">Struktur Organisasi</th>
                            <th width="14.285%">Branding</th>
                            <th width="14.285%">Ijin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?=(!empty($produk)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                            <td><?=(!empty($legalitas)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                            <td><?=(!empty($struktur_organisasi)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                            <td><?=(!empty($branding)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                            <td><?=(!empty($ijin)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                        </tr>
                        <tr class="hp">
                            <td>
                                <?php if (!empty($produk)) { ?>
                                    <a class="btn btn-default btn-xs hp" href="<?=site_url('upload/produk/'.$produk)?>" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (!empty($legalitas)) { ?>
                                    <a class="btn btn-default btn-xs hp" href="<?=site_url('upload/legalitas/'.$legalitas)?>" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (!empty($struktur_organisasi)) { ?>
                                    <a class="btn btn-default btn-xs hp" href="<?=site_url('upload/struktur_organisasi/'.$struktur_organisasi)?>" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (!empty($branding)) { ?>
                                    <a class="btn btn-default btn-xs hp" href="<?=site_url('upload/branding/'.$branding)?>" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (!empty($ijin)) { ?>
                                    <a class="btn btn-default btn-xs hp" href="<?=site_url('upload/ijin/'.$ijin)?>" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('pic/template/footer');?>
</body>
</html>
