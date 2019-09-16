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
          <h3 class="box-title">Tambah Group</h3>
        </div>

        <div class="flash-user" data-flashdata="<?php echo $this->session->flashdata('user');?>">
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/crud_group/save')?>" method="post">
                <div class="col-lg-6 col-lg-offset-3">

                  <div class="form-group">
                    <label for="id_group">ID Group</label>
                    <input type="text" class="form-control" id="id_group" name="id_group" value="<?php echo $kodeunik ?>" readonly="readonly">
                  </div>


                  <div class="form-group">
                    <label for="level">Nama Anggota</label>
                    <select class="form-control" id="id_anggota" name="id_anggota" required="">
                     <option value=""> --Pilih Anggota-- </option>
                      <?php foreach($anggota->result() as $a):?>
                            <option value="<?php echo $a->id_anggota;?>"><?php echo $a->nama_anggota;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="level">Nama PIC</label>
                    <select class="form-control" id="id_pic" name="id_pic" required="">
                     <option value=""> --Pilih PIC-- </option>
                      <?php foreach($pic->result() as $p):?>
                            <option value="<?php echo $p->id_pic;?>"><?php echo $p->nama_pic;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="level">Deskripsi Group</label>
                    <select class="form-control" id="keterangan" name="deskripsi" required="">
                     <option value=""> --Pilih Group-- </option>
                     <option value="Group1"> Group 1 </option>
                      <option value="Group2"> Group 2 </option>
                    </select>
                   </div>

                </div>
   
          </div>

              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/crud_group">
                  <button type="button" class="btn btn-default">Tutup</button>
                </a>
                <button type="reset" name="reset" class="btn btn-warning">Reset Data</button>
                <button type="submit" name="tambahgroup" class="btn btn-primary">Tambah Data</button>
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
