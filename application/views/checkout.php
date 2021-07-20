        <?php
        foreach ($ringskasan_krj as $ringskasan_krj){
        ?>
        <!-- Pricing section-->
        <section class="bg-white py-5">
            <div class="container px-5 my-5 discount-section border-bottom">
                <div class="row gx-5">
                    <h1>Checkout</h1>
                    <div class="col-lg-8">
                        <div class="alamat-checkout">
                            <p><strong>Alamat Pengiriman</strong></p>
                            <hr>
                            <form id="form-alamat" action="<?=base_url().'checkout/pesan'?>" method="post">
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Penerima</label>
                                <input type="text" name="penerima" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$this->session->userdata('ud_nama')?>">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No Telpon</label>
                                <input type="number" name="notelp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$ringskasan_krj->ud_notelp?>">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="exampleInputPassword1"><?=$ringskasan_krj->ud_alamat?></textarea>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode Pos</label>
                                <input type="number" class="form-control" name="kodepos" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$ringskasan_krj->ud_kodepos?>">
                              </div>
                            </form>
                        </div>

                        <p><strong>Daftar Barang</strong></p>
                        <hr>
                        <?php
                        foreach ($keranjang as $keranjang){
                        ?>
                        <div class="item-checkout">
                            <ul class="item-checkout-grid">
                                <li><img src="<?=base_url()?>assets/images/accesoris/<?=$keranjang->bd_gambar?>" class="img-fluid img-checkout shadow-sm" width="90px" height="90px"></li>
                                <li><p><strong><?=$keranjang->bd_nama_barang?></strong><br>
                                <?=$keranjang->kr_qty?> Barang<br>
                                <strong>Rp<?=number_format($keranjang->total_harga,0,',','.')?></strong></p></li>
                            </ul>
                        </div>
                        <?php
                        }
                        ?>
                    </div> 
                    <div class="col-lg-4">
                        <div class="box-beli shadow">
                            <h6>Ringkasan</h6>
                            <p><small class="text-muted">Jumlah Barang :</small> <?=$ringskasan_krj->jml_barang?></p>
                            <p class="h5 pb-4 pt-3"><small class="text-muted h6">Total Harga : </small><b>Rp <?=number_format($ringskasan_krj->total_harga,0,',','.')?><b></p>
                            <div class="d-grid gap-2">
                              <button class="btn btn-success" type="submit" form="form-alamat">Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        }
        ?>