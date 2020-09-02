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

        <?php echo $this->session->flashdata('message'); ?>

        <div class="row">
        	
        	<div class="col-8">

        		<div class="row">
        			<div class="col">

        				<?php 

        				$max = $this->db->query('SELECT max(nomor_penjualan) FROM penjualan')->row_array();

        				if($max['max(nomor_penjualan)'] == NULL) {

        					$nomor = 1;
        				} else if($max['max(nomor_penjualan)'] != null){

        					$nomor = (int)$max['max(nomor_penjualan)'] + 1;
        				}

        				?>

        				<p>Nomor Transaksi : <?= $nomor; ?></p>
        				
        			</div>
        			<div class="col">

		        		<div class="form-group row">
							<label for="tanggal_transaksi" class="col-sm-3 col-form-label">Tanggal : </label>
					    	<div class="col-sm-9">

<form action="<?php echo base_url('staff/selesai_transaksi'); ?>" method="post">

						    	<input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi">
						    </div>
						</div>
        				
        			</div>
        		</div>

        		<div id="table">
				  
				  <table class="table"">

				  	<thead>
				  		<tr class="bg-success text-white">
				  			<td>Akun dan Deskripsi</td>
				  			<td>Debit</td>
				  			<td>Kredit</td>
				  		</tr>
				  	</thead>
				  	<tbody>

				  		<?php if(count($transaksi_temp) > 0) : ?>

				  			<?php foreach($transaksi_temp as $tt) : ?>

				  				<tr>
				  					<td><?php echo $tt->akun; ?></td>
				  					<td><?php echo $tt->debit; ?></td>
				  					<td><?php echo $tt->kredit; ?></td>
				  				</tr>

				  			<?php endforeach ; ?>

				  		<?php endif ; ?>
				  		
				  		<tr>
				  			<td>
				  				
				  				<div class="form-group">
							       <select class="custom-select" id="id_akun" name="id_akun">
							       	  <option value="0" disabled selected>Pilih akun :</option>

							       	  <?php foreach($akun as $br) : ?>

									  	<option value="<?= $br->id; ?>"><?= $br->akun; ?></option>

									  <?php endforeach ; ?>
									  
									</select>
								</div>

				  			</td>
				  			<td><input type="text" class="form-control" name="debit" id="debit"></td>
				  			<td><input type="text" class="form-control" name="kredit" id="kredit"></td>
				  		</tr>
				  		<tr>
				  			<td>Total</td>

				  			<?php 

				  			$this->db->select('sum(debit)');
							$debit = $this->db->get('transaksi_temp')->result_array();

							$this->db->select('sum(kredit)');
							$kredit = $this->db->get('transaksi_temp')->result_array();

							 ?>

				  			<td><?php echo $debit[0]['sum(debit)'] ?></td>
				  			<td><?php echo $kredit[0]['sum(kredit)'] ?></td>
				  		</tr>

				  	</tbody>
				  	
				  </table>

				 </div>

				 <div class="transaksi-temp"></div>

				  <div class="d-flex justify-content-between">
				    

				    	<a href="#" class="btn btn-info tambah-transaksi">Tambah</a>
				    
				    

				    	<button type="submit" class="btn btn-success selesai-transaksi">Selesai</button>

</form>

				    
				  </div>
				

        	</div>

        	<div class="col">

        		<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#tambahAkunModal">Tambah Akun</button>
        		
        		<table class="table"">

				  	<thead>
				  		<tr class="bg-info text-white">
				  			<td>No.</td>
				  			<td>Akun</td>
				  		</tr>
				  	</thead>
				  	<tbody>
				  		
				  		<?php $nom = 1; ?>
				  		<?php foreach($akun as $ak) : ?>

				  			<tr>
				  				<td><?php echo $nom; ?></td>
				  				<td><?php echo $ak->akun; ?></td>
				  			</tr>

				  		<?php $nom++; ?>
				  		<?php endforeach ; ?>

				  	</tbody>
				  	
				  </table>

        	</div>

        </div>

        <!-- Logout Modal-->
		  <div class="modal fade" id="tambahAkunModal" tabindex="-1" role="dialog" aria-labelledby="tambahAkunModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="tambahAkunModalLabel">Masukkan Nama Akun</h5>
		          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">×</span>
		          </button>
		        </div><form method="post" action="<?= base_url('staff/tambah_akun'); ?>">
		        <div class="modal-body"><input type="text" name="akun" class="form-control" placeholder="Masukkan Nama Akun..."></div>
		        <div class="modal-footer">
		          <button class="btn btn-primary" type="submit">Tambah</button>
		        </div></form>
		      </div>
		    </div>
		  </div>

      </div>
      <!-- /.container-fluid -->
