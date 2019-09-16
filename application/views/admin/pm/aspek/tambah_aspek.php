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
          <h3 class="box-title">Tambah Aspek</h3>
        </div>
      
      <div class="flash-user" data-flashdata="<?php echo $this->session->flashdata('user');?>">
    </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/pm/aspek/tambah_aspek')?>" method="post">
                <div class="col-md-6 col-lg-offset-3">

                  <div class="form-group">
                    <label for="id_aspek">ID Aspek</label>
                    <input type="text" value="<?php echo $kodeunik ?>" readonly="readonly" class="form-control" id="id_aspek" name="id_aspek">
                  </div>

                  <div class="form-group">
                    <label for="nama_aspek">Nama Aspek</label>
                    <input type="text" class="form-control" id="nama_aspek" name="nama_aspek" value="<?php echo set_value('nama_aspek') ?>" placeholder="Nama Aspek">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nama_aspek');?></small>
              
                  <div class="form-group">
                    <label for="user">Presentase</label>
                    <input type="number" class="form-control" id="presentase" name="presentase" value="<?php echo set_value('presentase') ?>" placeholder="Presentase">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('presentase');?></small>

                  <div class="form-group">
                    <label for="nilai_cf">Bobot CF</label>
                    <input type="number" class="form-control" id="bobot_cf" name="bobot_cf" value="<?php echo set_value('bobot_cf') ?>" placeholder="Bobot CF">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('bobot_cf');?></small>

                  <div class="form-group">
                    <label for="nilai_sf">Bobot SF</label>
                    <input type="number" class="form-control" id="bobot_sf" name="bobot_sf" value="<?php echo set_value('bobot_sf') ?>" placeholder="Bobot SF">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('bobot_sf');?></small>

              </div>

            </div>

            <!-- /.col -->
          </div>

              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/pm/aspek">
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
