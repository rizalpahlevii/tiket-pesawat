 <section class="section">
          <div class="section-header">
            <h1>Advanced Forms</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Forms</a></div>
              <div class="breadcrumb-item">Advanced Forms</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Advanced Forms</h2>
            <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Text</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="<?php echo site_url('user/create') ?>">
                      <div class="col-12 col-md-6 col-lg-6">
                      <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-user"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control phone-number" name="email" value="<?php echo set_value('email') ?>">
                          
                        </div>
                        <?php echo form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-user"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control phone-number" name="nama" value="<?php echo set_value('nama') ?>">
                          
                        </div>
                        <?php echo form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-lock"></i>
                            </div>
                          </div>
                          <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
                        </div>
                        <?php echo form_error('password1', '<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label>Password Confirmation</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-lock"></i>
                            </div>
                          </div>
                          <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password2">
                        </div>
                        <?php echo form_error('password2', '<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label>Level</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-lock"></i>
                            </div>
                          </div>
                          <select class="form-control" name="level" id="level" required="">
                            <option disabled selected>--Pilih Level--</option>
                            <?php foreach($level as $l) : ?>
                              <option value="<?php echo $l->id ?>"><?php echo $l->role ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                      <a href="<?php echo site_url('user'); ?>" class="btn btn-dark">Kembali</a>
                    </div>
                    </form>
                    
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </section>