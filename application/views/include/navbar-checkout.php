<body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <!-- <div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div> -->
                <div class="list-group list-group-flush position-relative"><br>
                    <span class="list-group-item list-group-item-action list-group-item-light p-3">&nbsp</span>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url()?>keranjang">Keranjang</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url()?>daftar_belanja">Daftar Belanja</a>
                    <div class="col-lg-12 section-search-mobile">
                        <form action="<?=base_url()?>search" method="get">
                            <input type="text" name="cari" class="form-mencari">
                            <input type="hidden" name="order" class="form-mencari" value="Terlaris">
                            <button class="search-button" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                    <?php
                    if($this->session->userdata('status')=="login"){
                    ?>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url()?>data_diri"><?=$this->session->userdata('ud_nama')?></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url()?>masuk/logout">Logout</a>
                    <?php
                    }else{
                    ?>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url()?>masuk">Masuk</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url()?>daftar">Daftar</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom fixed-top">
                        <button class="btn btn-primary" id="sidebarToggle"><span class="toggler-menu-icon"></span></button>
                        <div class="container px-5">
                            <div class="col-lg-2">
                                <div class="container">
                                    <a class="navbar-brand" href="<?=base_url()?>"><img class="img-fluid" src="<?=base_url()?>assets/images/logo.png" width="70px"></a>
                                </div>
                            </div>
                            <div class="col-lg-7 section-search">
                            </div>
                            <div class="col-lg-3">
                               
                            </div>
                        </div>
                </nav>