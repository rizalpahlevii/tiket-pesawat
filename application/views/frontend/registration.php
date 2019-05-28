
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url() ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="<?php echo site_url('gigantic/auth/registration'); ?>">
                  <div class="form-group">
                    <label for="email">Nama</label>
                    <input id="nama" type="text" class="form-control" name="nama" value="<?php echo set_value('nama') ?>">
                    <?php echo form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
                    <?php echo form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
                    <?php echo form_error('password1', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" name="password2" class="form-control" name="password-confirm">
                    <?php echo form_error('password2', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="negara" class="d-block">Negara</label>
                      <input id="negara" type="text" class="form-control pwstrength" data-indicator="pwindicator" name="negara" value="<?= set_value('negara') ?>">
                    <?php echo form_error('negara', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="kota" class="d-block">Kota</label>
                      <input id="kota" type="text" name="kota" class="form-control" name="password-confirm" value="<?= set_value('kota') ?>">
                    <?php echo form_error('kota', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                  </div>



                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/modules/popper.js"></script>
  <script src="<?= base_url() ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url() ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?= base_url() ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url() ?>assets/js/page/auth-register.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>assets/js/custom.js"></script>
</body>
</html>