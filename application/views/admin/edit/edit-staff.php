 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url('admin/index'); ?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?= base_url('admin/staff'); ?>">Staff</a>
          </li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>

        <!-- Page Content -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        	
        	<div class="col-md-6">

        		<?= form_open_multipart("admin/edit_staff/" . $staff['id']); ?>

        			<input type="hidden" name="id_staff" id="id_staff" value="<?= $staff['id']; ?>">
				  
				  <div class="form-group row">
				    <label for="username" class="col-sm-3 col-form-label">Username</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $staff['username']; ?>" readonly>
				      <?= form_error('username', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $staff['nama']; ?>">
				      <?= form_error('nama', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="no_hp" class="col-sm-3 col-form-label">Nomor HP</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" value="<?= $staff['no_hp']; ?>">
				      <?= form_error('no_hp', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $staff['alamat']; ?>">
				      <?= form_error('alamat', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis kelamin</label>
				    <div class="col-sm-9">
				       <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
				       	  <option disabled selected>Pilih jenis kelamin :</option>
						  <option <?= cek_jk('Laki-laki', $staff['id'], 'staff'); ?> value="Laki-laki">Laki-laki</option>
						  <option <?= cek_jk('Perempuan', $staff['id'], 'staff'); ?> value="Perempuan">Perempuan</option>
						</select>
				      <?= form_error('jenis_kelamin', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">

					  <div class="col-sm-3">Foto</div>
					  <div class="col-sm-9">
					  	
					  	<div class="row">
					  		<div class="col-sm-3">
						    	<img src="<?= base_url('assets/img/profile/staff/') . $staff['image']; ?>" class="card-img" alt="...">
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
				  <div class="form-group row">
				    <div class="col-sm-9">
				      <button type="submit" class="btn btn-primary">Edit</button>
				    </div>
				  </div>
				</form>

        	</div>

        </div>

      </div>
      <!-- /.container-fluid -->
