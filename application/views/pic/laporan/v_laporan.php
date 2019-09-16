<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
        REKAP DATA LAPORAN
      </h1>

      <div class="box box-primary">
        <div class="col-md-12">
          <?=form_open('pic/laporan/laporan_detail', 'id="proyek"')?>
            <div class="col-md-6">
            <br>
              <div class="form-group">
                <select class="form-control" id="id_proyek" name="id_proyek" required="">
                  <option value=""> -- PILIH PROYEK -- </option>
                      <?php foreach($data->result() as $row):?>
                        <option
                        value="<?php echo $row->id_proyek;?>"><?php echo $row->nama_proyek;?>  
                        </option>
                      <?php endforeach;?>
                </select>
              </div>
          </div>

          <div class="col-md-6">
            <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary " name="tampilkan" id="tampilkan"><span id="tampil">Tampilkan</span></button>
              </div>
          </div>
          <?=form_close()?>
        </div>        
      </div>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div id="result"></div>
      </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('pic/template/footer');?>
<script>
          $("#tampilkan").click(function() {
            var action = $("#proyek").attr('action');
            var report = {
                id_proyek: $("#id_proyek").val(),
            };

            $.ajax({
                type: "GET",
                url: action,
                data: report,
                beforeSend: function() {
                    $('#tampil').html('Sedang memuat.....');
                    $('.btn').addClass('disabled');
                },
                success: function(proyek) {
                    $("#result").html(proyek);
                    $('#tampil').html('Tampilkan');
                    $('.btn').removeClass('disabled');
                }
            });
            return false;
        });
</script>




