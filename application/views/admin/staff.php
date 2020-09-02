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

        		<a href="<?= base_url('admin/tambah_staff'); ?>" class="btn btn-primary mb-3">Tambah Staff</a>
        		
		        <table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nama</th>
				      <th scope="col">Jenis Kelamin</th>
				      <th scope="col">No. hp</th>
				      <th scope="col">Alamat</th>
				      <th scope="col">Image</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php $i = 1; ?>
				  	<?php foreach($staff as $sf) : ?>

					    <tr>
					      <th scope="row"><?= $i; ?></th>
					      <td><?= $sf['nama']; ?></td>
					      <td><?= $sf['jenis_kelamin']; ?></td>
					      <td><?= $sf['no_hp']; ?></td>
					      <td><?= $sf['alamat']; ?></td>
					      <td>
					      	<img src="<?= base_url('assets/img/profile/staff/') . $sf['image']; ?>" class="img-thumbnail" width="80"></td>
					      </td>
					      <td>
					      	
					      	<a href="<?= base_url('admin/edit_staff/') . $sf['id']; ?>" class="badge badge-success">Edit</a>
					      	<a href="<?= base_url('admin/hapus_staff/') . $sf['id']; ?>" class="badge badge-danger">Hapus</a>

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
