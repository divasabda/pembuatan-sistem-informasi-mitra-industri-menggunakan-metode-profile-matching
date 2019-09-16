<!DOCTYPE html>
<html>
<?php $this->load->view('admin/template/head');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<?php $this->load->view('admin/template/header'); ?>

<?php $this->load->view('admin/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Sub Aspek</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/pm/sub_aspek/tambah_sub')?>" method="post">
                <div class="col-md-6 col-lg-offset-3">

                  <div class="form-group">
                    <label for="id_sub">ID Sub Aspek</label>
                    <input type="text" value="<?php echo $kodeunik ?>" readonly="readonly" class="form-control" id="id_sub" name="id_sub">
                  </div>

                  <div class="form-group">
                    <label for="level">Aspek</label>
                    <div class="input-group">
                          <input type="text" id="id_aspek" name="id_aspek" class="form-control" readonly="" required="" value="<?php echo set_value('id_aspek') ?>" placeholder="ID Proyek">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-success lihat-aspek" data-target="#modal-aspek" >Lihat</button>
                          </div>
                      </div>
                  </div>
                  <small class="form text text-danger"><?php echo form_error('id_aspek');?></small>

                  <div class="form-group">
                    <label for="nama_sub">Nama Sub Aspek</label>
                    <input type="text" class="form-control" id="nama_sub" name="nama_sub" value="<?php echo set_value('nama_sub') ?>" placeholder="Nama Sub Aspek">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nama_sub');?></small>
              
                  <div class="form-group">
                    <label for="user">Nilai Ideal</label>
                    <input type="number" class="form-control" id="nilai_ideal" name="nilai_ideal" value="<?php echo set_value('nilai_ideal') ?>" placeholder="Nilai Ideal">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('bobot');?></small>

                  <div class="form-group">
                    <label for="nilai_sf">Jenis</label>
                    <select class="form-control" id="jenis" name="jenis" required="">
                      <option value=""> --Jenis-- </option>
                      <?php foreach($jen as $j):?>
                            <option value="<?php echo $j;?>"><?php echo $j;?></option>
                      <?php endforeach; ?>
                    </select>

                  </div>
                  <small class="form text text-danger"><?php echo form_error('jenis');?></small>

                </div>
            </div>
          </div>

              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/pm/sub_aspek">
                  <button type="button" class="btn btn-default">Tutup</button>
                </a>
                <button type="reset" name="reset" class="btn btn-warning">Reset Data</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                </form>
              </div>
      </div>

  <!-- modal cari aspek -->

    <div class="modal fade" id="modal-aspek">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">TAMBAH ASPEK</h4>
              </div>
              <div class="modal-body">
               <!--  <p>One fine body&hellip;</p> -->
          <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID ASPEK</th>
                  <th>NAMA ASPEK</th>
                  <th>BOBOT</th>
                  <th>NILAI CF</th>
                  <th>NILAI SF</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($aspek->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td id="idaspek" data-kode="<?php echo $row->id_aspek;?>">
                    <?php echo $row->id_aspek;?>
                  </td>
                  <td id="idaspek" data-kode="<?php echo $row->id_aspek;?>">
                    <?php echo $row->nama_aspek;?>
                  </td>
                  <td id="idaspek" data-kode="<?php echo $row->id_aspek;?>">
                    <?php echo $row->presentase;?>
                  </td>
                  <td id="idaspek" data-kode="<?php echo $row->id_aspek;?>">
                    <?php echo $row->bobot_cf;?>
                  </td>
                  <td id="idaspek" data-kode="<?php echo $row->id_aspek;?>">
                    <?php echo $row->bobot_sf;?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
        </div>
          <!-- /.modal-dialog -->
    </div>

    </section>
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/template/footer');?>
</div>
 
<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>

    $(function (){
    $('#example2').DataTable()
    })

///// pull id proyek/////
  $(function(){
    $(".lihat-aspek").click(function(){
      $("#modal-aspek").modal();
    });
  });

  $(document).on('click', '#idaspek', function (e) {
        document.getElementById("id_aspek").value = $(this).attr('data-kode');
        $('#modal-aspek').modal('hide');
    });

</script>

</body>
</html>

