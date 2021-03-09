<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - PIRT DINKES KWB</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqvmap/jqvmap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.css')?>">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/kwb.png" style="width:30px; height:30px;">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
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
            <img src="<?php echo base_url('assets/dist/img/admin.png') ?>" class="user-image img-circle elevation-2">
            <span class="d-none d-md-inline"><strong><font color="#F8F1F1">Alexander Pierce</font></strong></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <li class="user-header" style="background: #61B15A">
              <img src="<?php echo base_url('assets/dist/img/admin.png') ?>" class="img-circle elevation-2">
              <p>
                <font color="#F8F1F1">
                  Alexander Pierce - Web Developer
                  <small>
                    Member since Nov. 2012
                  </small>
                </font>
              </p>
            </li>
            <li class="user-footer">
              <a href="#" class="btn btn-default btn-flat" style="background:#61B15A"><font color="#F8F1F1">Profile</font></a>
              <a href="#" class="btn btn-default btn-flat float-right" style="background:#61B15A"><font color="#F8F1F1">Sign out</font></a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    
    <aside class="main-sidebar sidebar-dark-primary elevation-5">
      <a href="#" class="brand-link" style=" background:#61B15A;">
        <center><span class="logo-lg"><b><font color="F8F1F1">DINAS KESEHATAN</font></b></span></center>
      </a>
      <div class="sidebar" style="background: #00303F">
        <div class="image">
          <center><img src="<?php echo base_url('assets/dist/img/kwb.png') ?>" width="130" height="160" style="margin-top: 20px; margin-bottom: 10px" class="img-fluid"></center>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link" style="background: #00293F">
                <center><p>MAIN NAVIGATION</p></center>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-city"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link" style="background: #00303F">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" style="background: #00303F">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v2</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v3</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <footer class="main-footer">
      <strong>Copyright &copy; <?= date('Y') ?>.</strong>
      Dinas Kesehatan Kota Batu.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>
  </div>
</body>  

<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<script src="<?php echo base_url('assets/dist/js/adminlte.js')?>"></script>
<script src="<?php echo base_url('assets/dist/js/demo.js')?>"></script>
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js')?>"></script>

</html>
