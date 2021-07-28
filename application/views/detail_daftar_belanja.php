        <?php
        foreach ($ringkasan_belanja as $ringkasan_belanja){
        ?>
        <!-- Pricing section-->
        <section class="bg-white py-5">
            <div class="container px-5 my-5 discount-section border-bottom">
                <div class="row gx-5">
                    <h1><?=$ringkasan_belanja->rp_no_pesanan?></h1>
                    <h4><?php
                    if($ringkasan_belanja->rp_status==1){
                    ?>
                    <span class="badge bg-info">Dalam Pemeriksaan</span>
                    <?php
                    }else if($ringkasan_belanja->rp_status==2){
                    ?>
                    <span class="badge bg-warning">Menunggu Pembayaran</span>
                    <?php
                    }else if($ringkasan_belanja->rp_status==3){
                    ?>
                    <span class="badge bg-warning">Dalam Proses</span>
                    <?php
                    }else if($ringkasan_belanja->rp_status==4){
                    ?>
                    <span class="badge bg-primary">Dikirim</span>
                    <?php
                    }else if($ringkasan_belanja->rp_status==5){
                    ?>
                    <span class="badge bg-success">Selesai</span>
                    <?php
                    }
                    ?></h4>
                    <div class="col-lg-8">
                        <div>
                            <p><strong>Alamat Pengiriman</strong></p>
                            <hr>
                            <dl class="row">
                              <dt class="col-sm-3">Penerima</dt>
                              <dd class="col-sm-9"><?=$ringkasan_belanja->rp_penerima?></dd>

                              <dt class="col-sm-3">No. Telepon</dt>
                              <dd class="col-sm-9"><?=$ringkasan_belanja->rp_notelp?></dd>

                              <dt class="col-sm-3">Alamat</dt>
                              <dd class="col-sm-9"><?=$ringkasan_belanja->rp_alamat?></dd>

                              <dt class="col-sm-3">Kode Pos</dt>
                              <dd class="col-sm-9"><?=$ringkasan_belanja->rp_kodepos?></dd>
                            </dl>
                        </div>

                        <p><strong>Daftar Barang</strong></p>
                        <hr>
                        <?php
                        foreach ($belanjaan as $belanjaan){
                        ?>
                        <div class="item-checkout">
                            <ul class="item-checkout-grid">
                                <li><img src="<?=base_url()?>assets/images/accesoris/<?=$belanjaan->bd_gambar?>" class="img-fluid img-checkout shadow-sm" width="90px" height="90px"></li>
                                <li><p><strong><?=$belanjaan->bd_nama_barang?></strong><br>
                                <?=$belanjaan->dp_qty?> Barang<br>
                                <strong>Rp<?=number_format($belanjaan->dp_total_harga,0,',','.')?></strong></p></li>
                            </ul>
                        </div>
                        <?php
                        }
                        ?>
                    </div> 
                    <div class="col-lg-4">
                        <div class="box-ringkasan-det-bel shadow bg-light">
                            <h6>Total Belanja</h6>
                            <h3 class="h3 pb-4 pt-3"><b>Rp <?=number_format($ringkasan_belanja->rp_total_harga,0,',','.')?><b></h3>
                            <p><small>Jumlah Barang :</small> <?=$ringkasan_belanja->rp_qty?><br>
                            <small>Tanggal Transaksi :</small> <?=$ringkasan_belanja->tgl_pesanan?><br>
                            <?php
                            if($ringkasan_belanja->rp_status==4){
                            ?>
                            <small>Nomor Resi :</small> <?=$ringkasan_belanja->rp_noresi?><br>
                            <?php
                            }
                            ?>
                            </p>
                        </div>
                        <div class="box-ringkasan-det-bel shadow bg-light cr" onclick="window.location.href='<?=base_url()?>daftar_belanja/invoice?id_pesanan=<?=$_GET['id_pesanan']?>'">
                            <p class="cetak-invoice" align="center">Cetak Invoice</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        }
        ?>