<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url('staff'); ?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="<?= base_url('staff/data_barang'); ?>">Data Barang</a>
			</li>
			<li class="breadcrumb-item active"><?= $title; ?></li>
		</ol>

		<!-- Page Content -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		<div class="row">

			<div class="col-md-6">

				<?= form_open_multipart("staff/edit_barang/" . $barang['id']); ?>

				<input type="hidden" name="id_barang" name="id_barang" value="<?= $barang['id']; ?>">

				<div class="form-group row">
					<label for="nama" class="col-sm-3 col-form-label">Nama barang</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama barang" value="<?= $barang['nama']; ?>">
						<?= form_error('nama', "<small class='text-danger'>", "</small>") ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="jumlah" class="col-sm-3 col-form-label">Jumlah barang</label>
					<div class="col-sm-9">
						<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah barang" value="<?= $barang['jumlah']; ?>">
						<?= form_error('jumlah', "<small class='text-danger'>", "</small>") ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="harga" class="col-sm-3 col-form-label">Harga barang/unit</label>
					<div class="col-sm-9">
						<input type="number" class="form-control" id="harga" name="harga" placeholder="Harga barang" value="<?= $barang['harga']; ?>">
						<?= form_error('harga', "<small class='text-danger'>", "</small>") ?>
					</div>
				</div>
				<div class="form-group row">

					<!-- <div class="col-sm-3">Foto</div>
					<div class="col-sm-9">

						<div class="row">
							<div class="col-sm-3">
								<img src="<?= base_url('assets/img/barang/') . $barang['foto']; ?>" class="card-img" alt="...">
							</div>
							<div class="col-sm">

								<div class="custom-file">
									<input type="file" class="custom-file-input" id="image" name="image">
									<label class="custom-file-label" for="image">Choose file</label>
								</div>

							</div>
						</div>

					</div> -->
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