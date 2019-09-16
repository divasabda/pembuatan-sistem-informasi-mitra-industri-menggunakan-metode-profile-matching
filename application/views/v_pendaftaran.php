
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrasi Tenan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition register-page">
<div class="container">
  <div class="register-logo">
    <b>Inkubator Bisnis</b>
  </div>

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Pendaftaran Calon Tenan</h3>
        </div>

        <div class="flash-user" data-flashdata="<?php echo $this->session->flashdata('user');?>">
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('Pendaftaran/daftar_calon')?>" method="post" enctype="multipart/form-data">
                <div class="col-md-6 col-lg-offset-3">
                  
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_pendaftaran" value="<?php echo $calon ?>" >
                  </div>

                  <div class="form-group">
                    <label for="email">Email Tenan</label>
                    <input type="text" class="form-control" name="email" placeholder="Masukkan Email">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('email');?></small>

                  <div class="form-group">
                    <label for="nama">Nama Tenan</label>
                    <input type="text" class="form-control" name="nama_pendaftaran" placeholder="Masukkan Nama">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nama_pendaftaran');?></small>

                  <div class="form-group">
                    <label for="user">User Tenan</label>
                    <input type="text" class="form-control" name="user_pendaftaran" placeholder="Masukkan User">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('user_pendaftaran');?></small>

                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control"  name="pass_pendaftaran" placeholder="Masukkan Password">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('pass_pendaftaran');?></small>

                  <div class="form-group">
                    <label for="level">Fokus Usaha</label>
                    <select class="form-control" name="fokus_usaha_pendaftaran" required="">
                     <option value=""> --Fokus usaha-- </option>
                      <?php foreach($fokus as $f):?>
                            <option value="<?php echo $f;?>"><?php echo $f;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                        <label for="pass">Alamat kantor</label>
                        <input type="text" class="form-control" name="alamat_kantor_pendaftaran" placeholder="Masukkan Alamat">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('alamat_kantor_kantor');?></small>
                  
                  <div class="box-header with-border">
                    <h4 class="box-title">SOAL PERTANYAAN</h4>
                    <p class="help-block">
                      Lengkapi Pertanyaan berikut!
                    </p>
                  </div>
                  <br>
                  <?php          
                     foreach ($pertanyaan->result() as $row) : ?>
                    <label><h4><?php echo $row->nama_pertanyaan ?></h4></label>
                    <input type="hidden" class="form-control" name="id_pertanyaan[]" value="<?php echo $row->id_pertanyaan ?>">
                      <br>
                      <select class="form-control" name="jawaban[<?php echo $row->id_pertanyaan ?>]" required="">
                       <option value=""> -- Pilih Jawaban -- </option>
                       <option value="1"> Sudah Mempunyai </option>
                       <option value="2"> Mempunyai Rancangan </option>
                       <option value="3"> Belum Mempunyai </option>
                      </select>
                      <br>
                  <?php endforeach; ?> 

                  <div>
                    <input type="checkbox" class="from-control" onchange="showHide(this.checked)" name="checkbox">  <p>Saya bersedia bergabung dan mengikuti semua peraturan yang telah ditetapkan oleh Inkubator Bisnis.</p>
                  </div>

                </div>
            </div>

        </div>
        <!-- /.box-body -->

              <div class="modal-footer">
                 <a href="<?php echo base_url('c_login')?>" class="pull-left">Saya Sudah Menjadi Tenan</a>
                <p id="hiddenButton" style ="display: none;">
                  <button type="submit" name="tambah" class="btn btn-primary">Kirim Form Pendaftaran</button>
                </p>
                </form>
              </div>
      </div>
  <!-- /.form-box -->
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
function showHide(checked)
{
  if (checked == true)
    $("#hiddenButton").fadeIn();
  else 
    $("#hiddenButton").fadeOut();
}  
</script>

</body>
</html>
