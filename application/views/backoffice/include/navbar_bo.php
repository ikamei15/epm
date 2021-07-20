<div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading bg-white"><img class="img-fluid" src="<?=base_url()?>assets/images/logo.png" width="70px"></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" id="menu-dashboard" href="<?=base_url()?>backoffice">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" id="menu-userdata" href="<?=base_url()?>backoffice/user_data">User Data</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" id="menu-semua-pesanan" href="<?=base_url()?>backoffice/semua_pesanan">Pesanan <i class="bi bi-chevron-down parent-pesanan"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 child-pesanan" id="menu-pengecekan" href="<?=base_url()?>backoffice/pengecekan">&nbsp;&nbsp;&nbsp;Pengecekan</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 child-pesanan" id="menu-proses" href="<?=base_url()?>backoffice/diproses">&nbsp;&nbsp;&nbsp;Di Proses</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 child-pesanan" id="menu-pengiriman" href="<?=base_url()?>backoffice/pengiriman">&nbsp;&nbsp;&nbsp;Pengiriman</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 child-pesanan" id="menu-selesai" href="<?=base_url()?>backoffice/pesanan_selesai">&nbsp;&nbsp;&nbsp;Pesanan Selesai</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" id="menu-barang" href="<?=base_url()?>backoffice/data_barang">Data Barang</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" id="menu-kategori" href="<?=base_url()?>backoffice/kategori">Kategori Barang</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" id="menu-banner" href="<?=base_url()?>backoffice/banner">Banner</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" id="menu-testimoni" href="<?=base_url()?>backoffice/testimoni">Testimoni</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" id="menu-hubungi_kami" href="<?=base_url()?>backoffice/hubungi_kami">Hubungi Kami</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->session->userdata('nama')?></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url()?>backoffice/logout">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>