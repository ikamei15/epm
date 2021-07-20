<body class="bg-light">
  <h1 align="center" class="logo-daftar-login"><a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png" class="img-fluid" width="170px"></a></h1>
  <div class="container d-flex justify-content-center">
    <div class="box-registrasi-login shadow-sm bg-white">
      <h3 align="center">Masuk</h3>
      <h5 align="center" class="text-muted h6">Belum punya akun? <a href="<?=base_url()?>daftar">Daftar </a></h5>
      <br>
      <?php
      if(isset($_GET['alert'])){
        if($_GET['alert'] == 'wrong'){
          echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Oops!</strong> Username atau Password Salah.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
          ";
        }
      }
      ?>
      <form class="form-daftar" name="form-login" action="<?=base_url()?>masuk/login_act" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-success">Masuk</button>
      </form>
    </div>
  </div>
</body>