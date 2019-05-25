<li class="menu-header">Dashboard</li>
              <li class="<?php echo ($this->uri->segment(1) == "dashboard") ? "active" : ""; ?><?php echo ($this->uri->segment(1) == "") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('dashboard'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              </li>
             

              <li class="menu-header">REPORT</li>
              <li class="<?php echo ($this->uri->segment(1) == "laporan") ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('laporan'); ?>"><i class="fas fa-clipboard"></i> <span> Laporan</span></a></li>