 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url('admin/index'); ?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?= base_url('admin/teknisi'); ?>">Teknisi</a>
          </li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>

        <!-- Page Content -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        	
        	<div class="col-md-6">

        		<form method="post" action="<?= base_url('admin/tambah_teknisi'); ?>">
				  
				  <div class="form-group row">
				    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
				      <?= form_error('nama', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis kelamin</label>
				    <div class="col-sm-9">
				       <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
				       	  <option disabled selected>Pilih jenis kelamin :</option>
						  <option value="Laki-laki">Laki-laki</option>
						  <option value="Perempuan">Perempuan</option>
						</select>
				      <?= form_error('jenis_kelamin', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="no_hp" class="col-sm-3 col-form-label">Nomor HP</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP">
				      <?= form_error('no_hp', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
				      <?= form_error('alamat', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-9">
				      <button type="submit" class="btn btn-primary">Tambah</button>
				    </div>
				  </div>
				</form>

        	</div>

        </div>

      </div>
      <!-- /.container-fluid -->
