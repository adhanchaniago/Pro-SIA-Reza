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

        <div class="row">
        	
        	<div class="col-md-8">

        		<?= $this->session->flashdata('message'); ?>

        		<a href="<?= base_url('admin/tambah_jenis_service'); ?>" class="btn btn-primary mb-3">Tambah Jenis Service</a>
        		
		        <table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Jenis service</th>
				      <th scope="col">Biaya</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php $i = 1; ?>
				  	<?php foreach($jenis_service as $sf) : ?>

					    <tr>
					      <th scope="row"><?= $i; ?></th>
					      <td><?= $sf['service']; ?></td>
					      <td>Rp. <?= $sf['biaya']; ?></td>
					      <td>
					      	
					      	<a href="<?= base_url('admin/edit_jenis_service/') . $sf['id']; ?>" class="badge badge-success">Edit</a>
					      	<a href="<?= base_url('admin/hapus_jenis_service/') . $sf['id']; ?>" class="badge badge-danger">Hapus</a>

					      </td>
					    </tr>

					<?php $i++; ?>
					<?php endforeach ; ?>

				  </tbody>
				</table>

        	</div>

        </div>

      </div>
      <!-- /.container-fluid -->
