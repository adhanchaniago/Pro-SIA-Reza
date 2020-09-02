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

        		<?= form_open_multipart("profile/edit_profile"); ?>
				  <div class="form-group row">
					  <label for="username" class="col-sm-2 col-form-label">Username</label>
					  <div class="col-sm-10">
					    <input type="text" class="form-control" id="username" name="username" value="<?= $data['username']; ?>" readonly>
					  </div>
					</div>
					<div class="form-group row">
					  <label for="no_hp" class="col-sm-2 col-form-label">Nomor Hp/WA</label>
					  <div class="col-sm-10">
					    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp']; ?>" >
					    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
					  </div>
					</div>
					<div class="form-group row">
					  <label for="nama" class="col-sm-2 col-form-label">Nama lengkap</label>
					  <div class="col-sm-10">
					    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>" >
					    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
					  </div>
					</div>
					<div class="form-group row">
					  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
					  <div class="col-sm-10">
					    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" >
					    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
					  </div>
					</div>
					 <div class="form-group row">
					    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis kelamin</label>
					    <div class="col-sm-10">
					       <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
					       	  <option disabled selected>Pilih jenis kelamin :</option>
							  <option <?= cek_jk('Laki-laki', $data['id'], $user['id_role']); ?> value="Laki-laki">Laki-laki</option>
							  <option <?= cek_jk('Perempuan', $data['id'], $user['id_role']); ?> value="Perempuan">Perempuan</option>
							</select>
					      <?= form_error('jenis_kelamin', "<small class='text-danger'>", "</small>") ?>
					    </div>
					  </div>
					<div class="form-group row">

					  <div class="col-sm-2">Foto</div>
					  <div class="col-sm-10">
					  	
					  	<div class="row">
					  		<div class="col-sm-3">
					  			
					  			<?php if($this->session->userdata('id_role') == 1) : ?>

						    		<img src="<?= base_url('assets/img/profile/admin/') . $data['image']; ?>" class="card-img" alt="...">

						    	<?php endif ; ?>

						    	<?php if($this->session->userdata('id_role') == 2) : ?>

						    		<img src="<?= base_url('assets/img/profile/staff/') . $data['image']; ?>" class="card-img" alt="...">

						    	<?php endif ; ?>

					  		</div>
					  		<div class="col-sm">
					  			
					  			<div class="custom-file">
								  <input type="file" class="custom-file-input" id="image" name="image">
								  <label class="custom-file-label" for="image">Choose file</label>
								</div>

					  		</div>		
					  	</div>

					  </div>
					</div>

				<div class="row form-group justify-content-end">
					<div class="col-sm-10">
						
						<button type="submit" class="btn btn-primary">Edit</button>

					</div>
				</div>
				</form>

        	</div>

        </div>

      </div>
      <!-- /.container-fluid -->
