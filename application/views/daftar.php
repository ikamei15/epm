<body class="bg-light">
  <h1 align="center" class="logo-daftar-login"><a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png" class="img-fluid" width="170px"></a></h1>
  <div class="container d-flex justify-content-center">
    <div class="box-registrasi-login shadow-sm bg-white">
      <h3 align="center">Daftar</h3>
      <h5 align="center" class="text-muted h6">Sudah punya akun? <a href="<?=base_url()?>masuk">Masuk </a></h5>
      <form class="form-daftar" action="<?=base_url()?>daftar/daftar_act" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="exampleInputEmail1" required="" name="nama">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="" name="email">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" required="" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
      </form>
    </div>
  </div>
</body>