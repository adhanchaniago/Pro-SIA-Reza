 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url('admin/index'); ?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>

        <!-- Page Content -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <?php 

        $hari = date('d', time());
        $bulan = date('m', time());
        $tahun = date('Y', time());

        $services = $this->db->query("SELECT count(*) FROM service")->row_array();
        $services_hari = $this->db->query("SELECT count(*) FROM service WHERE tanggal = '$hari'")->row_array();
        $services_bulan = $this->db->query("SELECT count(*) FROM service WHERE bulan = '$bulan'")->row_array();
        $services_tahun = $this->db->query("SELECT count(*) FROM service WHERE tahun = '$tahun'")->row_array(); 

         ?>

         <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5 h5">Total Service <?= $services['count(*)']; ?> Unit</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?= base_url('admin/data_service'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5 h5">Total Service Hari Ini <?= $services_hari['count(*)']; ?> Unit</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?= base_url('admin/data_service/hari'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5 h5">Total Service Bulan Ini <?= $services_bulan['count(*)']; ?> Unit</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?= base_url('admin/data_service/bulan'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5 h5">Total Service Tahun Ini <?= $services_tahun['count(*)']; ?> Unit</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?= base_url('admin/data_service/tahun'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <?php if($waktu == 'semua') : ?>

          <div class="row">
            <div class="col">
              
              <a href="<?= base_url('laporan/laporan_service'); ?>" target="_blank" class="btn btn-primary mb-3">Cetak</a>

            </div>
          </div>

        <?php endif ; ?>

        <?php if($waktu == 'hari') : ?>

          <div class="row">
            <div class="col">
              
              <a href="<?= base_url('laporan/laporan_service_hari/') . date('d', time()); ?>" target="_blank" class="btn btn-warning mb-3">Cetak</a>

            </div>
          </div>

        <?php endif ; ?>

        <?php if($waktu == "bulan" && $angka == 0) : ?>

          <div class="row">
            <div class="col-9">
              
              <a href="<?= base_url('laporan/laporan_service_bulan/') . date('m', time()); ?>" target="_blank"  class="btn btn-success mb-3">Cetak</a>

            </div>
            <div class="col">
            <div class="form-group">
              <select class="custom-select bulan-service" name="bulan">

                <?php 

                $bulan2 = $this->db->query("SELECT DISTINCT bulan FROM service  ORDER BY bulan")->result_array();

                foreach($bulan2 as $bl) :

                  if($bl['bulan'] == 1) { $nama_bulan = "Januari"; }
                  if($bl['bulan'] == 2) { $nama_bulan = "Februari"; }
                  if($bl['bulan'] == 3) { $nama_bulan = "Maret"; }
                  if($bl['bulan'] == 4) { $nama_bulan = "April"; }
                  if($bl['bulan'] == 5) { $nama_bulan = "Mei"; }
                  if($bl['bulan'] == 6) { $nama_bulan = "Juni"; }
                  if($bl['bulan'] == 7) { $nama_bulan = "Juli"; }
                  if($bl['bulan'] == 8) { $nama_bulan = "Agustus"; }
                  if($bl['bulan'] == 9) { $nama_bulan = "September"; }
                  if($bl['bulan'] == 10) { $nama_bulan = "Oktober"; }
                  if($bl['bulan'] == 11) { $nama_bulan = "November"; }
                  if($bl['bulan'] == 12) { $nama_bulan = "Desember"; }

                 ?>

                <option <?= cek_bulan_tahun($bl['bulan'], 'bulan'); ?> value="<?= $bl['bulan']; ?>"><?= $nama_bulan; ?></option>
              
              <?php endforeach ; ?>

            </select>
          </div>
            </div>
          </div>

      <?php endif ; ?>

      <?php if($waktu == "bulan" && $angka != 0) : ?>

          <div class="row">
            <div class="col-9">
              
              <a href="<?= base_url('laporan/laporan_service_bulan/') . $angka; ?>" target="_blank"  class="btn btn-success mb-3">Cetak</a>

            </div>
            <div class="col">
            <div class="form-group">
              <select class="custom-select bulan-service" name="bulan">

                <?php 

                $bulan2 = $this->db->query("SELECT DISTINCT bulan FROM service  ORDER BY bulan")->result_array();

                foreach($bulan2 as $bl) :

                  if($bl['bulan'] == 1) { $nama_bulan = "Januari"; }
                  if($bl['bulan'] == 2) { $nama_bulan = "Februari"; }
                  if($bl['bulan'] == 3) { $nama_bulan = "Maret"; }
                  if($bl['bulan'] == 4) { $nama_bulan = "April"; }
                  if($bl['bulan'] == 5) { $nama_bulan = "Mei"; }
                  if($bl['bulan'] == 6) { $nama_bulan = "Juni"; }
                  if($bl['bulan'] == 7) { $nama_bulan = "Juli"; }
                  if($bl['bulan'] == 8) { $nama_bulan = "Agustus"; }
                  if($bl['bulan'] == 9) { $nama_bulan = "September"; }
                  if($bl['bulan'] == 10) { $nama_bulan = "Oktober"; }
                  if($bl['bulan'] == 11) { $nama_bulan = "November"; }
                  if($bl['bulan'] == 12) { $nama_bulan = "Desember"; }

                  if($angka == $bl['bulan']) {

                 ?>

                  <option selected value="<?= $bl['bulan']; ?>"><?= $nama_bulan; ?></option>
              
              <?php 

                } else {

                  ?>

                  <option value="<?= $bl['bulan']; ?>"><?= $nama_bulan; ?></option>

                  <?php
                }

              endforeach ; 

              ?>

            </select>
          </div>
            </div>
          </div>

      <?php endif ; ?>

      <?php if($waktu == "tahun" && $angka == 0) : ?>

          <div class="row">
            <div class="col-9">
              
              <a href="<?= base_url('laporan/laporan_service_tahun/') . date('Y', time()); ?>" target="_blank"  class="btn btn-danger mb-3">Cetak</a>

            </div>
            <div class="col">
            <div class="form-group">
              <select class="custom-select tahun-service" name="tahun">

                <?php 

                $tahun2 = $this->db->query("SELECT DISTINCT tahun FROM service ORDER BY tahun")->result_array();

                foreach($tahun2 as $bl) :

                 ?>

                <option <?= cek_bulan_tahun($bl['tahun'], 'tahun'); ?> value="<?= $bl['tahun']; ?>"><?= $bl['tahun']; ?></option>
              
              <?php endforeach ; ?>

            </select>
          </div>
            </div>
          </div>

      <?php endif ; ?>

      <?php if($waktu == "tahun" && $angka != 0) : ?>

          <div class="row">
            <div class="col-9">
              
              <a href="<?= base_url('laporan/laporan_service_tahun/') . $angka; ?>" target="_blank"  class="btn btn-danger mb-3">Cetak</a>

            </div>
            <div class="col">
            <div class="form-group">
              <select class="custom-select tahun-service" name="tahun">

                <?php 

                $tahun2 = $this->db->query("SELECT DISTINCT tahun FROM service  ORDER BY tahun")->result_array();

                foreach($tahun2 as $bl) :

                  if($bl['tahun'] == $angka) {

                 ?>

                  <option selected value="<?= $bl['tahun']; ?>"><?= $bl['tahun']; ?></option>
              
              <?php

                } else { ?>

                  <option value="<?= $bl['tahun']; ?>"><?= $bl['tahun']; ?></option>

                <?php

                }

              endforeach ;

               ?>

            </select>
          </div>
            </div>
          </div>

      <?php endif ; ?>

        <div class="row">
        	
        	<div class="col">

        		<?= $this->session->flashdata('message'); ?>

		        <table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nomor service</th>
				      <th scope="col">Nama Pelanggan</th>
				      <th scope="col">Teknisi</th>
				      <th scope="col">Staff</th>
				      <th scope="col">Nomor HP</th>
				      <th scope="col">Merk</th>
				      <th scope="col">Plat nomor</th>
				      <th scope="col">jam</th>
				      <th scope="col">Tanggal</th>
				      <th scope="col">Jenis service</th>
				      <th scope="col">Keterangan</th>
				      <th scope="col">Biaya</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php $i = 1; ?>
				  	<?php foreach($service as $sf) : ?>

					    <tr>
					      <th scope="row"><?= $i; ?></th>
					      <td><?= $sf['nomor_service']; ?></td>
					      <td><?= $sf['nama']; ?></td>
					      <td><?= $sf['teknisi']; ?></td>
					      <td><?= $sf['staff']; ?></td>
					      <td><?= $sf['no_hp']; ?></td>
					      <td><?= $sf['merk']; ?></td>
					      <td><?= $sf['plat_nomor']; ?></td>
					      <td><?= $sf['jam']; ?></td>

					      <?php 

					      $bulan = [

					      	'Januari',
					      	'Februari',
					      	'Maret',
					      	'April',
					      	'Mei',
					      	'Juni',
					      	'Juli',
					      	'Agustus',
					      	'September',
					      	'Oktober',
					      	'November',
					      	'Desember'
					      ];

					      $ii = 1;

					      foreach($bulan as $bl) {

					      	if($ii == $sf['bulan']) {

					      		$tanggal = $sf['tanggal'] . ' ' . $bl . ' ' . $sf['tahun'];
					      	}

					      	$ii++;
					      }
					       ?>

					      <td><?= $tanggal; ?></td>

                <?php $jenis_ser = str_replace('|', ', ', $sf['jenis_service']); ?>
                
					      <td><?= $jenis_ser; ?></td>
					      <td><?= $sf['keterangan']; ?></td>
					      <td>Rp. <?= $sf['biaya']; ?></td>
					    </tr>

					<?php $i++; ?>
					<?php endforeach ; ?>

				  </tbody>
				</table>

        	</div>

        </div>

      </div>
      <!-- /.container-fluid -->
