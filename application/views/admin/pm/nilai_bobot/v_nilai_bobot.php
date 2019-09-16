<!DOCTYPE html>
<html>
<?php $this->load->view('admin/template/head');?>
<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php $this->load->view('admin/template/head');?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('admin/template/header');?>

<?php $this->load->view('admin/template/leftbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        NILAI BOBOT
      </h1>
      <br>
        <a href="<?= base_url()?>admin/pm/nilai_bobot/tambah_nilai">
          <button type="button" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> Tambah Nilai Bobot
          </button>
        </a>
      <ol class="breadcrumb">
        <li><i class="fa fa-gear"></i> Nilai Bobot</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="flash-n_bobot" data-flashdata="<?php echo $this->session->flashdata('crud');?>">
      
    </div>
      
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA NILAI BOBOT</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>SELISIH</th>
                  <th>BOBOT</th>
                  <th>KETERANGAN</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($n_bobot->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->selisih;?>
                  </td>
                  <td>
                    <?php echo $row->bobot;?>
                  </td>
                  <td>
                    <?php echo $row->keterangan;?>
                  </td>
                  <td>

                    <a href="<?php echo base_url('admin/pm/nilai_bobot/get_edit/'.$row->selisih)?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                    
                    <a href ="<?php echo base_url('admin/pm/nilai_bobot/hapus/'.$row->selisih);?>" class="btn btn-danger tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
                      
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>

    </section>
  
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/template/footer');?>

<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>



<script>
  $(function () {
    $('#example1').DataTable()
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