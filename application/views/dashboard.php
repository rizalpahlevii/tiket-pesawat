<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>

  </div>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-plane"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pesawat</h4>
          </div>
          <div class="card-body">
            <?= $tmp_pesawat; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-map"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Bandara</h4>
          </div>
          <div class="card-body">
            <?= $tmp_bandara; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-tasks"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Penerbangan</h4>
          </div>
          <div class="card-body">
            <?= $tmp_penerbangan; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Customer</h4>
          </div>
          <div class="card-body">
            <?= $tmp_customer; ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-dark">
          <i class="fas fa-mail-bulk"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pesan</h4>
          </div>
          <div class="card-body">
            <?= $tmp_pesan; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-info">
          <i class="fas fa-mail-bulk"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Booking</h4>
          </div>
          <div class="card-body">
            <?= $tmp_booking; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Grafik Pendapatan</h4>
        </div>
        <div class="card-body">
          <div id="chart2"></div>
          <button id="plain" class="btn btn-primary">Plain</button>
          <button id="inverted" class="btn btn-warning">Inverted</button>
          <button id="polar" class="btn btn-danger">Polar</button>
        </div>
      </div>
    </div>
  </div>
</section>