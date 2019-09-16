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
          <h3 class="box-title">Update User</h3>
        </div>
      
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/crud_pic/update')?>" method="post">
                
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama">ID Pic</label>
                      <input type="text" class="form-control" name="id_pic" readonly="readonly" value="<?php echo $id_pic; ?>" placeholder="Masukkan Nama">
                    </div>

                  <div class="form-group">
                    <label for="nama">Nama Pic</label>
                    <input type="text" class="form-control" id="nama" name="nama_pic" value="<?php echo $nama_pic; ?>" placeholder="Masukkan Nama" required>
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nama_pic');?></small>
                </div>
                
            <!-- /.col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="user">User Pic</label>
                    <input type="text" class="form-control" id="user" name="user_pic" value="<?php echo $user_pic; ?>" placeholder="Masukkan User" required>
                  </div>
                  <small class="form text text-danger"><?php echo form_error('user_pic');?></small>                  

                </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/crud_pic">
                  <button type="button" class="btn btn-default">Kembali</button>
                </a>
                <button type="submit" name="ubah" class="btn btn-primary">Edit Data</button>
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
