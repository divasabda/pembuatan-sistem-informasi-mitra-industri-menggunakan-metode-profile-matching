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
          <h3 class="box-title">Tambah User Admin</h3>
        </div>
      
      <div class="flash-user" data-flashdata="<?php echo $this->session->flashdata('user');?>">
    </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/crud_admin/tambah')?>" method="post">
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="nama">ID Admin</label>
                    <input type="text" value="<?php echo $kodeunik ?>" readonly="readonly" class="form-control" id="id" name="id_admin">

                  </div>

                  <div class="form-group">
                    <label for="nama">Nama Admin</label>
                    <input type="text" class="form-control" id="nama" name="nama_admin" value="<?php echo set_value('nama_admin') ?>" placeholder="Nama Admin">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nama_admin');?></small>
              
                  <div class="form-group">
                    <label for="user">User Admin</label>
                    <input type="text" class="form-control" id="user" name="user_admin" value="<?php echo set_value('user_admin') ?>" placeholder="User Admin">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('user_admin');?></small>

                </div>
            <!-- /.col -->

                <div class="col-md-6">

                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass_admin"placeholder="Password Admin">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('pass_admin');?></small>
              
                  <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control id="level" name="level_admin" required="">
                      <option value=""> --Level-- </option>
                      <?php foreach($level as $j):?>
                            <option value="<?php echo $j;?>"><?php echo $j;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/crud_admin">
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
