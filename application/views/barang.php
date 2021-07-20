        <?php
            foreach ($data_barang as $data_barang) {
        ?>
        <section class="bg-white py-5 border-bottom">
            <div class="container px-5 my-5 discount-section border-bottom">
                <div class="row gx-5">
                    <div class="col-lg-3" style="margin-bottom: 20px;">
                        <div class="box-image-barang shadow-sm">
                            <a href="<?=base_url()?>assets/images/accesoris/<?=$data_barang->bd_gambar?>" target="_blank"><img src="<?=base_url()?>assets/images/accesoris/<?=$data_barang->bd_gambar?>" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-lg-6" style="margin-bottom: 20px;">
                        <h3><?=$data_barang->bd_nama_barang?></h3>
                        <p>Terjual <small class="text-muted"><?=$data_barang->terjual?></small></p>
                        <h2>Rp <?=number_format($data_barang->bd_harga,0,',','.')?></h2>
                        <hr>
                        <br>
                        <h5>Deskripsi</h5>
                        <p>
                            <small class="text-muted">Berat :</small> <?=$data_barang->bd_berat?>gr <br>
                            <small class="text-muted">Kategori :</small> <?=$data_barang->kb_nama_kategori?>
                        </p>
                        <p><?=$data_barang->bd_deskripsi?></p>
                    </div> 
                    <div class="col-lg-3">
                            <div class="box-beli shadow">
                                <h6>Atur Jumlah</h6>
                                <p><small class="text-muted">Stok :</small> <?=$data_barang->bd_stok?></p>
                                <ul class="input-number-group">
                                    <li><button id="down" class="btn btn-success btn-tambah-kurang" onclick=" down('0')"><i class="bi bi-dash"></i></button></li>
                                    <form id="form-qty" action="<?=base_url().'keranjang/tambah_keranjang?id_barang='.$data_barang->bd_id?>" method="post">
                                    <li><input type="text" id="myNumber" class="form-control input-number" value="<?=$data_barang->jml_barang?>" name="qty" readonly></li>
                                    </form>
                                    <li><button id="up" class="btn btn-success btn-tambah-kurang" onclick="up('<?=$data_barang->bd_stok?>')"><i class="bi bi-plus"></i></button></li>
                                </ul>
                                <!-- <input type="text" name="" class="form-control input-catatan " placeholder="Catatan"> -->
                                <p class="h5 pb-4 pt-3"><small class="text-muted h6">subtotal : </small><b>Rp <span id="total-harga"><?=number_format($data_barang->bd_harga*$data_barang->jml_barang,0,',','.')?></span></b></p>
                                <div class="d-grid gap-2">
                                  <button class="btn btn-success<?php if($data_barang->bd_stok==0){ ?> disabled<?php }?>" type="submit" form="form-qty">Tambah Keranjang</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            function up(max) {
                var price = <?=$data_barang->bd_harga?>;
                var total = (parseInt(document.getElementById("myNumber").value) + 1) * price;
                document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
                document.getElementById("total-harga").innerHTML = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                if (document.getElementById("myNumber").value >= parseInt(max)) {
                    document.getElementById("myNumber").value = max;
                    document.getElementById("total-harga").innerHTML = (price*max).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
            }
            function down(min) {
                var price = <?=$data_barang->bd_harga?>;
                var total = (parseInt(document.getElementById("myNumber").value) - 1) * price;
                document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
                document.getElementById("total-harga").innerHTML = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                if (document.getElementById("myNumber").value <= parseInt(min)) {
                    document.getElementById("myNumber").value = min;
                    document.getElementById("total-harga").innerHTML = (price*min).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                }
            }
        </script>
        <?php
            }
        ?>
