<div id="wrapper">

  <!-- Sidebar -->
  <ul class="sidebar navbar-nav bg-primary">
    <?php if ($_SESSION['id_role'] == 1) : ?>
      <li class="nav-item <?php echo active_sidebar($title, 'Dashboard'); ?>">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item <?php echo active_sidebar($title, 'Staff'); ?>">
        <a class="nav-link" href="<?= base_url('admin/staff'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Staff</span>
        </a>
      </li>

      <div class="sidebar-heading text-white ml-2 mt-3">
        Data
      </div>
      <li class="nav-item <?php echo active_sidebar($title, 'Data Barang'); ?>">
        <a class="nav-link" href="<?= base_url('admin/data_barang'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Barang</span>
        </a>
      </li>
      <li class="nav-item <?php echo active_sidebar($title, 'Data Penjualan'); ?>">
        <a class="nav-link" href="<?= base_url('admin/data_penjualan'); ?>">
          <i class="fas fa-fw fa-folder-open"></i>
          <span>Data Penjualan</span>
        </a>
      </li>
      <li class="nav-item <?php echo active_sidebar($title, 'Jurnal'); ?>">
        <a class="nav-link" href="<?= base_url('admin/jurnal'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Jurnal</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin/logout'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Logout</span>
        </a>
      </li>
    <?php else : ?>

      <li class="nav-item <?php echo active_sidebar($title, 'Dashboard'); ?>">
        <a class="nav-link" href="<?= base_url('staff'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item <?php echo active_sidebar($title, 'Penjualan'); ?>">
        <a class="nav-link" href="<?= base_url('staff/penjualan'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Penjualan</span>
        </a>
      </li>
      <li class="nav-item <?php echo active_sidebar($title, 'Transaksi'); ?>">
        <a class="nav-link" href="<?= base_url('staff/transaksi'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Transaksi</span>
        </a>
      </li>
      <div class="sidebar-heading text-white ml-2 mt-3">
        Data
      </div>
      <li class="nav-item <?php echo active_sidebar($title, 'Data Barang'); ?>">
        <a class="nav-link" href="<?= base_url('staff/data_barang'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Barang</span>
        </a>
      </li>
      <li class="nav-item <?php echo active_sidebar($title, 'Data Penjualan'); ?>">
        <a class="nav-link" href="<?= base_url('staff/data_penjualan'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Penjualan</span>
        </a>
      </li>
      <li class="nav-item <?php echo active_sidebar($title, 'Jurnal'); ?>">
        <a class="nav-link" href="<?= base_url('staff/jurnal'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Jurnal</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('staff/logout'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Logout</span>
        </a>
      </li>
    <?php endif ?>
    <!-- 
    <div class="sidebar-heading text-white ml-2 mt-3">
      Profile
    </div> -->

    <!-- <li class="nav-item <?php echo active_sidebar($title, 'My Profile'); ?>">
      <a class="nav-link" href="<?= base_url('profile'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>My Profile</span>
      </a>
    </li>
    <li class="nav-item <?php echo active_sidebar($title, 'Edit Profile'); ?>">
      <a class="nav-link" href="<?= base_url('profile/edit_profile'); ?>">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Edit Profile</span>
      </a>
    </li>
    <li class="nav-item <?php echo active_sidebar($title, 'Ubah Password'); ?>">
      <a class="nav-link" href="<?= base_url('profile/ubah_password'); ?>">
        <i class="fas fa-fw fa-lock"></i>
        <span>Ubah Password</span>
      </a>
    </li> -->

  </ul>