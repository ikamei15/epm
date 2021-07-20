<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">Pesanan</h1>
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
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($semua_pesanan as $semua_pesanan){
            ?>
            <tr>
                <td><?=$semua_pesanan->rp_penerima?></td>
                <td><?=$semua_pesanan->rp_no_pesanan?></td>
                <td><?=$semua_pesanan->rp_alamat?></td>
                <td><?=$semua_pesanan->rp_notelp?></td>
                <td><?=$semua_pesanan->rp_created_date?></td>
                <td>
                    <?php
                    if($semua_pesanan->rp_status==1){
                    ?>
                    <span class="badge bg-info">Dalam Pemeriksaan</span>
                    <?php
                    }else if($semua_pesanan->rp_status==2){
                    ?>
                    <span class="badge bg-warning">Menunggu Pembayaran</span>
                    <?php
                    }else if($semua_pesanan->rp_status==3){
                    ?>
                    <span class="badge bg-warning">Dalam Proses</span>
                    <?php
                    }else if($semua_pesanan->rp_status==4){
                    ?>
                    <span class="badge bg-primary">Dikirim</span>
                    <?php
                    }else if($semua_pesanan->rp_status==5){
                    ?>
                    <span class="badge bg-success">Selesai</span>
                    <?php
                    }
                    ?>
                </td>
                <td></td>
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
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>