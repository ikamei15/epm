
                <!-- Page content-->
                <!-- Header-->
        <header class="bg-light py-5">
            <div class="container px-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <?php
                    foreach ($banner as $banner){
                    ?>
                    <div class="carousel-item 
                        <?php
                        if($banner->sb_id == $banner->min_id_banner){
                            echo "active";
                        }
                        ?>
                    ">
                      <img src="<?=base_url()?>assets/images/banner/<?=$banner->sb_gambar?>" class="d-block w-100" alt="...">
                    </div>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="btn-slide">
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                  </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5 discount-section">
                <div class="text-left mb-5">
                    <h2 class="fw-bolder">Terlaris <i class="bi bi-bookmark-heart"></i></h2>
                </div>
                <div class="row gx-5">
                    <?php
                    foreach ($terlaris as $terlaris){
                    ?>
                    <div class="col-lg-3 item-discount" onclick="window.location.href='<?=base_url()?>barang?id_barang=<?=$terlaris->dp_barang?>'">
                        <div class="box-discount">
                            <div class="item-gambar" style="background: url('<?=base_url()?>assets/images/accesoris/<?=$terlaris->bd_gambar?>'); background-position: center; background-size: cover;">
                                &nbsp;
                            </div>
                            <div class="discount item-desc">
                                <p class="judul-item"><strong><?=$terlaris->bd_nama_barang?></strong></p>
                                <p class="judul-item"><?=$terlaris->bd_deskripsi?></p>
                                <h2 class="h5 fw-bolder">Rp. <?=number_format($terlaris->bd_harga,0,',','.')?></h2>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Pricing section-->
        <section class="bg-light py-5 border-bottom">
            <div class="container px-5 my-5 discount-section border-bottom">
                <div class="text-left mb-5">
                    <h2 class="fw-bolder">Glass Clip</h2>
                    <p class="lead mb-0"><a href='<?=base_url()?>kategori?kat=1' class="lihat-semua">Lihat Semua</a></p>
                </div>
                <div class="row gx-5">
                    <?php
                    foreach ($kategori1 as $kategori1){
                    ?>
                    <div class="col-lg-2 col-6 item-discount" onclick="window.location.href='<?=base_url().'/barang?id_barang='.$kategori1->bd_id?>'">
                        <div class="box-discount">
                            <div class="item-gambar" style="background: url('<?=base_url()?>assets/images/accesoris/<?=$kategori1->bd_gambar?>'); background-position: center; background-size: cover;">
                                &nbsp;
                            </div>
                            <div class="discount item-jual-desc">
                                <p class="judul-item-jual"><?=$kategori1->bd_nama_barang?></p>
                                <h2 class="h5 fw-bolder">Rp. <?=number_format($kategori1->bd_harga,0,',','.')?></h2>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="container px-5 my-5 discount-section border-bottom">
                <div class="text-left mb-5">
                    <h2 class="fw-bolder">Glass Clamp</h2>
                    <p class="lead mb-0"><a href='<?=base_url()?>kategori?kat=2' class="lihat-semua">Lihat Semua</a></p>
                </div>
                <div class="row gx-5">
                    <?php
                    foreach ($kategori2 as $kategori2){
                    ?>
                    <div class="col-lg-2 item-discount" onclick="window.location.href='<?=base_url().'/barang?id_barang='.$kategori2->bd_id?>'">
                        <div class="box-discount">
                            <div class="item-gambar" style="background: url('<?=base_url()?>assets/images/accesoris/<?=$kategori2->bd_gambar?>'); background-position: center; background-size: cover;">
                                &nbsp;
                            </div>
                            <div class="discount item-jual-desc">
                                <p class="judul-item-jual"><?=$kategori2->bd_nama_barang?></p>
                                <h2 class="h5 fw-bolder">Rp. <?=number_format($kategori2->bd_harga,0,',','.')?></h2>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <p align="center"><a href="<?=base_url()?>katalog?order=" class="btn btn-default">Lihat Katalog</a></p>
        </section>
        <!-- Testimonials section-->
        <section class="py-5 border-bottom">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Testimoni Pembeli</h2>
                    <p class="lead mb-0">Kesan Pesan Pembeli EPM</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <?php
                        foreach ($testimoni as $testimoni){
                        ?>
                        <!-- Testimonial 1-->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1"><?=$testimoni->tp_testimoni?></p>
                                        <div class="small text-muted">- <?=$testimoni->tp_nama?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        <section class="bg-light py-5">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Hubungi Kami</h2>
                    <p class="lead mb-0">Masukan anda berarti bagi kami</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" action="<?=base_url()?>home/hubungi_kami" method="post">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" required="" name="nama" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" required="" name="email"/>
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" required=""  name="notelp"/>
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required" required=""  name="pesan"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
            </div>
        </div>