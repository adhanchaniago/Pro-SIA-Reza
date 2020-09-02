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

        		<?= $this->session->flashdata('message'); ?>

        		<?php if($this->session->flashdata('message')) : ?>

        			<script type="text/javascript">
        				
        				var win = window.open("<?= base_url('staff/cetak_service'); ?>");
        				win.focus();

        			</script>

        		<?php endif ; ?>

        		<div class="row">
        			<div class="col-4">

        				<?php 

        				$max = $this->db->query('SELECT max(nomor_service) FROM service')->row_array();

        				if($max['max(nomor_service)'] == NULL) {

        					$nomor = 1;
        				} else if($max['max(nomor_service)'] != null){

        					$nomor = (int)$max['max(nomor_service)'] + 1;
        				}

        				?>

        				<p>Nomor Service : <?= $nomor; ?></p>
		        		<p>Staff : <?= $data['nama']; ?></p>
        				
        			</div>
        			<div class="col-6">

		        		<p>Tanggal : <?= date('d F Y', time()); ?></p>
		        		<p>Waktu : <?= date('H:i', time()); ?></p>
        				
        			</div>
        		</div>

        		<div class="row">
        			<div class="col-4 pt-3">

        				<form method="post" action="<?= base_url('staff/service'); ?>">

        					<input type="hidden" name="nomor_service" id="nomor_service" value="<?= $nomor; ?>">
        					<input type="hidden" name="id_staff" id="id_staff" value="<?= $data['id']; ?>">
        					<input type="hidden" name="jam" id="jam" value="<?= date('H:i', time()); ?>">
        					<input type="hidden" name="tanggal" id="tanggal" value="<?= date('d', time()); ?>">
        					<input type="hidden" name="bulan" id="bulan" value="<?= date('m', time()); ?>">
        					<input type="hidden" name="tahun" id="tahun" value="<?= date('Y', time()); ?>">
				  
						  <div class="form-group row">
						    <label for="pelanggan" class="col-sm-4 col-form-label">Nama pelanggan</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="pelanggan" name="pelanggan" placeholder="Nama pelanggan">
						      <?= form_error('pelanggan', "<small class='text-danger'>", "</small>") ?>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="no_hp" class="col-sm-4 col-form-label">Nomor HP</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP">
						      <?= form_error('no_hp', "<small class='text-danger'>", "</small>") ?>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="merk" class="col-sm-4 col-form-label">Merk motor</label>
						   <div class="col-sm-8">
						       <select class="custom-select" id="merk" name="merk">
						       	  <option disabled selected>Pilih Merk motor :</option>
								  <option value="Honda">Honda</option>
								  <option value="Yamaha">Yamaha</option>
								  <option value="Suzuki">Suzuki</option>
								</select>
						      <?= form_error('merk', "<small class='text-danger'>", "</small>") ?>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="plat" class="col-sm-4 col-form-label">Plat nomor</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="plat" name="plat" placeholder="Plat nomor">
						      <?= form_error('plat', "<small class='text-danger'>", "</small>") ?>
						    </div>
						  </div>
						  
        				
        			</div>
        			<div class="col-6 pt-3">
				  
						  <div class="form-group row">
						    <label for="teknisi" class="col-sm-4 col-form-label">Nama teknisi</label>
						   <div class="col-sm-8">
						       <select class="custom-select" id="teknisi" name="teknisi">
						       	  <option disabled selected>Pilih teknisi :</option>
								
						       	  <?php foreach($teknisi as $tk) : ?>

								  	<option value="<?= $tk['id'] ?>"><?= $tk['nama'] ?></option>

								  <?php endforeach ; ?>

								</select>
						      <?= form_error('teknisi', "<small class='text-danger'>", "</small>") ?>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="jenis" class="col-sm-4 col-form-label">Jenis service</label>
						   <div class="col-sm-8">
						       <select class="custom-select" id="jenis" name="jenis[]" multiple>

						       	<?php foreach($jenis_service as $js) : ?>

								  <option value="<?= $js['id']; ?>"><?= $js['service']; ?></option>

								<?php endforeach ; ?>

								</select>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
						    <div class="col-sm-8">
						      <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
						      <?= form_error('keterangan', "<small class='text-danger'>", "</small>") ?>
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

        </div>

      </div>
      <!-- /.container-fluid -->
