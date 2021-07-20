        <?php
        foreach ($data_diri as $data_diri){
        ?>
        <!-- Pricing section-->
        <section class="bg-white py-5">
            <div class="container px-5 my-5 discount-section border-bottom">
                <div class="row gx-5">
                    <h1>Data Diri</h1>
                    <div class="col-lg-8">
                        <form id="form-alamat" action="<?=base_url().'data_diri/update'?>" method="post">
                        <div class="alamat-checkout">
                            <p><strong>Alamat Pengiriman</strong></p>
                            <hr>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$data_diri->ud_nama?>">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No Telpon</label>
                                <input type="number" name="notelp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$data_diri->ud_notelp?>">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="exampleInputPassword1"><?=$data_diri->ud_alamat?></textarea>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode Pos</label>
                                <input type="number" class="form-control" name="kodepos" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$data_diri->ud_kodepos?>">
                              </div>
                        </div>

                        <p><strong>Informasi Akun</strong></p>
                        <hr>
                        <div class="item-checkout">
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$data_diri->ud_email?>">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
                                <div id="emailHelp" class="form-text">Kosongkan jika tidak ingin merubah password.</div>
                              </div>
                        </div>
                        <button class="btn btn-success" type="submit">Simpan Perubahan</button>
                    </form>
                    </div> 
                </div>
            </div>
        </section>
        <?php
        }
        ?>