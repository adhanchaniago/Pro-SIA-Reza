<div class="container">

	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			
			<div class="row">
				<div class="col text-center mt-5 pt-5">
					
					<h4>PIAN PATAMUAN BENGKEL</br>Kabun Pondok Duo Nagari Tandikat Selatan</br><?= $penjualan[0]['tanggal'] . '-' . $penjualan[0]['bulan'] . '-' . $penjualan[0]['tahun'] . ' ' . $penjualan[0]['jam']; ?></h4>

				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<p class="mb-1">Nomor Penjualan : <?= $penjualan[0]['nomor_penjualan']; ?></p>
					<p class="mb-1">Staff         : <?= $penjualan[0]['staff']; ?></p>

				</div>

			</div>
			<div class="row">
				<div class="col">
					
					<table class="table">
						<thead>
							<tr>
								<th>Barang</th>
								<th>Jumlah</th>
								<th>Biaya</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach($penjualan as $pj) : ?>

								<?php foreach($barang as $br) : ?>

									<?php if($br['id'] == $pj['id_barang']) : ?>

										<tr>
											
											<td><?= $br['nama']; ?></td>
											<td><?= $pj['jumlah']; ?> unit</td>
											<td>Rp. <?= $pj['total']; ?></td>

										</tr>

									<?php endif ; ?>

								<?php endforeach ; ?>

							<?php endforeach ; ?>

							<?php 

							$pembayaran = $this->db->get_where('pembayaran', ['nomor_penjualan' => $penjualan[0]['nomor_penjualan']])->row_array();

							 ?>

							<tr>
								
								<th></th>
								<th>Total</th>
								<th>Rp. <?= $pembayaran['total']; ?></th>

							</tr>

							 <tr>
								
								<th></th>
								<th>Tunai</th>
								<th>Rp. <?= $pembayaran['tunai']; ?></th>

							</tr>

							<tr>
								
								<th></th>
								<th>Kembali</th>
								<th>Rp. <?= $pembayaran['kembali']; ?></th>

							</tr>

						</tbody>

					</table>

				</div>
			</div>
			<div class="row">
				<div class="col text-center mt-5">
					
					<h5>TERIMA KASIH</h5>

				</div>
			</div>

		</div>
	</div>
	
	

</div>