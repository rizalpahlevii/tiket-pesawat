
    <!-- contact us -->
    <div class="messagechangepassword" data-swalmessage="<?php echo $this->session->flashdata('messagechangepassword') ?>"></div>
    <section id="contact" class="contact grey lighten-3 scrollspy">
      <div class="container">
        <h3 class="light grey-text text-darken-3 center">My Profile</h3>
        <div class="row">
          <div class="col m6 s12">
            <form method="post" action="<?php echo site_url('gigantic/updateprofile'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
              <div class="card-panel">
                <h5>Please fill out this form</h5>
                <div class="input-field">
                  
                    <input type="email" name="email" id="email"  value="<?php echo $this->session->userdata('emailClient') ?>" readonly style="cursor: no-drop;">
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                 
                    <input type="text" name="nama" id="name" required  value="<?php echo $user['nama'] ?>">
                   <label for="name">Name</label>
                   <p><?php echo form_error('nama','<span class="red-text">','</span>') ?></p>
                </div>
                <div class="row">
                  <div class="col m4 s12">
                    <img src="<?= base_url('assets/master/customer/') . $user['image'] ?>" class="responsive-img materialboxed">
                  </div>
                  <div class="col m8 s12">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" name="image">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                
                <button type="submit" class="btn blue darken-2">Update</button>
              </div>
            </form>
          </div>

          <div class="col m6 s12">
            <form method="post" action="<?php echo site_url('gigantic/changepassword'); ?>">
              <div class="card-panel">
                <h5>Ubah Password</h5>
                <div class="input-field">
                    <input type="password" name="current_password" id="current_password">
                    <label for="current_password">Password Lama</label>
                    <?php echo form_error('current_password','<span class="red-text">','</span>');?>
                </div>
                <div class="input-field">
                    <input type="password" name="new_password" id="new_password">
                    <label for="new_password">Password Baru</label>
                    <?php echo form_error('new_password','<span class="red-text">','</span>');?>
                </div>
                <div class="input-field">
                  <input type="password" name="password_confirm" id="password_confirm">
                  <label for="password_confirm">Password Konfirmasi</label>
                    <?php echo form_error('password_confirm','<span class="red-text">','</span>');?>

                </div>
                <button type="submit" class="btn blue darken-2">Ubah  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
