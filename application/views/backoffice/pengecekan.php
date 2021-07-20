<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">Pengecekan</h1>
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
                <th>Ongkir</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pengecekan as $pengecekan){
            ?>
            <tr>
                <td><?=$pengecekan->rp_penerima?></td>
                <td><?=$pengecekan->rp_no_pesanan?></td>
                <td><?=$pengecekan->rp_alamat?></td>
                <td><?=$pengecekan->rp_notelp?></td>
                <td><?=$pengecekan->rp_created_date?></td>
                <td>
                    <?php
                    if($pengecekan->rp_status==1){
                    ?>
                    <span class="badge bg-info">Dalam Pemeriksaan</span>
                    <?php
                    }else if($pengecekan->rp_status==2){
                    ?>
                    <span class="badge bg-warning">Menunggu Pembayaran</span>
                    <?php
                    }else if($pengecekan->rp_status==3){
                    ?>
                    <span class="badge bg-warning">Dalam Proses</span>
                    <?php
                    }else if($pengecekan->rp_status==4){
                    ?>
                    <span class="badge bg-primary">Dikirim</span>
                    <?php
                    }else if($pengecekan->rp_status==5){
                    ?>
                    <span class="badge bg-sucess">Selesai</span>
                    <?php
                    }
                    ?>
                </td>
                    <td class="position-relative">
                        <?php
                        if($pengecekan->rp_status==1){
                        ?>
                        <form action="<?=base_url()?>backoffice/update_ongkir" method="post">
                            <input type="number" class="form-control" name="ongkir" value="<?=number_format($pengecekan->rp_ongkir,0,',','')?>"><button type="submit" class="btn btn-save-ongkir"><i class="bi bi-check"></i></button>
                            <input type="hidden" name="id_pesanan" value="<?=$pengecekan->rp_id?>">
                            <input type="hidden" name="nopesanan" value="<?=$pengecekan->rp_no_pesanan?>">
                        </form>
                        <?php
                        }else if($pengecekan->rp_status==2){
                            if(is_null($pengecekan->rp_bukti_pembayaran)){
                                echo "<i>Belum Upload bukti transfer</i>";
                            }else{
                        ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$pengecekan->rp_id?>">
                              Periksa Pembayaran
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop<?=$pengecekan->rp_id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Pembayaran <?=$pengecekan->rp_no_pesanan?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <dl>
                                      <dt class="col-sm-3">No. Pesanan</dt>
                                      <dd class="col-sm-9"><a href="<?=base_url().'daftar_belanja/detail_daftar_belanja?id_pesanan='.$pengecekan->rp_id?>"><?=$pengecekan->rp_no_pesanan?></a></dd>

                                      <dt class="col-sm-3">Jumlah Barang</dt>
                                      <dd class="col-sm-9"><?=$pengecekan->rp_qty?></dd>

                                      <dt class="col-sm-3">Total Harga</dt>
                                      <dd class="col-sm-9">Rp<?=number_format($pengecekan->rp_total_harga,0,',','.')?></dd>

                                      <dt class="col-sm-3">Ongkos Kirim</dt>
                                      <dd class="col-sm-9">Rp<?=number_format($pengecekan->rp_ongkir,0,',','.')?></dd>
                                      <hr>
                                      <dt class="col-sm-3">Total Tagihan</dt>
                                      <dd class="col-sm-9"><strong><h4>Rp<?=number_format($pengecekan->rp_total_harga+$pengecekan->rp_ongkir,0,',','.')?></h4></strong></dd>
                                        <br>
                                      <dt>Bukti Pembayaran</dt>
                                      <dd class="col-sm-9"></dd>
                                    </dl>
                                    <img class="img-fluid" src="<?=base_url()?>assets/bukti_transfer/<?=$pengecekan->rp_bukti_pembayaran?>">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <?php
                            }
                        }else if($pengecekan->rp_status==3){
                        ?>
                        <form action="<?=base_url()?>backoffice/update_noresi" method="post">
                            <input type="number" class="form-control" name="noresi" value="<?=number_format($pengecekan->rp_noresi,0,',','')?>"><button type="submit" class="btn btn-save-ongkir"><i class="bi bi-check"></i></button>
                            <input type="hidden" name="id_pesanan" value="<?=$pengecekan->rp_id?>">
                            <input type="hidden" name="nopesanan" value="<?=$pengecekan->rp_no_pesanan?>">
                        </form>
                        <?php
                        }else if($pengecekan->rp_status==4){
                        ?>
                        <?php
                        }else if($pengecekan->rp_status==5){
                        ?>
                        <?php
                        }
                        ?>
                    </td>
                <?php
                if($pengecekan->rp_status==1){
                ?>
                <td align="center"><a href="<?=base_url()?>mailer?param=menunggu_pembayaran&id_pesanan=<?=$pengecekan->rp_id?>&recipient=<?=$pengecekan->ud_email?>&status=<?=$pengecekan->rp_status?>"><i class="bi bi-file-earmark-check-fill" title="Pengecekan Selesai"></i></a></td>
                <?php
                }else{
                ?>
                <td align="center"><a href="<?=base_url()?>backoffice/update_status?id_pesanan=<?=$pengecekan->rp_id?>&status=<?=$pengecekan->rp_status?>"><i class="bi bi-file-earmark-check-fill" title="Pengecekan Selesai"></i></a></td>
                <?php
                }
                ?>
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
                <th>Ongkir</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>