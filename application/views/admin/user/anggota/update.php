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
          <h3 class="box-title">Edit User</h3>
        </div>

        <div class="flash-user" data-flashdata="<?php echo $this->session->flashdata('user');?>">
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/crud_anggota/update')?>" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                  <input type="hidden" class="form-control " id="id_anggota" name="id_anggota" value="<?php echo $id_anggota ?>">
                  <div class="form-group">
                    <label for="nama">Email Anggota</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Masukkan Email">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('email');?></small>

                  <div class="form-group">
                    <label for="nama">Nama Anggota</label>
                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?php echo $nama_anggota; ?>" placeholder="Masukkan Nama">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nama_anggota');?></small>

                </div>
            <!-- /.col -->

                <div class="col-md-6">

                  <div class="form-group">
                    <label for="user">User Anggota</label>
                    <input type="text" class="form-control" id="user_anggota" name="user_anggota" value="<?php echo $user_anggota; ?>" placeholder="Masukkan User">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('user_anggota');?></small>

                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass_anggota" name="pass_anggota" value = "<?php echo $pass_anggota; ?>" readonly="readonly placeholder="Masukkan Password">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('pass_anggota');?></small>
                </div>
          </div>

          <div class="box-header with-border">
            <h4 class="box-title">Profile Perusahaan</h4>
            <p class="help-block">Format gambar yang diperbolehkan *.png, *.jpg dan ukuran maksimal 2 MB.
            <br>
              Jika foto lebih dari 1, mohon zip file.
            </p>
          </div>
      <br>
      <div class="col-md-6">

             <div class="form-group">
                    <label for="level">Fokus Usaha</label>
                    <select class="form-control id="fokus_usaha" name="fokus_usaha" required="">
                     <option value=""> --Fokus usaha-- </option>
                      <?php foreach($fokus as $f):?>
      
                      <?php if($f == $fokus_usaha) :?>
                            <option value="<?php echo $f;?>" selected ><?php echo $f;?></option>
                        <?php else :?>
                            <option value="<?php echo $f;?>"><?php echo $f;?></option>
                      <?php endif; ?>

                      <?php endforeach; ?>
                    </select>
             </div>

              <div class="form-group">
                    <label for="pass">Alamat kantor</label>
                    <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor" value="<?php echo $alamat_kantor; ?>" placeholder="Masukkan Alamat">
              </div>
                  <small class="form text text-danger"><?php echo form_error('alamat_kantor');?></small>

              <div class="form-group">

                  <label for="user">Produk : </label>
                  <?php file_exists('./upload/produk/' . $produk) ?>
                    <a href="<?=site_url('upload/produk/' . $produk)?>" target="_blank" ><?=$produk?></a>
                  <?php ?>
                  <input type="file" class="form-control" id="produk" name="produk">
                  <input type="hidden" name="old_produk" value = "<?php echo $produk ?>">
              </div>
                 <small class="text-danger"><?=!empty($er_pro) ? $er_pro : "";?></small>

               <div class="form-group">
                  <label for="user">Legalitas : </label>
                  <?php file_exists('./upload/legalitas/' . $legalitas) ?>
                    <a href="<?=site_url('upload/legalitas/' . $legalitas)?>" target="_blank" ><?=$legalitas?></a>
                <?php ?>
                  <input type="file" class="form-control" id="user" name="legalitas">
                  <input type="hidden" name="old_legal" value = "<?php echo $legalitas ?>">
              </div>
              <small class="text-danger"><?=!empty($er_legal) ? $er_legal : "";?></small>
      </div>

      <div class="col-md-6">
               <div class="form-group">
                  <label for="user">Struktur organisasi : </label>
                  <?php file_exists('./upload/struktur_organisasi/' . $struktur_organisasi) ?>
                    <a href="<?=site_url('upload/struktur_organisasi/' . $struktur_organisasi)?>" target="_blank" ><?=$struktur_organisasi?></a>
                <?php ?>
                  <input type="file" class="form-control" id="user" name="struktur_organisasi">
                  <input type="hidden" name="old_struk" value = "<?php echo $struktur_organisasi ?>">
              </div>
              <small class="text-danger"><?=!empty($er_struk) ? $er_struk : "";?></small>

               <div class="form-group">
                  <label for="user">Branding : </label>
                  <?php file_exists('./upload/branding/' . $branding) ?>
                    <a href="<?=site_url('upload/branding/' . $branding)?>" target="_blank" ><?=$branding?></a>
                <?php ?>
                  <input type="file" class="form-control" id="user" name="branding">
                  <input type="hidden" name="old_branding" value = "<?php echo $branding ?>">
              </div>
              <small class="text-danger"><?=!empty($er_bran) ? $er_bran : "";?></small>

               <div class="form-group">
                  <label for="user">Ijin : </label>
                <?php file_exists('./upload/ijin/' . $ijin) ?>
                    <a href="<?=site_url('upload/ijin/' . $ijin)?>" target="_blank" ><?=$ijin?></a>
                <?php ?>
                  <input type="file" class="form-control" id="user" name="ijin">
                  <input type="hidden" name="old_ijin" value = "<?php echo $ijin ?>">
              </div>
              <small class="text-danger"><?=!empty($er_ijin) ? $er_ijin : "";?></small>
        </div>

        </div>
        <!-- /.box-body -->

              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/crud_anggota">
                  <button type="button" class="btn btn-default">Close</button>
                </a>
                <button type="submit" name="tambah" class="btn btn-primary">Edit Data</button>
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
