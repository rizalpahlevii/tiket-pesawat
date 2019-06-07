<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $page; ?> | Gigantic Airport</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>dataTable/datatables.min.css"/>
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>modules/summernote/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/components.css">
  <script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
  </script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <?php 
              $userData = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row();
             ?>
            <img alt="image" src="<?php echo base_url('assets/master/user/' . $userData->image) ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama') ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="<?php echo site_url('user/profile') ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo site_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">Gigantic Airport</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">GA</a>
          </div>
          <ul class="sidebar-menu">
            <!-- Load sidebar sesuai level user -->
            <?php 
              if($this->session->userdata('level') == "Admin"){
                $this->load->view('partials/admin_sidebar');
              }elseif ($this->session->userdata('level') == "Manager") {
                $this->load->view('partials/manager_sidebar');
              }else{
                $this->load->view('partials/petugas_sidebar');
              }

            ?>
          </ul>

            
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil') ?>"></div>
        <?php echo $contents; ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url()  ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>dataTable/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/') ?>modules/simple-weather/jquery.simpleWeather.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>

  <!-- Page Specific JS File -->
  <?php if($this->uri->segment(1) == "dashboard" OR $this->uri->segment(1) == "") : ?>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-chartjs.js"></script>
  <?php else: ?>
  <?php endif; ?>
  <script src="<?php echo base_url('assets/') ?>modules/jqvmap/dist/jquery.vmap.js"></script>
  <script src="<?php echo base_url('assets/') ?>modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url('assets/') ?>modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url('assets/') ?>modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/') ?>js/scripts.js"></script>
  <script src="<?php echo base_url('assets/') ?>js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/') ?>js/pesawat.js"></script>
  <script type="text/javascript">
    $('.custom-file-input').on('change' , function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $(document).ready(function(){
      $('#tableku').dataTable();
    });
    $(document).ready(function(){
      $('#tblku').dataTable();
    });
  </script>  
</body>
</html>
