        <!-- Pricing section-->
        <section class="bg-white py-5">
            <div class="container px-5 my-5 discount-section border-bottom">
                <h1>Daftar Belanja</h1>
                <Br>
                <hr>
                <h5>Menunggu Pembayaran</h5>
                <br>
                <div class="row">
                <?php
                foreach ($daftar_os as $daftar_os){
                ?>
                    <div class="col-3">
                        <div class="card text-white bg-primary">
                          <h5 class="card-header"><strong><?=$daftar_os->rp_no_pesanan?></strong></h5>
                          <div class="card-body">
                            <h5 class="card-title">Rp <?=number_format($daftar_os->rp_total_harga+$daftar_os->rp_ongkir,0,',','.')?></h5>
                            <hr>
                            <dl class="row">
                              <dt class="col-sm-6">Qty</dt>
                              <dd class="col-sm-6">: <?=$daftar_os->rp_qty?></dd>

                              <dt class="col-sm-6">Total Harga</dt>
                              <dd class="col-sm-6">: Rp <?=number_format($daftar_os->rp_total_harga,0,',','.')?></dd>

                              <dt class="col-sm-6">Ongkos Kirim</dt>
                              <dd class="col-sm-6">: Rp <?=number_format($daftar_os->rp_ongkir,0,',','.')?></dd>
                            </dl>
                            <?php
                            if(is_null($daftar_os->rp_bukti_pembayaran)){
                                echo "<a href='".base_url()."pembayaran?pesanan=".$daftar_os->rp_id."'' class='btn btn-warning'>Bayar Sekarang</a>";
                            }else{
                            ?>
                            <a href='<?=base_url()?>assets/bukti_transfer/<?=$daftar_os->rp_bukti_pembayaran?>' class='btn btn-warning' target="_blank">Lihat Bukti</a>
                            <?php
                            }
                            ?>
                          </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
                <hr>
                <br>
                <h5>Daftar Pembelian</h5>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" onclick="window.location.href='<?=base_url()?>daftar_belanja'">All</button>
                  </li>
                <?php
                foreach ($daftar_status as $daftar_status){
                ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab<?=$daftar_status->rp_status?>" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" onclick="window.location.href='<?=base_url()?>daftar_belanja?status=<?=$daftar_status->rp_status?>'"><?=$daftar_status->stat?></button>
                    </li>

                    <script type="text/javascript">
                    document.getElementById("pills-profile-tab<?=$_GET['pesanan']?>").className = "nav-link active";
                    </script>
                <?php
                }
                ?>
                </ul>
                <?php
                foreach ($daftar_belanja as $daftar_belanja){
                ?>
                <br>
                <div class="row item-daftar-belanja" onclick="window.location.href='<?=base_url().'daftar_belanja/detail_daftar_belanja?id_pesanan='.$daftar_belanja->rp_id?>'">
                    <p><?=$daftar_belanja->tgl_pesanan?></p> 
                    <ul class="item-daftar-belanja-grid">
                        <li><img src="<?=base_url()?>assets/images/accesoris/<?=$daftar_belanja->bd_gambar?>" class="img-fluid img-checkout shadow-sm" width="90px" height="90px"></li>
                        <li>
                            <p><strong><?=$daftar_belanja->rp_no_pesanan?></strong><br>
                            <small class="text-muted">Jumlah Barang : </small> 
                            <?=$daftar_belanja->rp_qty?> Barang<br>
                            <small class="text-muted">Total Tagihan : </small> 
                            <strong>Rp<?=number_format($daftar_belanja->rp_total_harga,0,',','.')?></strong><br>
                            <?php
                            if($daftar_belanja->rp_status==1){
                            ?>
                            <span class="badge bg-info">Dalam Pemeriksaan</span>
                            <?php
                            }else if($daftar_belanja->rp_status==2){
                            ?>
                            <span class="badge bg-warning">Menunggu Pembayaran</span>
                            <?php
                            }else if($daftar_belanja->rp_status==3){
                            ?>
                            <span class="badge bg-warning">Dalam Proses</span>
                            <?php
                            }else if($daftar_belanja->rp_status==4){
                            ?>
                            <small class="text-muted">Nomor Resi : <?=$daftar_belanja->rp_noresi?></small> <br>
                            <span class="badge bg-primary">Dikirim</span>
                            <?php
                            }else if($daftar_belanja->rp_status==5){
                            ?>
                            <span class="badge bg-success">Selesai</span>
                            <?php
                            }
                            ?></p>
                        </li>
                    </ul>
                </div>
                <?php
                }
                ?>
            </div>
        </section>