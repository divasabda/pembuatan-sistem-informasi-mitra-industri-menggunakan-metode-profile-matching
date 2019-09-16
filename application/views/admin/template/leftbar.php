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
      </div> -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li><a href="<?php echo base_url('admin/page_admin')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>USER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/page_admin/crud_admin')?>"><i class="fa fa-user"></i> Admin</a></li>
            <li><a href="<?php echo base_url('admin/page_admin/crud_pic')?>"><i class="fa fa-user"></i> Pic</a></li>
            <li><a href="<?php echo base_url('admin/page_admin/crud_anggota')?>"><i class="fa fa-user"></i> Tenan</a></li>
          </ul>
        </li>

        <li><a href="<?php echo base_url('admin/page_admin/crud_group')?>"><i class="fa fa-cubes"></i> <span>Group Anggota</span></a></li>

        <li><a href="<?php echo base_url('admin/page_admin/v_calon')?>"><i class="fa fa-user"></i> <span>Calon Tenan</span></a></li>

        <li class="header">PROFILE MATCHING</li>

        <li><a href="<?php echo base_url('admin/page_admin/crud_aspek')?>"><i class="fa fa-folder"></i> Aspek</a></li>
        <li><a href="<?php echo base_url('admin/page_admin/crud_sub')?>"><i class="fa fa-folder"></i> Sub Aspek </a></li>
        <li><a href="<?php echo base_url('admin/page_admin/crud_bobot')?>"><i class="fa fa-folder"></i> Nilai Bobot</a></li>
        <li><a href="<?php echo base_url('admin/page_admin/nilai_calon')?>"><i class="fa fa-folder"></i> Nilai Calon</a></li>
        <li><a href="<?php echo base_url('admin/page_admin/hasil')?>"><i class="fa fa-folder"></i> Hasil Perhitungan</a></li>
        <li><a href="<?php echo base_url('admin/page_admin/crud_pertanyaan')?>"><i class="fa fa-folder"></i> Pertanyaan</a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
