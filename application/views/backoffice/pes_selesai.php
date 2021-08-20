<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">Pesanan Selesai</h1>
    <br>
    <table id="tabledata" class="table" style="width:100%">
        <thead>
            <tr>
                <th>Penerima</th>
                <th>No Pesanan</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Tgl Pesanan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pesanan_selesai as $pesanan_selesai){
            ?>
            <tr>
                <td><?=$pesanan_selesai->rp_penerima?></td>
                <td><?=$pesanan_selesai->rp_no_pesanan?></td>
                <td><p class="judul-item"><?=$pesanan_selesai->rp_alamat?></p></td>
                <td><?=$pesanan_selesai->rp_notelp?></td>
                <td><?=$pesanan_selesai->rp_created_date?></td>
                <td>
                    <?php
                    if($pesanan_selesai->rp_status==1){
                    ?>
                    <span class="badge bg-info">Dalam Pemeriksaan</span>
                    <?php
                    }else if($pesanan_selesai->rp_status==2){
                    ?>
                    <span class="badge bg-warning">Menunggu Pembayaran</span>
                    <?php
                    }else if($pesanan_selesai->rp_status==3){
                    ?>
                    <span class="badge bg-warning">Dalam Proses</span>
                    <?php
                    }else if($pesanan_selesai->rp_status==4){
                    ?>
                    <span class="badge bg-primary">Dikirim</span>
                    <?php
                    }else if($pesanan_selesai->rp_status==5){
                    ?>
                    <span class="badge bg-success">Selesai</span>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Penerima</th>
                <th>No Pesanan</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Tgl Pesanan</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>
</div>