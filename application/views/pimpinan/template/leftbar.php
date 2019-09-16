  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
<!--         <div class="pull-left image">
          <img src="<?php echo base_url('assets/AdminLTE/')?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div> -->
        <div class="pull-left info">
          <h4><?php echo $this->session->userdata('ses_nama'); ?></h4>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li><a href="<?php echo base_url('pimpinan/page_pimpinan')?>"><i class="fa fa-dashboard"></i> <span>Dasboard</span></a></li>

        <li class="header">USER</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>USER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('pimpinan/page_pimpinan/v_pic')?>"><i class="fa fa-user"></i> Pic</a></li>
            <li><a href="<?php echo base_url('pimpinan/page_pimpinan/v_anggota')?>"><i class="fa fa-user"></i> Tenan</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('pimpinan/page_pimpinan/v_group')?>"><i class="fa fa-users"></i> <span>Group</span></a></li>
        <li><a href="<?php echo base_url('pimpinan/page_pimpinan/v_laporan')?>"><i class="fa fa-laptop"></i> <span>Laporan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
