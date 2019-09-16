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
    
   <!--  <div class="flash-pass" data-flashdata="<?php echo $this->session->flashdata('error');?>">
    </div> -->

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Ganti Password</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/page_admin/save_password')?>" method="post">
                <div class="col-lg-6 col-lg-offset-3">

              <div class="flash-pass" data-flashdata="<?php echo $this->session->flashdata('error');?>">
              </div>

                  <div class="form-group">
                    <label for="old">Password Lama</label>
                    <input type="password" class="form-control" id="old" name="old">
                  </div>

                  <div class="form-group">
                    <label for="new">Password Baru</label>
                    <input type="password" class="form-control" id="new" name="new" minlength="5">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('new');?></small>

                  <div class="form-group">
                    <label for="re_new">Ulangi Password Baru</label>
                    <input type="password" class="form-control" id="re_new" name="re_new" minlength="5">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('re_new');?></small>

                </div>
   
          </div>

              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/page_admin">
                  <button type="button" class="btn btn-default">Tutup</button>
                </a>
                <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                <button type="submit" name="ganti" class="btn btn-primary">Ganti Password</button>
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

