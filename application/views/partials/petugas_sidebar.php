<li class="menu-header">Dashboard</li>
              <li class="<?php echo ($this->uri->segment(1) == "dashboard") ? "active" : ""; ?><?php echo ($this->uri->segment(1) == "") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('dashboard'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              </li>
              <li class="menu-header">Master</li>
              
              <li class="<?php echo ($this->uri->segment(1) == "penerbangan") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('penerbangan'); ?>"><i class="fas fa-tasks"></i> <span>Penerbangan</span></a></li>
              <li class="<?php echo ($this->uri->segment(1) == "tarif") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('tarif'); ?>"><i class="fas fa-credit-card"></i> <span>Tarif</span></a></li>

              <li class="menu-header">TRANSAKSI</li>
              <li class="<?php echo ($this->uri->segment(1) == "jadwal") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('jadwal'); ?>"><i class="fas fa-calendar"></i> <span> Jadwal Penerbangan</span></a></li>
              <li class="<?php echo ($this->uri->segment(1) == "booking") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('booking'); ?>"><i class="fas fa-briefcase"></i> <span> Booking</span></a></li>

             