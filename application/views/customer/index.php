<section class="section">
          <div class="section-header">
            <h1>Customer</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Customer</a></div>
              <div class="breadcrumb-item">Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Customer</h4>
                  </div>

                  <div class="card-body">
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
                            <th>ID Customer</th>
                            <th>Nama</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Kota</th>
                            <th>Negara</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach($customer as $row): ?>
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $row->id_customer ?></td>
                              <td><?php echo $row->nama ?></td>
                              <td><?php echo $row->image ?></td>
                              <td><?php echo $row->email ?></td>
                              <td><?php echo $row->kota ?></td>
                              <td><?php echo $row->negara ?></td>
                              <td><?php echo ($row->status == "1") ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Nonaktif</span>';  ?></td>
                              <td>
                                <a href="<?= site_url('customer/delete/'.$row->id_customer) ?>" class="btn btn-danger">Hapus Akun</a>
                                <?php echo ( $row->status == "1" ) ? '<a href="' . site_url('customer/active/' . $row->id_customer) .'" class="btn btn-warning">Nonaktifkan</a>' : '<a href="' . site_url('customer/active/' . $row->id_customer)  . '" class="btn btn-success">Aktifkan</a>' ?>
                              </td>
                            </tr>
                          <?php $no++; endforeach; ?>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>



