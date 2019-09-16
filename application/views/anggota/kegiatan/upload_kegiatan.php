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
            <form action="<?php echo base_url('anggota/kegiatan/saveupload')?>" method="post" enctype="multipart/form-data">
            <!-- /.col -->
          </div>

          <div class="box-header with-border">
            <h4 class="box-title">UPLOAD LAPORAN</h4>
          </div>
      <br>
      <div class="col-md-6 col-lg-offset-3">

              <div class="form-group">
                <label for="nama">ID RAB</label>
                <input type="text" value="<?php echo $id_rab ?>" readonly="readonly" class="form-control" id="id_rab" name="id_rab">
              </div>

              <div class="form-group">
                  <label for="user">Laporan Kegiatan</label>
                  <br>
                  <?php file_exists('./upload/rab/bukti_kegiatan/' . $bukti_kegiatan ) ?>
                    <a href="<?=site_url('upload/rab/bukti_kegiatan/' . $bukti_kegiatan)?>" target="_blank" ><?=$bukti_kegiatan ?></a>
                  <?php ?>
                  <input type="file" class="form-control" id="bukti_kegiatan" name="bukti_kegiatan">
                  <input type="hidden" name="old_kegiatan" value = "<?php echo $bukti_kegiatan ?>">
              </div>
                 <small class="text-danger"><?=!empty($er_kegiatan) ? $er_kegiatan : "";?></small>
                 <p class="help-block">* Format laporan kegiatan berupa PDF</p>

               <div class="form-group">
                  <label for="user">Laporan Keuangan</label>
                  <br>
                  <?php file_exists('./upload/rab/bukti_keuangan/' . $bukti_keuangan) ?>
                    <a href="<?=site_url('upload/rab/bukti_keuangan/' . $bukti_keuangan)?>" target="_blank" ><?=$bukti_keuangan?></a>
                <?php ?>
                  <input type="file" class="form-control" id="bukti_keuangan" name="bukti_keuangan">
                  <input type="hidden" name="old_keuangan" value = "<?php echo $bukti_keuangan ?>">
              </div>
              <small class="text-danger"><?=!empty($er_keuangan) ? $er_keuangan : "";?></small>
              <p class="help-block">* Laporan Keuangan Berupa File Excel</p>

               <div class="form-group">
                  <label for="user">Laporan Foto Kegiatan</label>
                  <br>
                  <?php file_exists('./upload/rab/bukti_foto/' . $bukti_foto) ?>
                    <a href="<?=site_url('upload/rab/bukti_foto/' . $bukti_foto)?>" target="_blank" ><?=$bukti_foto?></a>
                <?php ?>
                  <input type="file" class="form-control" id="bukti_foto" name="bukti_foto">
                  <input type="hidden" name="old_foto" value = "<?php echo $bukti_foto ?>">
              </div>
              <small class="text-danger"><?=!empty($er_foto) ? $er_foto : "";?></small>
               <p class="help-block">* Format gambar yang diperbolehkan *.png, *.jpg, *.jpeg dan ukuran maksimal 2 MB.
              <br>* Apabila foto lebih dari 1 mohon di zip</p>

        </div>

        </div>
        <!-- /.box-body -->

              <div class="modal-footer">
                <a href="<?php echo base_url()?>anggota/kegiatan">
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
