 
  <div class="row">
    <div class="col text-center font-weight-bold mt-5 mb-3">
      <h3>welcome to,</h3>
      <h1>Toko Yudha</h1>
    </div>
  </div>

  <div class="container login">
    <div class="card bg-light card-login mx-auto">
      <div class="card-header text-primary font-weight-bold">Login</div>
      <div class="card-body">
        <form method='post' action="<?= base_url('Auth/login'); ?>">
          <?= $this->session->flashdata('message'); ?>
          <div class="form-group">
            <div class="form-label-group">
              <input type="username" id="username" name="username" class="form-control" placeholder="Username" autofocus="autofocus" value="<?= set_value('username'); ?>">
               <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
              <label for="password">Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>
    </div>
  </div>
