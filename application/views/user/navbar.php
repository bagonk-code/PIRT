<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed pace-white">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style=" background:#61B15A;">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>     
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <?php if($this->session->userdata('level') == 1){ ?>
            <img src="<?php echo base_url('assets/dist/img/admin.png') ?>" class="user-image img-circle elevation-2">
            <span class="d-none d-md-inline"><strong><font color="#F8F1F1"><?= $user->nama_user; ?></font></strong></span>
            <i class="right fas fa-angle-down"></i>
          <?php }else{ ?>
            <img src="<?php echo base_url('assets/dist/img/user.png') ?>" class="user-image img-circle elevation-2">
            <span class="d-none d-md-inline"><strong><font color="#F8F1F1"><?= $user->nama_user; ?></font></strong></span>
            <i class="right fas fa-angle-down"></i>
          <?php } ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           <!-- <img src="<?php echo base_url('assets/dist/img/admin.png') ?>" class="img-circle elevation-2">
           <li class="user-header" style="background: #61B15A">
             <p>
              <font color="#F8F1F1">
                <?= $user->nama_user; ?><br>
                <small>
                  <?= $user->nama_perusahaan; ?>
                </small>
              </font>
            </p>
          </li>
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat" style="background:#61B15A"><font color="#F8F1F1">Profil</font></a>
            <a href="<?php echo site_url('Auth/logout'); ?>" class="btn btn-default btn-flat float-right" style="background:#61B15A"><font color="#F8F1F1">Keluar</font></a>
          </li> -->
          <li class="nav-item dropdown">
            <a href="#" class="dropdown-item">
              <i class="right fas fa-lock"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kunci
            </a>
            <a href="<?php echo site_url('Auth/logout'); ?>" class="dropdown-item">
              <i class="right fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keluar
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>