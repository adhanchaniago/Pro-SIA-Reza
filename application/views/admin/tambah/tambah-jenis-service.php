 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url('admin/index'); ?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?= base_url('admin/jenis_service'); ?>">Jenis Service</a>
          </li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>

        <!-- Page Content -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        	
        	<div class="col-md-6">

        		<form method="post" action="<?= base_url('admin/tambah_jenis_service'); ?>">
				  
				  <div class="form-group row">
				    <label for="service" class="col-sm-3 col-form-label">Service</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="service" name="service" placeholder="Service">
				      <?= form_error('service', "<small class='text-danger'>", "</small>") ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="biaya" class="col-sm-3 col-form-label">Biaya</label>
				    <div class="col-sm-9">
				      <input type="number" class="form-control" id="biaya" name="biaya" placeholder="Biaya">
				      <?= form_error('biaya', "<small class='text-danger'>", "</small>") ?>
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
