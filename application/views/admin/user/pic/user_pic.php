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
        User Pic
      </h1>
      <br>
        <a href="<?= base_url()?>admin/crud_pic/tambah">
          <button type="button" class="btn btn-success">
            <span class="glyphicon glyphicon-user"></span> Tambah User Pic
          </button>
        </a>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> User</a></li>
        <li class="active">Pic</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('crud');?>">
    </div>
      
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pic</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID PIC</th>
                  <th>NAMA PIC</th>
                  <th>USER PIC</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $count = 0;           
                     foreach ($data_pic->result() as $row) : 
                      $count++; 
                  ?> 
                <tr>
                  <th scope="row"><?php echo $count;?></th> 
                  <td>
                    <?php echo $row->id_pic;?>
                  </td>
                  <td width="450">
                    <?php echo $row->nama_pic;?>
                  </td>
                  <td>
                    <?php echo $row->user_pic;?>
                  </td>
                  <td width="150">

                    <a href="<?php echo base_url('admin/crud_pic/get_edit/'.$row->id_pic);?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                    
                    <a href ="<?php echo base_url('admin/crud_pic/hapus/'.$row->id_pic);?>" class="btn btn-danger tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
                      
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