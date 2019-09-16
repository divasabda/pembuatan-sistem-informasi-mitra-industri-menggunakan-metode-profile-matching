<!DOCTYPE html>
<html>
<?php $this->load->view('pic/template/head');?>
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php $this->load->view('pic/template/head');?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('pic/template/header');?>

<?php $this->load->view('pic/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Group Anggota
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-users"></i> User</a></li>
        <li class="active">Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Group 1</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID GROUP</th>
                  <th>NAMA ANGGOTA</th>
                  <th>NAMA PIC</th>
                  <th>KETERANGAN</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($group1->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->id_group;?>
                  </td>
                  <td>
                    <?php echo $row->nama_anggota;?>
                  </td>
                  <td>
                    <?php echo $row->nama_pic;?>
                  </td>
                  <td>
                    <?php echo $row->deskripsi;?>
                  </td>
                  <td>
                    <a href ="<?php echo base_url('pic/V_anggotaPic/view/'.$row->id_anggota);?>" class="btn btn-warning"><i class="glyphicon glyphicon-zoom-in"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>

            <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Group 2</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID GROUP</th>
                  <th>NAMA ANGGOTA</th>
                  <th>NAMA PIC</th>
                  <th>KETERANGAN</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($group2->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->id_group;?>
                  </td>
                  <td>
                    <?php echo $row->nama_anggota;?>
                  </td>
                  <td>
                    <?php echo $row->nama_pic;?>
                  </td>
                  <td>
                    <?php echo $row->deskripsi;?>
                  </td>
                  <td>
                    <a href ="<?php echo base_url('pic/V_anggota/view/'.$row->id_anggota);?>" class="btn btn-warning"><i class="glyphicon glyphicon-zoom-in"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              </table>
            </div>

    </section>
    
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('pic/template/footer');?>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
  })
</script>
  </body>
</html>


<script>
  $('.tombol-hapus').on('click', function(e) {

  e.preventDefault();
  const href = $(this).attr('href');

Swal({
  title: 'Apakah anda yakin?',
  text: "Ingin melakukan ini!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, hapus!'
}).then((result) => {
  if (result.value) {
      document.location.href = href;
  }
})

});
</script>