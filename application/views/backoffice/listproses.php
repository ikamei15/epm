<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">Pesanan Diproses</h1>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($diproses as $diproses){
            ?>
            <tr>
                <td><?=$diproses->rp_penerima?></td>
                <td><?=$diproses->rp_no_pesanan?></td>
                <td><?=$diproses->rp_alamat?></td>
                <td><?=$diproses->rp_notelp?></td>
                <td><?=$diproses->rp_created_date?></td>
                <td>
                    <?php
                    if($diproses->rp_status==1){
                    ?>
                    <span class="badge bg-info">Dalam Pemeriksaan</span>
                    <?php
                    }else if($diproses->rp_status==2){
                    ?>
                    <span class="badge bg-warning">Menunggu Pembayaran</span>
                    <?php
                    }else if($diproses->rp_status==3){
                    ?>
                    <span class="badge bg-warning">Dalam Proses</span>
                    <?php
                    }else if($diproses->rp_status==4){
                    ?>
                    <span class="badge bg-primary">Dikirim</span>
                    <?php
                    }else{
                    ?>
                    <span class="badge bg-success">Selesai</span>
                    <?php
                    }
                    ?>
                </td>
                <td class="position-relative">
                    <?php
                    if($diproses->rp_status==1){
                    ?>
                    <form action="<?=base_url()?>backoffice/update_ongkir" method="post">
                        <input type="number" class="form-control" name="ongkir" value="<?=number_format($diproses->rp_ongkir,0,',','')?>"><button type="submit" class="btn btn-save-ongkir"><i class="bi bi-check"></i></button>
                        <input type="hidden" name="id_pesanan" value="<?=$diproses->rp_id?>">
                        <input type="hidden" name="nopesanan" value="<?=$diproses->rp_no_pesanan?>">
                    </form>
                    <?php
                    }else if($diproses->rp_status==2){
                    ?>
                    <button class="btn btn-secondary">Lihat Bukti Transfer</button>
                    <?php
                    }else if($diproses->rp_status==3){
                    ?>
                    <form action="<?=base_url()?>backoffice/update_noresi" method="post">
                        <input type="text" class="form-control" name="noresi" value="<?=$diproses->rp_noresi?>"><button type="submit" class="btn btn-save-ongkir"><i class="bi bi-check"></i></button>
                        <input type="hidden" name="id_pesanan" value="<?=$diproses->rp_id?>">
                        <input type="hidden" name="nopesanan" value="<?=$diproses->rp_no_pesanan?>">
                    </form>
                    <?php
                    }else if($diproses->rp_status==4){
                    ?>
                    <?php
                    }else if($diproses->rp_status==5){
                    ?>
                    <?php
                    }
                    ?>
                </td>
                <td align="center"><a href="<?=base_url()?>mailer?param=pengiriman&id_pesanan=<?=$diproses->rp_id?>&recipient=<?=$diproses->ud_email?>&status=<?=$diproses->rp_status?>"><i class="bi bi-file-earmark-check-fill" title="Pengecekan Selesai"></i></a></td>
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
                <th>No. Resi</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>