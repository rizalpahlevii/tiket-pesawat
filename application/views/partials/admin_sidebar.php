<li class="menu-header">Dashboard</li>
              <li class="<?php echo ($this->uri->segment(1) == "dashboard") ? "active" : ""; ?><?php echo ($this->uri->segment(1) == "") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('dashboard'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              </li>
              <li class="menu-header">Master</li>
              <li class="<?php echo ($this->uri->segment(1) == "pesawat") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('pesawat'); ?>"><i class="fas fa-plane"></i> <span>Pesawat</span></a></li>
              <li class="<?php echo ($this->uri->segment(1) == "bandara") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('bandara'); ?>"><i class="fas fa-map-marker-alt"></i> <span>Bandara</span></a></li>
              <li class="<?php echo ($this->uri->segment(1) == "customer") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('customer'); ?>"><i class="fas fa-users"></i> <span>Customer</span></a></li>
              <li class="<?php echo ($this->uri->segment(1) == "penerbangan") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('penerbangan'); ?>"><i class="fas fa-tasks"></i> <span>Penerbangan</span></a></li>
              <li class="<?php echo ($this->uri->segment(1) == "tarif") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('tarif'); ?>"><i class="fas fa-credit-card"></i> <span>Tarif</span></a></li>

              <li class="menu-header">TRANSAKSI</li>
              <li class="<?php echo ($this->uri->segment(1) == "jadwal") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('jadwal'); ?>"><i class="fas fa-calendar"></i> <span> Jadwal Penerbangan</span></a></li>
              <li class="<?php echo ($this->uri->segment(1) == "booking") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('booking'); ?>"><i class="fas fa-briefcase"></i> <span> Booking</span></a></li>

              <li class="menu-header">LAIN - LAIN</li>
              <li class="<?php echo ($this->uri->segment(1) == "laporan") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('laporan'); ?>"><i class="fas fa-clipboard"></i> <span> Laporan</span></a></li>
              <li class="<?php echo ($this->uri->segment(1) == "user") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('user'); ?>"><i class="fas fa-user"></i> <span> User</span></a></li>
              <?php $psn = $this->db->get_where('message',['is_read'=> '0'])->num_rows(); ?>
              <li class="<?php echo ($this->uri->segment(1) == "pesan") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('pesan'); ?>"><i class="fas fa-mail-bulk"></i> <span> Pesan</span><span class="badge badge-pill badge-warning"><?= $psn; ?></span></a></li>

              <li class="<?php echo ($this->uri->segment(1) == "backup") ? "active" : ""; ?>"><a class="nav-link" href="<?php echo site_url('backup/') ?>"><i class="fas fa-database"></i> <span> Backup Database</span></a></li>