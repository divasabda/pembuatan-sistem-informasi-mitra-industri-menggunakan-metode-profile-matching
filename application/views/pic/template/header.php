  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url('pic/page_pic')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>IC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PIC</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle " data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu ">
            <a href="#" class="dropdown-toggle " data-toggle="dropdown">
              <img src="<?php echo base_url('assets/AdminLTE/')?>dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs "><?php echo $this->session->userdata('ses_nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header ">
                <img src="<?php echo base_url('assets/AdminLTE/')?>dist/img/avatar5.png" class="img-circle" alt="User Image">

                <h4><?php echo $this->session->userdata('ses_nama'); ?></h4>
                  <small>PIC</small>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('pic/page_pic/save_password') ?>" class="btn btn-default btn-flat">Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('C_login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>

    </nav>
  </header>