<!DOCTYPE html>
<html>
<?php $this->load->view('anggota/template/head');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('anggota/template/header'); ?>

<?php $this->load->view('anggota/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('anggota/profile/saveupload')?>" method="post" enctype="multipart/form-data">
            <!-- /.col -->
          </div>

          <div class="box-header with-border">
            <h4 class="box-title">Profile Perusahaan</h4>
            <p class="help-block">Format gambar yang diperbolehkan *.png, *.jpg, *.jpeg dan ukuran maksimal 2 MB.
              <br>Apabila foto lebih dari 1 mohon di zip</p>
          </div>
      <br>
      <div class="col-md-6 col-lg-offset-3">

              <div class="form-group">
                  <label for="user">Produk</label>
                  <br>
                  <?php file_exists('./upload/produk/' . $produk) ?>
                    <a href="<?=site_url('upload/produk/' . $produk)?>" target="_blank" ><?=$produk?></a>
                  <?php ?>
                  <input type="file" class="form-control" id="produk" name="produk">
                  <input type="hidden" name="old_produk" value = "<?php echo $produk ?>">
              </div>
                 <small class="text-danger"><?=!empty($er_pro) ? $er_pro : "";?></small>

               <div class="form-group">
                  <label for="user">Legalitas</label>
                  <br>
                  <?php file_exists('./upload/legalitas/' . $legalitas) ?>
                    <a href="<?=site_url('upload/legalitas/' . $legalitas)?>" target="_blank" ><?=$legalitas?></a>
                <?php ?>
                  <input type="file" class="form-control" id="user" name="legalitas">
                  <input type="hidden" name="old_legal" value = "<?php echo $legalitas ?>">
              </div>
              <small class="text-danger"><?=!empty($er_legal) ? $er_legal : "";?></small>

               <div class="form-group">
                  <label for="user">Struktur organisasi</label>
                  <br>
                  <?php file_exists('./upload/struktur_organisasi/' . $struktur_organisasi) ?>
                    <a href="<?=site_url('upload/struktur_organisasi/' . $struktur_organisasi)?>" target="_blank" ><?=$struktur_organisasi?></a>
                <?php ?>
                  <input type="file" class="form-control" id="user" name="struktur_organisasi">
                  <input type="hidden" name="old_struk" value = "<?php echo $struktur_organisasi ?>">
              </div>
              <small class="text-danger"><?=!empty($er_struk) ? $er_struk : "";?></small>

               <div class="form-group">
                  <label for="user">Branding</label>
                  <br>
                  <?php file_exists('./upload/branding/' . $branding) ?>
                    <a href="<?=site_url('upload/branding/' . $branding)?>" target="_blank" ><?=$branding?></a>
                <?php ?>
                  <input type="file" class="form-control" id="user" name="branding">
                  <input type="hidden" name="old_branding" value = "<?php echo $branding ?>">
              </div>
              <small class="text-danger"><?=!empty($er_bran) ? $er_bran : "";?></small>

               <div class="form-group">
                  <label for="user">Ijin</label>
                  <br>
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
                <a href="<?php echo base_url()?>anggota/profile">
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
  <?php $this->load->view('anggota/template/footer');?>
</div>

</body>
</html>
