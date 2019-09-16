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
          <h3 class="box-title">Tambah RAB</h3>
        </div>
    <!--   
      <div class="flash-user" data-flashdata="<?php echo $this->session->flashdata('user');?>">
      </div> -->
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo base_url('pic/rab/update_rab')?>" method="post">
                <div class="col-md-6 col-lg-offset-3">

                  <div class="form-group">
                    <label for="nama">ID RAB</label>
                    <input type="text" value="<?php echo $id_rab ?>" readonly="readonly" class="form-control" id="id_rab" name="id_rab">
                  </div>

                  <div class="form-group">
                    <label for="level">ID Proyek</label>
                    <div class="input-group">
                          <input type="text" id="id_proyek" name="id_proyek" class="form-control" readonly="" required="" value="<?php echo $id_proyek?>" placeholder="ID Proyek">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-success lihat-proyek" data-target="#modal-proyek" >Lihat</button>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="nama">Total Dana Proyek</label>
                    <input type="text" id="dana_proyek" value="<?php set_value('dana_proyek') ?>" readonly="readonly" class="form-control" placeholder="Dana Proyek">
                  </div>

                  <div class="form-group">
                    <label for="nama">Sisa Dana Proyek</label>
                    <input type="text" value="<?php set_value('sisa') ?>" readonly="readonly" class="form-control" id="sisa_dana" placeholder = "Sisa Dana">
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama RAB</label>
                    <input type="text" class="form-control" id="nama_rab" name="nama_rab" value="<?php echo $nama_rab ?>" placeholder="Nama RAB">
                  </div>
              

                  <div class="form-group">
                    <label for="user">Dana RAB</label>
                    <input type="number" class="form-control uang" id="dana_rab" name="dana_rab" value="<?php echo $dana_rab ?>" placeholder="Dana RAB">
                  </div>

                  <div class="form-group">
                    <label for="level">Status RAB</label>
                    <select class="form-control" id="status_rab" name="status_rab" required="">
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
                <a href="<?php echo base_url()?>pic/rab">
                  <button type="button" class="btn btn-default">Tutup</button>
                </a>
                <button type="submit" name="tambah" class="btn btn-primary">Edit Data</button>
                </form>
              </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->

  <!-- modal cari proyek -->

    <div class="modal fade" id="modal-proyek">
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
                  <th>ID PROYEK</th>
                  <th>NAMA ANGGOTA</th>
                  <th>NAMA PIC</th>
                  <th>NAMA PROYEK</th>
                  <th>NILAI PROYEK</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($proyek->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td id="idpro" data-kode="<?php echo $row->id_proyek;?>" data-number="<?php echo $row->nilai_proyek;?>">
                    <?php echo $row->id_proyek;?>
                  </td>
                  <td id="idpro" data-kode="<?php echo $row->id_proyek;?>" data-number="<?php echo $row->nilai_proyek;?>">
                    <?php echo $row->nama_anggota;?>
                  </td>
                  <td id="idpro" data-kode="<?php echo $row->id_proyek;?>" data-number="<?php echo $row->nilai_proyek;?>">
                    <?php echo $row->nama_pic;?>
                  </td>
                  <td id="idpro" data-kode="<?php echo $row->id_proyek;?>" data-number="<?php echo $row->nilai_proyek;?>">
                    <?php echo $row->nama_proyek;?>
                  </td>
                  <td id="idpro" data-kode="<?php echo $row->id_proyek;?>" data-number="<?php echo $row->nilai_proyek;?>">
                    <?php echo "Rp. ".number_format($row->nilai_proyek);?>
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
    $(".lihat-proyek").click(function(){
      $("#modal-proyek").modal();
    });
  });

  $(document).on('click', '#idpro', function (e) {
        document.getElementById("id_proyek").value = $(this).attr('data-kode');
         document.getElementById("dana_proyek").value = $(this).attr('data-number');

            var id_proyek = $(this).attr('data-kode');
            $.ajax({
                url : '<?php echo base_url('pic/rab/ceks');?>',
                type : "POST",
                data : {id_proyek: id_proyek},
                // async : true,
                dataType : 'json',
                success: function(sisa){
                  console.log(sisa);
                  document.getElementById("sisa_dana").value = sisa;
                }
            });
        $('#modal-proyek').modal('hide');
    });

</script>

</body>
</html>
