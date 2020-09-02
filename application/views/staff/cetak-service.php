<div class="container">

	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			
			<div class="row">
				<div class="col text-center mt-5 pt-5">
					
					<h4>PIAN PATAMUAN BENGKEL</br>Kabun Pondok Duo Nagari Tandikat Selatan</br><?= $service['tanggal'] . '-' . $service['bulan'] . '-' . $service['tahun'] . ' ' . $service['jam']; ?></h4>

				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<p class="mb-1">Nomor Service : <?= $service['nomor_service']; ?></p>
					<p class="mb-1">Staff         : <?= $service['staff']; ?></p>
					<p class="mb-1">Teknisi       : <?= $service['teknisi']; ?></p>

				</div>
				<div class="col-3"></div>
				<div class="col">
					
					<p class="mb-1">Pelanggan : <?= $service['nama']; ?></p>
					<p class="mb-1">Nomor HP : <?= $service['no_hp']; ?></p>
					<p class="mb-1">Merk motor         : <?= $service['merk']; ?></p>
					<p class="mb-1">Palt nomor       : <?= $service['plat_nomor']; ?></p>

				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<table class="table">
						<thead>
							<tr>
								<th>Jenis Service</th>
								<th>Biaya</th>
							</tr>
						</thead>
						<tbody>

						<?php $arr_jenis = explode('|', $service['jenis_service']); ?>

						<?php foreach($arr_jenis as $aj) : ?>

							<tr>
								<td><?= $aj; ?></td>

								<?php foreach($jenis_service as $jns) : ?>

									<?php if($jns['service'] == $aj) : ?>

										<td>Rp. <?= $jns['biaya']; ?></td>

									<?php endif ; ?>

								<?php endforeach ; ?>

							</tr>

						<?php endforeach ; ?>

						<tr>
							<th>Total</th>
							<th>Rp. <?= $service['biaya']; ?></th>
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