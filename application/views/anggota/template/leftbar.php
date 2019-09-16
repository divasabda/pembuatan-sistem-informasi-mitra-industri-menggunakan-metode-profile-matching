  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
<!--       <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/AdminLTE/')?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <h4><?php echo $this->session->userdata('ses_nama'); ?></h4>
        </div>
      </div>
 -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li><a href="<?php echo base_url('anggota/page_anggota')?>"><i class="fa fa-dashboard"></i> <span>Dasboard</span></a></li>
        <li><a href="<?php echo base_url('anggota/page_anggota/kegiatan')?>"><i class="fa fa-laptop"></i> <span>KEGIATAN</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
