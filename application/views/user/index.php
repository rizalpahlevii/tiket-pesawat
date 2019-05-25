<section class="section">
          <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">User</a></div>
              <div class="breadcrumb-item">Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>User</h4>
                  </div>

                  <div class="card-body">
                    <a href="<?php echo site_url('user/create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
                    <div class="row">
                      <div class="col-sm-6">
                        <?php echo $this->session->flashdata('message'); ?>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="tableku">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Image</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no =1;foreach($user as $row): ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->nama_user; ?></td>
                            <td><img alt="image" src="<?php echo base_url('assets/master/user/' . $row->image) ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $row->nama_user ?>"></td>
                            <td><?php echo $row->role; ?></td>
                            <td><?php echo ($row->is_active === "1") ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Nonaktif</span>';  ?></td>
                            <td>
                              <a href="<?= site_url('user/delete/'.$row->id) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                               <?php echo ( $row->is_active === "0" ) ? '<a href="' . site_url('user/active/' . $row->id) .'" class="btn btn-success">Aktifkan</a>' : '<a href="' . site_url('user/active/' . $row->id)  . '" class="btn btn-warning">Nonaktifkan</a>' ?>
                            </td>
                          </tr>
                        <?php $no++;endforeach; ?>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>



