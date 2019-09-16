<!DOCTYPE html>
<html>
<?php $this->load->view('admin/template/head');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('admin/template/header'); ?>

<?php $this->load->view('admin/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah User Tenan</h3>
        </div>

        <div class="flash-user" data-flashdata="<?php echo $this->session->flashdata('user');?>">
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/crud_anggota/tambah')?>" method="post" enctype="multipart/form-data">
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="nama">Email Tenan</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email') ?>" placeholder="Masukkan Email">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('email');?></small>

                  <div class="form-group">
                    <label for="nama">Nama Tenan</label>
                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?php echo set_value('nama_anggota') ?>" placeholder="Masukkan Nama">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nama_anggota');?></small>

                </div>
            <!-- /.col -->

                <div class="col-md-6">

                  <div class="form-group">
                    <label for="user">User Tenan</label>
                    <input type="text" class="form-control" id="user_anggota" name="user_anggota" value="<?php echo set_value('user_anggota') ?>" placeholder="Masukkan User">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('user_anggota');?></small>

                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass_anggota" name="pass_anggota" placeholder="Masukkan Password">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('pass_anggota');?></small>
                </div>
          </div>

          <div class="box-header with-border">
            <h4 class="box-title">Profile Perusahaan</h4>
            <p class="help-block">
              Format gambar yang diperbolehkan *.png, *.jpg dan ukuran maksimal 2 MB. 
              <br>
              Jika foto lebih dari 1, mohon zip file. </p>
          </div>
          <br>
          <div class="col-md-6">

             <div class="form-group">
                    <label for="level">Fokus Usaha</label>
                    <select class="form-control id="fokus_usaha" name="fokus_usaha" required="">
                     <option value=""> --Fokus usaha-- </option>
                      <?php foreach($fokus as $f):?>
                            <option value="<?php echo $f;?>"><?php echo $f;?></option>
                      <?php endforeach; ?>
                    </select>
             </div>

              <div class="form-group">
                    <label for="pass">Alamat kantor</label>
                    <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor" value="<?php echo set_value('alamat_kantor') ?>" placeholder="Masukkan Alamat">
              </div>
                  <small class="form text text-danger"><?php echo form_error('alamat_kantor');?></small>

              <div class="form-group">
                  <label for="user">Produk</label>
                  <input type="file" class="form-control" id="produk" name="produk">
              </div>
                 <small class="text-danger"><?=!empty($er_pro) ? $er_pro : "";?></small>

               <div class="form-group">
                  <label for="user">Legalitas</label>
                  <input type="file" class="form-control" id="user" name="legalitas">
              </div>
              <small class="text-danger"><?=!empty($er_legal) ? $er_legal : "";?></small>
           </div>

      <div class="col-md-6">
              <div class="form-group">
                  <label for="user">Struktur organisasi</label>
                  <input type="file" class="form-control" id="user" name="struktur_organisasi">
              </div>
              <small class="text-danger"><?=!empty($er_struk) ? $er_struk : "";?></small>

               <div class="form-group">
                  <label for="user">Branding</label>
                  <input type="file" class="form-control" id="user" name="branding">
              </div>
              <small class="text-danger"><?=!empty($er_bran) ? $er_bran : "";?></small>

               <div class="form-group">
                  <label for="user">Ijin</label>
                  <input type="file" class="form-control" id="user" name="ijin">
              </div>
              <small class="text-danger"><?=!empty($er_ijin) ? $er_ijin : "";?></small>
        </div>

        </div>
        <!-- /.box-body -->

              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/crud_anggota">
                  <button type="button" class="btn btn-default">Tutup</button>
                </a>
                <button type="reset" name="reset" class="btn btn-warning">Reset Data</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                </form>
              </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/template/footer');?>
</div>

</body>
</html>
