<?php
$data = $_GET['laporan'];

switch($data){
    case "penjualan" :
?>
<!-- Page content-->
<div class="container cont-dashboard container-fluid">
    <h3 class="mt-4" align="center">Laporan Transaksi</h3>
    <h1 class="mt-4" align="center">PT ENKA PERKASA MANDIRI</h1>
    <br>
    <div class="row">
        <div class="col-lg-12 col-12 box-dashboard">
            <div class="col-12">
                <table class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Pembeli</th>
                            <th>No. Pesanan</th>
                            <th>Status</th>
                            <th>Tgl Pembelian</th>
                            <th>Total Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($penjualan as $penjualan){
                        ?>
                        <tr>
                            <td><?=$penjualan->pembeli?></td>
                            <td><?=$penjualan->rp_no_pesanan?></td>
                            <td>
                                <?php
                                if($penjualan->rp_status==1){
                                ?>
                                <span class="badge bg-info">Dalam Pemeriksaan</span>
                                <?php
                                }else if($penjualan->rp_status==2){
                                ?>
                                <span class="badge bg-warning">Menunggu Pembayaran</span>
                                <?php
                                }else if($penjualan->rp_status==3){
                                ?>
                                <span class="badge bg-warning">Dalam Proses</span>
                                <?php
                                }else if($penjualan->rp_status==4){
                                ?>
                                <span class="badge bg-primary">Dikirim</span>
                                <?php
                                }else if($penjualan->rp_status==5){
                                ?>
                                <span class="badge bg-success">Selesai</span>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?=$penjualan->tgl_pembelian?></td>
                            <td><?=number_format($penjualan->total_harga,0,',','.')?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
break;

case "barang" :
?>
<div class="container cont-dashboard container-fluid">
    <h3 class="mt-4" align="center">Laporan Barang</h3>
    <h1 class="mt-4" align="center">PT ENKA PERKASA MANDIRI</h1>
    <br>
    <div class="row">
        <div class="col-lg-12 col-12 box-dashboard">
            <div class="col-12">
                <table class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Terjual</th>
                            <th>Pembelian Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($barang_terlaris as $barang_terlaris){
                        ?>
                        <tr>
                            <td><?=$barang_terlaris->bd_nama_barang?></td>
                            <td><?=$barang_terlaris->terjual?></td>
                            <td><?=$barang_terlaris->tgl_pembelian_terakhir?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
break;

case "pembeli" :
?>
<div class="container cont-dashboard container-fluid">
    <h3 class="mt-4" align="center">Laporan Pembeli</h3>
    <h1 class="mt-4" align="center">PT ENKA PERKASA MANDIRI</h1>
    <br>
    <div class="row">
        <div class="col-lg-12 col-12 box-dashboard">
            <div class="col-12">
                <table class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jml Transaksi</th>
                            <th>Total Pembelian</th>
                            <th>Total Barang</th>
                            <th>Tgl Pembelian terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pembeli as $pembeli){
                        ?>
                        <tr>
                            <td><?=$pembeli->pembeli?></td>
                            <td><?=$pembeli->jml_trx?></td>
                            <td><?=number_format($pembeli->total_pembelian,0,',','.')?></td>
                            <td><?=$pembeli->total_barang?></td>
                            <td><?=$pembeli->tgl_pembelian_terakhir?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
break;

case "pesan" :
?>
<div class="container cont-dashboard container-fluid">
    <h3 class="mt-4" align="center">Laporan Pesan Pembeli</h3>
    <h1 class="mt-4" align="center">PT ENKA PERKASA MANDIRI</h1>
    <br>
    <div class="row">
        <div class="col-lg-12 col-12 box-dashboard">
            <div class="col-12">
                <br>
                <table class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Tgl Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($hubungi_kami as $hubungi_kami){
                        ?>
                        <tr>
                            <td><?=$hubungi_kami->hk_nama_lengkap?></td>
                            <td><?=$hubungi_kami->hk_notelp?></td>
                            <td><?=$hubungi_kami->hk_email?></td>
                            <td><p class="judul-item"><?=$hubungi_kami->hk_pesan?></p></td>
                            <td><?=$hubungi_kami->hk_created_date?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
break;
default:
echo "Error";
}
?>
<script type="text/javascript">
    window.print();
    document.getElementById("menu-laporan").className = "list-group-item list-group-item-action p-3 menu-active";
</script>