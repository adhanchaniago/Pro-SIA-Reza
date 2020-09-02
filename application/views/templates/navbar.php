<nav class="navbar navbar-expand navbar-dark bg-info static-top">

  <?php if ($this->session->userdata('id_role') == 1) { ?>

    <a class="navbar-brand mr-1" href="<?= base_url('admin'); ?>">Toko Yudha</a>

  <?php } else if ($this->session->userdata('id_role') == 2) { ?>

    <a class="navbar-brand mr-1" href="<?= base_url('staff'); ?>">Toko Yudha</a>

  <?php } ?>

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>

  <?php date_default_timezone_set('asia/jakarta'); ?>

  <p class="btn btn-primary text-white mt-auto ml-auto"><?= date('d F Y'); ?></p>

  <p class="btn btn-success text-white mt-auto ml-2" id="jam"></p>

  <p class="text-white mt-auto mb-auto ml-4">WELCOME <?php // echo $data['nama']; 
                                                      ?></p>

  <!-- Navbar -->
  <ul class="navbar-nav">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        <?php if ($this->session->userdata('id_role') == 1) : ?>

          <!-- <img src="<?php // base_url("assets/img/profile/admin/") . $data['image']; 
                          ?>" class="rounded-circle" width="60" height="60"> -->

        <?php endif; ?>

        <?php if ($this->session->userdata('id_role') == 2) : ?>

          <!-- <img src="<?php // echo base_url("assets/img/profile/staff/") . $data['image']; 
                          ?>" class="rounded-circle" width="60" height="60"> -->

        <?php endif; ?>

      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="<?= base_url('profile'); ?>">My Profile</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
      </div>
    </li>
  </ul>

</nav>