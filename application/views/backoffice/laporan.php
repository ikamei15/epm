    <body class="bg-light">
<!-- Page content-->
<div class="cont-dashboard container-fluid">
    <h1 class="mt-4">Laporan Penjualan</h1>
    <br>
    <div class="row">
        <div class="col-lg-6 col-12 box-dashboard">
            <div class="col-12 box-dashboard-inside">
                <h4>Penjualan</h4>
                <button type="button" class="btn btn-primary btn-print" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-printer"></i></button>

                <!-- Modal -->
                 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Print Data Penjualan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <form action="<?=base_url()?>backoffice/print_laporan" method="get">
                    <input type="hidden" name="laporan" value="penjualan">
                      <div class="modal-body">
                        <dl>   
                          <dt class="col-sm-6"><label for="radio-tahun">
                                    <input type="radio" name="radio-print" value="radio-tahun" /> Tahun
                                </label></dt>
                          <dd class="col-sm-12">
                            <select class="radio-tahun form-control" name="tahun" disabled="true">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                          </dd>

                          <dt class="col-sm-6"> <label for="radio-bulan">
                                    <input type="radio" name="radio-print" value="radio-bulan" /> Bulan
                                </label></dt>
                          <dd class="col-sm-12">
                            <div class="row">
                                <div class="col-6">
                                    <select class="radio-bulan form-control" name="bulan" disabled="true">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="radio-bulan form-control" name="tahun" disabled="true">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </div>
                          </dd>

                          <dt class="col-sm-6"> <label for="radio-periode">
                                    <input type="radio" name="radio-print" value="radio-periode" /> Periode
                                </label></dt>
                          <dd class="col-sm-12">
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" name="min_date" class="radio-periode form-control col-6" disabled="true" />
                                </div>
                                
                                <div class="col-6">
                                    <input type="date" name="max_date" class="radio-periode form-control col-6" disabled="true" />
                                </div>
                            </div>
                          </dd>
                          <br>
                        </dl>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Print</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

                <br>
                <table id="tabledata" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Pembeli</th>
                            <th>No. Pesanan</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Tgl Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($penjualan as $penjualan){
                        ?>
                        <tr>
                            <td><?=$penjualan->pembeli?></td>
                            <td><p class="judul-item"><?=$penjualan->rp_no_pesanan?></p></td>
                            <td><?=number_format($penjualan->total_harga,0,',','.')?></td>
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
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Pembeli</th>
                            <th>No. Pesanan</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Tgl Pembelian</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-lg-6 col-12 box-dashboard">
            <div class="col-12 box-dashboard-inside">
                <h4>Barang Terlaris</h4>
                <br>
                <button type="button" class="btn btn-primary btn-print" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"><i class="bi bi-printer"></i></button>

                <!-- Modal -->
                 <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Print Data Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <form action="<?=base_url()?>backoffice/print_laporan" method="get">
                    <input type="hidden" name="laporan" value="barang">
                      <div class="modal-body">
                        <dl>   
                          <dt class="col-sm-6"><label for="radio-tahun2">
                                    <input type="radio" name="radio-print" value="radio-tahun2" /> Tahun
                                </label></dt>
                          <dd class="col-sm-12">
                            <select class="radio-tahun2 form-control" name="tahun" disabled="true">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                          </dd>

                          <dt class="col-sm-6"> <label for="radio-bulan2">
                                    <input type="radio" name="radio-print" value="radio-bulan2" /> Bulan
                                </label></dt>
                          <dd class="col-sm-12">
                            <div class="row">
                                <div class="col-6">
                                    <select class="radio-bulan2 form-control" name="bulan" disabled="true">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="radio-bulan2 form-control" name="tahun" disabled="true">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </div>
                          </dd>

                          <dt class="col-sm-6"> <label for="radio-periode2">
                                    <input type="radio" name="radio-print" value="radio-periode2" /> Periode
                                </label></dt>
                          <dd class="col-sm-12">
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" name="min_date" class="radio-periode2 form-control col-6" disabled="true" />
                                </div>
                                
                                <div class="col-6">
                                    <input type="date" name="max_date" class="radio-periode2 form-control col-6" disabled="true" />
                                </div>
                            </div>
                          </dd>
                          <br>
                        </dl>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Print</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                <table id="tabledata2" class="table" style="width:100%">
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
                    <tfoot>
                        <tr>
                            <th>Barang</th>
                            <th>Terjual</th>
                            <th>Pembelian Terakhir</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-12 box-dashboard">
            <div class="col-12 box-dashboard-inside">
                <h4>Pembeli Terbanyak</h4>
                <br>
                <button type="button" class="btn btn-primary btn-print" data-bs-toggle="modal" data-bs-target="#staticBackdrop3"><i class="bi bi-printer"></i></button>

                <!-- Modal -->
                 <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Print Data Pembeli</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <form action="<?=base_url()?>backoffice/print_laporan" method="get">
                    <input type="hidden" name="laporan" value="pembeli">
                      <div class="modal-body">
                        <dl>   
                          <dt class="col-sm-6"><label for="radio-tahun3">
                                    <input type="radio" name="radio-print" value="radio-tahun3" /> Tahun
                                </label></dt>
                          <dd class="col-sm-12">
                            <select class="radio-tahun3 form-control" name="tahun" disabled="true">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                          </dd>

                          <dt class="col-sm-6"> <label for="radio-bulan3">
                                    <input type="radio" name="radio-print" value="radio-bulan3" /> Bulan
                                </label></dt>
                          <dd class="col-sm-12">
                            <div class="row">
                                <div class="col-6">
                                    <select class="radio-bulan3 form-control" name="bulan" disabled="true">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="radio-bulan3 form-control" name="tahun" disabled="true">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </div>
                          </dd>

                          <dt class="col-sm-6"> <label for="radio-periode3">
                                    <input type="radio" name="radio-print" value="radio-periode3" /> Periode
                                </label></dt>
                          <dd class="col-sm-12">
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" name="min_date" class="radio-periode3 form-control col-6" disabled="true" />
                                </div>
                                
                                <div class="col-6">
                                    <input type="date" name="max_date" class="radio-periode3 form-control col-6" disabled="true" />
                                </div>
                            </div>
                          </dd>
                          <br>
                        </dl>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Print</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                <table id="tabledata3" class="table" style="width:100%">
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
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Jml Transaksi</th>
                            <th>Total Pembelian</th>
                            <th>Total Barang</th>
                            <th>Tgl Pembelian terakhir</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-lg-6 col-12 box-dashboard">
            <div class="col-12 box-dashboard-inside">
                <h4>Pesan Pembeli</h4>
                <br>
                <button type="button" class="btn btn-primary btn-print" data-bs-toggle="modal" data-bs-target="#staticBackdrop4"><i class="bi bi-printer"></i></button>

                <!-- Modal -->
                 <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Print Data Pesan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <form action="<?=base_url()?>backoffice/print_laporan" method="get">
                    <input type="hidden" name="laporan" value="pesan">
                      <div class="modal-body">
                        <dl>   
                          <dt class="col-sm-6"><label for="radio-tahun4">
                                    <input type="radio" name="radio-print" value="radio-tahun4" /> Tahun
                                </label></dt>
                          <dd class="col-sm-12">
                            <select class="radio-tahun4 form-control" name="tahun" disabled="true">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                          </dd>

                          <dt class="col-sm-6"> <label for="radio-bulan4">
                                    <input type="radio" name="radio-print" value="radio-bulan4" /> Bulan
                                </label></dt>
                          <dd class="col-sm-12">
                            <div class="row">
                                <div class="col-6">
                                    <select class="radio-bulan4 form-control" name="bulan" disabled="true">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="radio-bulan4 form-control" name="tahun" disabled="true">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </div>
                          </dd>

                          <dt class="col-sm-6"> <label for="radio-periode4">
                                    <input type="radio" name="radio-print" value="radio-periode4" /> Periode
                                </label></dt>
                          <dd class="col-sm-12">
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" name="min_date" class="radio-periode4 form-control col-6" disabled="true" />
                                </div>
                                
                                <div class="col-6">
                                    <input type="date" name="max_date" class="radio-periode4 form-control col-6" disabled="true" />
                                </div>
                            </div>
                          </dd>
                          <br>
                        </dl>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Print</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                <table id="tabledata4" class="table" style="width:100%">
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
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Tgl Pesan</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("menu-laporan").className = "list-group-item list-group-item-action p-3 menu-active";
</script>
</body>