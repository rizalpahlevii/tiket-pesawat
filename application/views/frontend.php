
<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/fe/') ?>css/materialize.min.css"  media="screen,projection"/>

    <!-- my CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/') ?>css/style.css">
    
    <script type="text/javascript" src="<?php echo base_url('assets/js/') ?>jquery.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript">base_url = '<?php echo base_url(); ?>'</script>
    <title><?php echo $page; ?> | Airport</title>
  </head>

  <body id="home" class="scrollspy">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('bkgb'); ?>"></div>
    <!-- navbar -->
    <div class="navbar-fixed">
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="<?php echo site_url('gigantic/auth/login') ?>">Login</a></li>
        <li><a href="<?php echo site_url('gigantic/auth/registration') ?>">Register</a></li>
      </ul>
      <ul id="dropdown2" class="dropdown-content">
        <li><a href="<?php echo site_url('gigantic/profile') ?>">Profile</a></li>
        <li><a href="<?php echo site_url('gigantic/pemesanan') ?>">Pemesanan Saya</a></li>
        <li><a href="<?php echo site_url('gigantic/logout') ?>">Logout</a></li>
      </ul>
      <nav class="blue darken-2">
        <div class="container">
          <div class="nav-wrapper">
            <a href="#home" class="brand-logo">GIGANTIC</a>
            <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="<?php echo site_url('gigantic') ?>">Home</a></li>
              <li><a href="<?php echo site_url('gigantic/penerbangan') ?>">Penerbangan</a></li>
              <li><a href="<?php echo site_url('gigantic/service') ?>">Services</a></li>
              <li><a href="<?php echo site_url('gigantic/contact') ?>">Contact Us</a></li>
              <?php if(!$this->session->userdata('giganticClientLogin') ): ?>
              <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">account_circle</i></a></li>
              <?php else: ?>
              <li><a class="dropdown-trigger" href="#!" data-target="dropdown2"><i class="material-icons left">account_circle</i><?php echo $user['nama'] ?></a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <!-- sidenav -->
    <ul class="sidenav" id="mobile-nav">
       <li><a href="<?php echo site_url('gigantic') ?>">Home</a></li>
        <li><a href="<?php echo site_url('gigantic/penerbangan') ?>">Penerbangan</a></li>
        <li><a href="<?php echo site_url('gigantic/services') ?>">Services</a></li>
        <li><a href="<?php echo site_url('gigantic/contact') ?>">Contact Us</a></li>
      <li><a href="#contact"><i class="material-icons right">account_circle</i>Rizal</a></li>

    </ul>

    <!-- contact us -->
   <?= $contents;  ?>


    <!-- footer -->
    <footer class="blue darken-2 white-text center">
      <div class="footer-copyright">
            <div class="container">
              
      <p>GIGANTIC Copyright <?php echo date('Y') ?></p>
            </div>
          </div>
    </footer>



    <script type="text/javascript" src="<?php echo base_url('assets/js/') ?>jquery.min.js"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?php echo base_url('assets/fe/') ?>js/materialize.min.js"></script>
    
  <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/') ?>client.js"></script>
    <script>
      const sideNav = document.querySelectorAll('.sidenav');
      M.Sidenav.init(sideNav);

      const slider = document.querySelectorAll('.slider');
      M.Slider.init(slider, {
        indicators: false,
        height: 500,
        transition: 600,
        interval: 3000
      });

      const parallax = document.querySelectorAll('.parallax');
      M.Parallax.init(parallax);

      const materialbox = document.querySelectorAll('.materialboxed');
      M.Materialbox.init(materialbox);

      const scroll = document.querySelectorAll('.scrollspy');
      M.ScrollSpy.init(scroll, {
        scrollOffset: 50
      });

      const dropdown = document.querySelectorAll('.dropdown-trigger');
      M.Dropdown.init(dropdown);

    </script>
  </body>
</html>







