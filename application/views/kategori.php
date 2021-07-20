
       
                <!-- Page content-->
                <!-- Header-->
        <header class="bg-dark py-5 text-white">
            <div class="container px-5">
                <?php
                foreach($kategori as $kategori){
                ?>
                <h1><?=$kategori->kb_nama_kategori?></h1>
                <?php
                }
                ?>
            </div>
        </header>
        <!-- Pricing section-->
        <section class="bg-light py-5 border-bottom">
            <div class="container px-5 my-5 discount-section border-bottom">
                <div class="text-left mb-5">
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?=base_url()?>kategori?kat=<?=$_GET['kat']?>&order=termurah">Termurah</a></li>
                        <li><a class="dropdown-item" href="<?=base_url()?>kategori?kat=<?=$_GET['kat']?>&order=termahal">Termahal</a></li>
                        <li><a class="dropdown-item" href="<?=base_url()?>kategori?kat=<?=$_GET['kat']?>&order=terlaris">Terlaris</a></li>
                      </ul>
                    </div>
                </div>
                <div class="row gx-5">
                    <?php
                    foreach($data_kategori as $data_kategori){
                    ?>
                    <div class="col-lg-2 item-discount" onclick="window.location.href='<?=base_url()?>barang?id_barang=<?=$data_kategori->bd_id?>'">
                        <div class="box-discount">
                            <div class="item-gambar" style="background: url('<?=base_url()?>assets/images/accesoris/<?=$data_kategori->bd_gambar?>'); background-position: center; background-size: cover;">
                                &nbsp;
                            </div>
                            <div class="discount item-jual-desc">
                                <p class="judul-item-jual"><?=$data_kategori->bd_nama_barang?></p>
                                <h2 class="h5 fw-bolder">Rp. <?=number_format($data_kategori->bd_harga,0,',','.')?></h2>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>