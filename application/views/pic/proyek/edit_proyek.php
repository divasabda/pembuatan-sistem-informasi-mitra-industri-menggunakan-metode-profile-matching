<!DOCTYPE html>
<html>
<?php $this->load->view('pic/template/head');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('pic/template/header'); ?>

<?php $this->load->view('pic/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Proyek</h3>
        </div>
      
      <div class="flash-user" data-flashdata="<?php echo $this->session->flashdata('user');?>">
    </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('pic/proyek/editProyek')?>" method="post">
                <div class="col-md-6 col-lg-offset-3">

                  <div class="form-group">
                    <label for="nama">ID Proyek</label>
                    <input type="text" value="<?php echo $id_proyek ?>" readonly="readonly" class="form-control" id="id_proyek" name="id_proyek">
                  </div>

                  <div class="form-group">
                    <label for="level">Nama Anggota</label>
                    <select class="form-control" id="id_anggota" name="id_anggota" required="">
                     <option value=""> --Pilih Anggota-- </option>
                      <?php foreach($anggota->result() as $a):?>
                        <?php if($a->id_anggota == $id_anggota):?>
                            <option value="<?php echo $a->id_anggota;?>" selected ><?php echo $a->nama_anggota;?></option>
                          <?php else :?>
                            <option value="<?php echo $a->id_anggota;?>"><?php echo $a->nama_anggota;?></option>
                        <?php endif;?>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama Proyek</label>
                    <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="<?php echo $nama_proyek ?>" placeholder="Nama Proyek">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nama_proyek');?></small>
              
                  <div class="form-group">
                    <label for="user">Lama Proyek (* Hari )</label>
                    <input type="number" class="form-control" id="lama_proyek" name="lama_proyek" value="<?php echo $lama_proyek ?>" placeholder="Lama proyek">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('lama_proyek');?></small>

                  <div class="form-group">
                    <label for="user">Mulai Proyek</label>
                    <input type="date" class="form-control" id="mulai_proyek" name="mulai_proyek" value="<?php echo $mulai_proyek ?>" required="">
                  </div>

                  <div class="form-group">
                    <label for="user">Selesai Proyek</label>
                    <input type="date" class="form-control" id="selesai_proyek" name="selesai_proyek" value="<?php echo $selesai_proyek ?>" required="">
                  </div>

                  <div class="form-group">
                    <label for="user">Nilai Proyek</label>
                    <input type="text" class="form-control" id="nilai_proyek" name="nilai_proyek" value="<?php echo $nilai_proyek ?>" placeholder="Nilai proyek">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nilai_proyek');?></small>

                  <div class="form-group">
                    <label for="level">Status Proyek</label>
                    <select class="form-control" id="status_proyek" name="status_proyek" required="">
                     <option value=""> --Pilih Status-- </option>
                     <option value="pending"> PENDING </option>
                     <option value="proses"> PROSES </option>
                     <option value="selesai"> SELESAI </option>
                    </select>
                  </div>

                </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
              <div class="modal-footer">
                <a href="<?php echo base_url()?>pic/proyek">
                  <button type="button" class="btn btn-default">Tutup</button>
                </a>
                <button type="submit" name="tambah" class="btn btn-primary">Edit Data</button>
                </form>
              </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('pic/template/footer');?>
</div>
</body>


</html>
