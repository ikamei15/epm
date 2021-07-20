        <!-- Pricing section-->
        <section class="bg-white py-5">
            <div class="container px-5 my-5 discount-section border-bottom">
                <div class="row gx-5">
                    <h1 class="title-page">Keranjang</h1>
                    <div class="col-lg-8">
                        <form>
                        <!-- <input class="form-check-input checkbox-keranjang" type="checkbox" value="" id="flexCheckDefault" id="all"> <small class="text-muted">Pilih Semua</small> -->
                        <hr>
                            <?php
                            foreach ($keranjang as $keranjang){
                            ?>
                            <div class="item-checkout item-keranjang" onclick="window.location.href='<?=base_url().'barang?id_barang='.$keranjang->kr_barang?>'">
                                <ul class="item-checkout-grid">
                                    <!-- <li><input class="form-check-input checkbox-keranjang" type="checkbox" value="" id="flexCheckDefault checkbox"></li> -->
                                    <li><img src="<?=base_url()?>assets/images/accesoris/<?=$keranjang->bd_gambar?>" class="img-fluid img-checkout shadow-sm" width="90px" height="90px"></li>
                                    <li><p><strong><?=$keranjang->bd_nama_barang?></strong><br>
                                    <?=$keranjang->kr_qty?> Barang<br>
                                    <strong>Rp<?=number_format($keranjang->total_harga,0,',','.')?></strong></p></li>
                                </ul>
                            </div>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-beli shadow">
                            <?php
                            foreach ($ringskasan_krj as $ringskasan_krj){
                            ?>
                            <h6>Ringkasan</h6>
                            <p><small class="text-muted">Jumlah Barang :</small> <?=$ringskasan_krj->jml_barang?></p>
                            <hr>
                            <p><small class="text-muted">Total Harga :</small> <b>Rp <?=number_format($ringskasan_krj->total_harga,0,',','.')?></b></p>
                            <div class="d-grid gap-2">
                              <button class="btn btn-success" type="button" onclick="window.location.href='<?=base_url()?>checkout'"
                                <?php
                                if(is_null($ringskasan_krj->jml_barang)){
                                    echo "disabled";
                                }
                                ?>
                                > Checkout</button>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
