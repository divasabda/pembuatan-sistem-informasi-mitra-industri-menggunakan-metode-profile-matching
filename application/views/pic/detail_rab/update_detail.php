<!DOCTYPE html>
<html>
<?php $this->load->view('pic/template/head');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php $this->load->view('pic/template/header'); ?>

<?php $this->load->view('pic/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Detail RAB</h3>
        </div>
    <!--   
      <div class="flash-user" data-flashdata="<?php echo $this->session->flashdata('user');?>">
      </div> -->
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('pic/d_rab/update_detail')?>" method="post">
                <div class="col-md-6 col-lg-offset-3">

                  <div class="form-group">
                    <label for="nama">ID Detail</label>
                    <input type="text" value="<?php echo $id_d_rab ?>" readonly="readonly" class="form-control" id="id_d_rab" name="id_d_rab">
                  </div>

                  <div class="form-group">
                    <label for="level">ID RAB</label>
                    <div class="input-group">
                          <input type="text" id="id_rab" name="id_rab" class="form-control" readonly="" required="" value="<?php echo $id_rab ?>" placeholder="ID RAB">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-success lihat-detail" data-target="#modal-detail" >Lihat</button>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama Detail</label>
                    <input type="text" class="form-control" id="nama_detail" name="nama_detail" value="<?php echo $nama_detail ?>" placeholder="Nama Detail">
                  </div>              

                  <div class="form-group">
                    <label for="user">Dana Detail</label>
                    <input type="number" class="form-control uang" id="dana_detail" name="dana_detail" value="<?php echo $dana_detail ?>" placeholder="Dana Detail">
                  </div>

                  <div class="form-group">
                    <label for="level">Status RAB</label>
                    <select class="form-control" id="status_detail" name="status_detail" required="">
                     <option value=""> --Pilih Status-- </option>
                     <option value="pending"> PENDING </option>
                     <option value="proses"> PROSES </option>
                     <option value="selesai"> SELESAI </option>
                    </select>
                  </div>
 
                <!-- /.input group -->
              </div>

            </div>
            <!-- /.col -->

               <div class="modal-footer">
                <a href="<?php echo base_url()?>pic/d_rab">
                  <button type="button" class="btn btn-default">Tutup</button>
                </a>
                <button type="reset" name="reset" class="btn btn-warning">Reset Data</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                </form>
              </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->

  <!-- modal cari proyek -->

    <div class="modal fade" id="modal-detail">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">TAMBAH DETAIL RAB</h4>
              </div>
              <div class="modal-body">
               <!--  <p>One fine body&hellip;</p> -->
          <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID RAB</th>
                  <th>NAMA RAB</th>
                  <th>DANA RAB</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($rab->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td id="idrab" data-kode="<?php echo $row->id_rab;?>">
                    <?php echo $row->id_rab;?>
                  </td>
                  <td id="idrab" data-kode="<?php echo $row->id_rab;?>">
                    <?php echo $row->nama_rab;?>
                  </td>
                  <td id="idrab" data-kode="<?php echo $row->id_rab;?>">
                    <?php echo "Rp. ".number_format($row->dana_rab);?>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('pic/template/footer');?>
</div>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script>

    $(function (){
    $('#example2').DataTable()
    })

///// pull id proyek/////
  $(function(){
    $(".lihat-detail").click(function(){
      $("#modal-detail").modal();
    });
  });

  $(document).on('click', '#idrab', function (e) {
        document.getElementById("id_rab").value = $(this).attr('data-kode');
        $('#modal-detail').modal('hide');
    });

</script>

</body>
</html>
