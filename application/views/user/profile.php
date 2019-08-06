<section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama') ?>!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-6">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="<?php echo base_url('assets/master/user/'.$user['image']); ?>" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Followers</div>
                        <div class="profile-widget-item-value">6,8K</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Following</div>
                        <div class="profile-widget-item-value">2,1K</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?php echo $user['nama_user'] ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?php echo $this->session->userdata('level') ?></div></div>
                    <div class="row">
                      <div class="col-lg-12">
                        <?php echo $this->session->flashdata('message'); ?>
                      </div>
                    </div>
                       <form method="post" class="needs-validation" action="<?php echo site_url('user/profile'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="row">                               
                              <div class="form-group col-md-12 col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" value="<?php echo $user['email'] ?>" readonly style="cursor: no-drop;" name="email">
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                            </div>
                            <div class="row">                               
                              <div class="form-group col-md-12 col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="<?php echo $user['nama_user'] ?>" name="nama">
                                <?php echo form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>   
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                            </div>
                            
                            <div class="row">                               
                              <div class="form-group col-md-12 col-12">
                                <label>Picture</label>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <img src="<?php echo base_url('assets/master/user/'.$user['image']) ?>" class="img-thumbnail">
                                  </div>
                                  <div class="col-sm-9">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" name="image" id="image">
                                          <label class="custom-file-label" for="image">Choose File</label>
                                      </div>
                                  </div>

                                </div>
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                            </div>
                        <div class="card-footer text-right">
                          <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
               <div class="col-12 col-md-12 col-lg-6">
                <div class="card profile-widget">
                 
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">Ganti Password</div>
                    <div class="row">
                      <div class="col-lg-12">
                        <?php echo $this->session->flashdata('messagechangepassword'); ?>
                      </div>
                    </div>
                       <form method="post" class="needs-validation" action="<?php echo site_url('user/changepassword'); ?>">
                            <div class="row">                               
                              <div class="form-group col-md-12 col-12">
                                <label>Current Password</label>
                                <input type="password" class="form-control"  name="current_password">
                                <?php echo form_error('current_password', '<small class="text-danger pl-3">','</small>'); ?>   
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                            </div>
                            <div class="row">                               
                              <div class="form-group col-md-12 col-12">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="new_password">
                                <?php echo form_error('new_password', '<small class="text-danger pl-3">','</small>'); ?>   
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                            </div>
                            
                            <div class="row"> 
                               <div class="form-group col-md-12 col-12">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password">
                                <?php echo form_error('confirm_password', '<small class="text-danger pl-3">','</small>'); ?>   
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                            </div>
                        <div class="card-footer text-right">
                          <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>