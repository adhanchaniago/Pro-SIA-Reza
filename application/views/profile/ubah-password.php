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

        <div class="row">
        	
        	<div class="col-md-7">

        		<?= $this->session->flashdata('message'); ?>

        		<form action="<?= base_url('profile/ubah_password'); ?>" method="post">

					<div class="form-group row">
					  <label for="password_lama" class="col-sm-2 col-form-label">Password lama</label>
					  <div class="col-sm-10">
					    <input type="password" class="form-control" id="password_lama" name="password_lama">
					    <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
					  </div>
					</div>
					<div class="form-group row">
					  <label for="password_baru1" class="col-sm-2 col-form-label">Password baru</label>
					  <div class="col-sm-10">
					    <input type="password" class="form-control" id="password_baru1" name="password_baru1">
					    <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
					  </div>
					</div>
					<div class="form-group row">
					  <label for="password_baru2" class="col-sm-2 col-form-label">Konfirmasi password baru</label>
					  <div class="col-sm-10">
					    <input type="password" class="form-control" id="password_baru2" name="password_baru2">
					    <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
					  </div>
					</div>

				<div class="row form-group justify-content-end">
					<div class="col-sm-10">
						
						<button type="submit" class="btn btn-primary">Ubah Password</button>

					</div>
				</div>
				</form>

        	</div>

        </div>

      </div>
      <!-- /.container-fluid -->
