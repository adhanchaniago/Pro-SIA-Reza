<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url('staff/index'); ?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item active"><?= $title; ?></li>
		</ol>

		<!-- Page Content -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		<div class="row">

			<div class="col">

				<?= $this->session->flashdata('message'); ?>

				<a href="<?= base_url('staff/tambah_barang'); ?>" class="btn btn-primary mb-3">Tambah Barang</a>

				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Stok</th>
							<th scope="col">Harga per unit</th>
							<!-- <th scope="col">Foto</th> -->
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php $i = 1; ?>
						<?php foreach ($barang as $sf) : ?>

							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $sf['nama']; ?></td>
								<td><?= $sf['jumlah']; ?></td>
								<td>Rp. <?= $sf['harga']; ?></td>
								<!-- <td>
									<img src="<?= base_url('assets/img/barang/') . $sf['foto']; ?>" class="img-thumbnail" width="80"></td>
								</td> -->
								<td>

									<a href="<?= base_url('staff/edit_barang/') . $sf['id']; ?>" class="badge badge-success">Edit</a>
									<a href="<?= base_url('staff/hapus_barang/') . $sf['id']; ?>" class="badge badge-danger">Hapus</a>

								</td>
							</tr>

							<?php $i++; ?>
						<?php endforeach; ?>

					</tbody>
				</table>

			</div>

		</div>

	</div>
	<!-- /.container-fluid -->