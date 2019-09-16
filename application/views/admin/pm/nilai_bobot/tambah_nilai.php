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
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Nilai Bobot</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/pm/nilai_bobot/tambah_nilai')?>" method="post">
                <div class="col-md-6 col-lg-offset-3">

                  <div class="form-group">
                    <label for="id_aspek">ID Selisih</label>
                    <input type="number" value="<?php echo set_value('selisih') ?>"  class="form-control" id="selisih" name="selisih" placeholder="Masukkan Selisih">
                  </div>

                  <div class="form-group">
                    <label for="nama_aspek">Bobot</label>
                    <input type="number" step="any" class="form-control" name="bobot" value="<?php echo set_value('bobot') ?>" placeholder="Masukkan Bobot">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('bobot');?></small>
              
                  <div class="form-group">
                    <label for="user">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo set_value('keterangan') ?>" placeholder="Masukkan Keterangan">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('keterangan');?></small>

              </div>

            </div>

            <!-- /.col -->
          </div>

              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/pm/nilai_bobot">
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
