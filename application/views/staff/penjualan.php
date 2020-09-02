<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url('staff'); ?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item active"><?= $title; ?></li>
		</ol>

		<!-- Page Content -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		<div class="row">

			<div class="col">

				<div class="row">
					<div class="col">

						<?php

						$max = $this->db->query('SELECT max(nomor_penjualan) FROM penjualan')->row_array();

						if ($max['max(nomor_penjualan)'] == NULL) {

							$nomor = 1;
						} else if ($max['max(nomor_penjualan)'] != null) {

							$nomor = (int)$max['max(nomor_penjualan)'] + 1;
						}

						?>

						<p>Nomor Penjualan : <?= $nomor; ?></p>
						<p>Staff : <?= $_SESSION['username']; ?></p>

					</div>
					<div class="col">

						<p>Tanggal : <?= date('d F Y', time()); ?></p>
						<p>Waktu : <?= date('H:i', time()); ?></p>

					</div>
				</div>

				<div id="table">

					<table class="table"">

				  	<thead>
				  		<tr class=" bg-success text-white">
						<td>Nama</td>
						<td>Harga</td>
						<td>jumlah</td>
						<td>jumlah harga</td>
						</tr>
						</thead>
						<tbody>

							<?php if ($penjualan_temp->num_rows() > 0) : ?>

								<?php $result = $penjualan_temp->result_array(); ?>

								<?php foreach ($result as $pt) : ?>

									<tr>
										<td>

											<div class="form-group">
												<select class="custom-select" readonly>

													<?php foreach ($barang as $br) : ?>

														<?php if ($br['id'] == $pt['id_barang']) : ?>

															<option><?= $br['nama']; ?></option>

														<?php endif; ?>

													<?php endforeach; ?>

												</select>
											</div>

										</td>
										<td><input type="text" value="<?= $pt['harga'] ?>" readonly></td>
										<td><input type="text" value="<?= $pt['jumlah'] ?>"></td>
										<td><input type="text" value="<?= $pt['total'] ?>" readonly></td>
									</tr>

								<?php endforeach; ?>

							<?php endif; ?>

							<form method="post" action="">

								<tr>
									<td>

										<div class="form-group">
											<select class="custom-select pilih-barang" id="id_barang" name="id_barang">
												<option value="0" disabled selected>Pilih barang :</option>

												<?php foreach ($barang as $br) : ?>

													<option harga="<?= $br['harga']; ?>" value="<?= $br['id']; ?>"><?= $br['nama']; ?></option>

												<?php endforeach; ?>

											</select>
										</div>

									</td>
									<td><input type="text" name="harga" id="harga" readonly></td>
									<td><input type="text" name="jumlah" id="jumlah"></td>
									<td><input type="text" name="total" id="total" readonly></td>
								</tr>
								<tr>
									<td>Total</td>
									<td></td>
									<td></td>

									<?php $tot = $this->db->query('SELECT sum(total) FROM penjualan_temp')->row_array(); ?>

									<td><input type="text" name="total2" id="total2" readonly value="<?= $tot['sum(total)']; ?>"></td>
								</tr>
								<tr>
									<td>Tunai</td>
									<td></td>
									<td></td>
									<td><input type="number" id="tunai" name="tunai" autofocus></td>
								</tr>
								<tr>
									<td>Kembali</td>
									<td></td>
									<td></td>
									<td><input type="text" name="kembali" id="kembali" readonly></td>
								</tr>

						</tbody>

					</table>

				</div>

				<div class="row">
					<div class="col-10">

						</form>
					</div>

					<div class="col">
						<form method="post" action="">

							<input type="hidden" name="tunai" id="tunai_hidden">

						</form>

					</div>
				</div>


			</div>

		</div>

	</div>
	<!-- /.container-fluid -->