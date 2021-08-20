<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">Pengiriman</h1>
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
                <th>No. Resi</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pengiriman as $pengiriman){
            ?>
            <tr>
                <td><?=$pengiriman->rp_penerima?></td>
                <td><?=$pengiriman->rp_no_pesanan?></td>
                <td><p class="judul-item"><?=$pengiriman->rp_alamat?></p></td>
                <td><?=$pengiriman->rp_notelp?></td>
                <td><?=$pengiriman->rp_created_date?></td>
                <td>
                    <?php
                    if($pengiriman->rp_status==1){
                    ?>
                    <span class="badge bg-info">Dalam Pemeriksaan</span>
                    <?php
                    }else if($pengiriman->rp_status==2){
                    ?>
                    <span class="badge bg-warning">Menunggu Pembayaran</span>
                    <?php
                    }else if($pengiriman->rp_status==3){
                    ?>
                    <span class="badge bg-warning">Dalam Proses</span>
                    <?php
                    }else if($pengiriman->rp_status==4){
                    ?>
                    <span class="badge bg-primary">Dikirim</span>
                    <?php
                    }else if($pengiriman->rp_status==5){
                    ?>
                    <span class="badge bg-sucess">Selesai</span>
                    <?php
                    }
                    ?>
                </td>
                <td><?=$pengiriman->rp_noresi?></td>
                <td align="center"><a href="<?=base_url()?>mailer?param=selesai&id_pesanan=<?=$pengiriman->rp_id?>&recipient=<?=$pengiriman->ud_email?>&status=<?=$pengiriman->rp_status?>"><i class="bi bi-file-earmark-check-fill" title="Pengecekan Selesai"></i></a></td>
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
<script type="text/javascript">
    document.getElementById("menu-pengiriman").className = "list-group-item list-group-item-action p-3 menu-active";
</script>