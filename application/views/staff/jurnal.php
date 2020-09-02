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

        <?php 

        $hari = date('d', time());
        $bulan = date('m', time());
        $tahun = date('Y', time());

        $transaksi_semua = $this->db->query("SELECT * FROM transaksi")->num_rows();
        $transaksi_hari = $this->db->query("SELECT * FROM transaksi WHERE tanggal = '$hari'")->num_rows();
        $transaksi_bulan = $this->db->query("SELECT * FROM transaksi WHERE bulan = '$bulan'")->num_rows();
        $transaksi_tahun = $this->db->query("SELECT * FROM transaksi WHERE tahun = '$tahun'")->num_rows();

         ?>

         <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5 h5">Total Transaksi <?= $transaksi_semua; ?> Unit</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?= base_url('staff/jurnal'); ?>">
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
                <div class="mr-5 h5">Total Transaksi Hari Ini <?= $transaksi_hari; ?> Unit</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?= base_url('staff/jurnal/hari'); ?>">
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
                <div class="mr-5 h5">Total Transaksi Bulan Ini <?= $transaksi_bulan; ?> Unit</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?= base_url('staff/jurnal/bulan'); ?>">
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
                <div class="mr-5 h5">Total Transaksi Tahun Ini <?= $transaksi_tahun; ?> Unit</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?= base_url('staff/jurnal/tahun'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <?php if($waktu == "bulan" && $angka == 0) : ?>

          <div class="row">
            <div class="col-9"></div>
            <div class="col">
            <div class="form-group">
              <select class="custom-select bulan-jurnal" name="bulan">

                <?php 

                $bulan2 = $this->db->query("SELECT DISTINCT bulan FROM transaksi  ORDER BY bulan")->result_array();

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
            <div class="col-9"></div>
            <div class="col">
            <div class="form-group">
              <select class="custom-select bulan-jurnal" name="bulan">

                <?php 

                $bulan2 = $this->db->query("SELECT DISTINCT bulan FROM transaksi  ORDER BY bulan")->result_array();

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
            <div class="col-9"></div>
            <div class="col">
            <div class="form-group">
              <select class="custom-select tahun-jurnal" name="tahun">

                <?php 

                $tahun2 = $this->db->query("SELECT DISTINCT tahun FROM transaksi  ORDER BY tahun")->result_array();

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
            <div class="col-9"></div>
            <div class="col">
            <div class="form-group">
              <select class="custom-select tahun-jurnal" name="tahun">

                <?php 

                $tahun2 = $this->db->query("SELECT DISTINCT tahun FROM transaksi  ORDER BY tahun")->result_array();

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

            <table class="table table-border table-striped">
	          <thead>
	            <tr class="bg-primary">
	              <th scope="col">Tanggal</th>
	              <th scope="col">Akun</th>
	              <th scope="col">Debit</th>
	              <th scope="col">Kredit</th>
	            </tr>
	          </thead>
	          <tbody>

	           <?php $tgl = ''; ?>
	           <?php foreach($transaksi_detail as $td) : ?>

	           	<tr>
	           		<td>

	           			<?php if($tgl != $td->tanggal) { echo $td->tanggal . '/' . $td->bulan; } ?>
	           			
	           			<?php $tgl = $td->tanggal; ?>
	           		</td>
	           		<td <?php if($td->debit == 0) { echo "class='pl-5'"; } ?>><?php echo $td->akun; ?></td>
	           		<td><?php echo 'Rp. ' . $td->debit; ?></td>
	           		<td><?php echo 'Rp. ' . $td->kredit; ?></td>
	           	</tr>

	           <?php endforeach ; ?>

	          </tbody>
	        </table>

          </div>

        </div>

      </div>
      <!-- /.container-fluid -->
