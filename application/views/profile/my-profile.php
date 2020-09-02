 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">

          	<?php if($this->session->userdata('id_role') == 1) : ?>

            	<a href="<?= base_url('admin'); ?>">Dashboard</a>

            <?php endif ; ?>

            <?php if($this->session->userdata('id_role') == 2) : ?>

            	<a href="<?= base_url('staff'); ?>">Dashboard</a>

            <?php endif ; ?>

          </li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>

        <!-- Page Content -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <?= $this->session->flashdata('message'); ?>

        <div class="card mb-3" style="max-width: 540px;">
		  <div class="row no-gutters">
		    <div class="col-md-4">

		    	<?php if($this->session->userdata('id_role') == 1) : ?>

		    		<img src="<?= base_url('assets/img/profile/admin/') . $data['image']; ?>" class="card-img" alt="...">

		    	<?php endif ; ?>

		    	<?php if($this->session->userdata('id_role') == 2) : ?>

		    		<img src="<?= base_url('assets/img/profile/staff/') . $data['image']; ?>" class="card-img" alt="...">

		    	<?php endif ; ?>

		    </div>
		    <div class="col-md-8">
		      <div class="card-body">
		        <h5 class="card-title"><?= $data['username']; ?></h5>
		        <p class="card-text"><?= $data['nama']; ?></p>
		        <p class="card-text"><?= $data['jenis_kelamin']; ?></p>
		        <p class="card-text"><?= $data['no_hp']; ?></p>
		        <p class="card-text"><?= $data['alamat']; ?></p>
		      </div>
		    </div>
		  </div>
		</div>

      </div>
      <!-- /.container-fluid -->
