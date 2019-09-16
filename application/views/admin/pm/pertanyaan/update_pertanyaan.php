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
          <h3 class="box-title">Tambah Pertanyaan</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('admin/pm/pertanyaan/update_pertanyaan')?>" method="post">
                <div class="col-md-6 col-lg-offset-3">

                  <div class="form-group">
                    <label for="id_pertanyaan">ID Pertanyaan</label>
                    <input type="text" value="<?php echo $id_pertanyaan ?>" readonly="readonly" class="form-control" id="id_pertanyaan" name="id_pertanyaan">
                  </div>

                  <div class="form-group">
                    <label>Sub Aspek</label>
                    <div class="input-group">
                          <input type="text" id="id_sub" name="id_sub" class="form-control" readonly="" required="" value="<?php echo $id_sub ?>" placeholder="ID Sub Aspek">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-success lihat-sub" data-target="#modal-sub" >Lihat</button>
                          </div>
                      </div>
                  </div>
                  <small class="form text text-danger"><?php echo form_error('id_sub');?></small>

                  <div class="form-group">
                    <label>Pertanyaan</label>
                    <input type="text" class="form-control" id="nama_pertanyaan" name="nama_pertanyaan" value="<?php echo $nama_pertanyaan ?>" placeholder="Masukkan Pertanyaan">
                  </div>
                  <small class="form text text-danger"><?php echo form_error('nama_pertanyaan');?></small>

                </div>
            </div>
          </div>

              <div class="modal-footer">
                <a href="<?php echo base_url()?>admin/pm/pertanyaan">
                  <button type="button" class="btn btn-default">Tutup</button>
                </a>
                <button type="submit" name="tambah" class="btn btn-primary">Update Data</button>
                </form>
              </div>
      </div>

  <!-- modal cari aspek -->

    <div class="modal fade" id="modal-sub">
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
                  <th>ID SUB ASPEK</th>
                  <th>NAMA SUB ASPEK</th>
                  <th>NILAI IDEAL</th>
                  <th>JENIS</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($sub_aspek->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td id="idsub" data-kode="<?php echo $row->id_sub;?>">
                    <?php echo $row->id_sub;?>
                  </td>
                  <td id="idsub" data-kode="<?php echo $row->id_sub;?>">
                    <?php echo $row->nama_sub;?>
                  </td>
                  <td id="idsub" data-kode="<?php echo $row->id_sub;?>">
                    <?php echo $row->nilai_ideal;?>
                  </td>
                  <td id="idsub" data-kode="<?php echo $row->id_sub;?>">
                    <?php echo $row->jenis;?>
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
    $(".lihat-sub").click(function(){
      $("#modal-sub").modal();
    });
  });

  $(document).on('click', '#idsub', function (e) {
        document.getElementById("id_sub").value = $(this).attr('data-kode');
        $('#modal-sub').modal('hide');
    });

</script>

</body>
</html>

