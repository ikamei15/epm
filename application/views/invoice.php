  <?php
        foreach ($ringkasan_belanja as $ringkasan_belanja){
        ?>      
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <style type="text/css">
        header {
                  padding: 10px 0;
                  margin-bottom: 30px;
                }

                #logo {
                  text-align: center;
                  margin-bottom: 10px;
                }

                #logo img {
                  width: 90px;
                }

                h1 {
                  border-top: 1px solid  #5D6975;
                  border-bottom: 1px solid  #5D6975;
                  color: #5D6975;
                  font-size: 2.4em;
                  line-height: 1.4em;
                  font-weight: normal;
                  text-align: center;
                  margin: 0 0 20px 0;
                  background: url(dimension.png);
                }

                #project {
                  float: left;
                }

                #project span {
                  color: #5D6975;
                  text-align: right;
                  width: 80px;
                  margin-right: 10px;
                  display: inline-block;
                  font-size: 0.8em;
                }

                #company {
                  float: right;
                  text-align: right;
                }

                #project div,
                #company div {
                  white-space: nowrap;        
                }

                table {
                  width: 100%;
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin-bottom: 20px;
                }

                table tr:nth-child(2n-1) td {
                  background: #F5F5F5;
                }

                table th,
                table td {
                  text-align: center;
                }

                table th {
                  padding: 5px 20px;
                  color: #5D6975;
                  border-bottom: 1px solid #C1CED9;
                  white-space: nowrap;        
                  font-weight: normal;
                }

                table .service,
                table .desc {
                  text-align: left;
                }

                table td {
                  padding: 20px;
                  text-align: right;
                }

                table td.service,
                table td.desc {
                  vertical-align: top;
                }

                table td.unit,
                table td.qty,
                table td.total {
                  font-size: 1.2em;
                }

                table td.grand {
                  border-top: 1px solid #5D6975;;
                }

                #notices .notice {
                  color: #5D6975;
                  font-size: 1.2em;
                }
    </style>

  </head>
  <body class="container">
    <header class="clearfix">
      <div id="logo">
        <img src="<?=base_url()?>assets/images/logo.png">
      </div>
      <h1><?=$ringkasan_belanja->rp_no_pesanan?></h1>
      <!-- <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div> -->
      <div id="project">
        <div><span>PENERIMA</span> <?=$ringkasan_belanja->rp_penerima?></div>
        <div><span>ALAMAT</span> <?=$ringkasan_belanja->rp_alamat?></div>
        <div><span>NOTELP</span> <?=$ringkasan_belanja->rp_notelp?></div>
        <div><span>KODEPOS</span> <?=$ringkasan_belanja->rp_kodepos?></div>
        <div><span>TANGGAL</span> <?=$ringkasan_belanja->tgl_pesanan?></div>
        <div><span>STATUS</span> <?php
                    if($ringkasan_belanja->rp_status==1){
                    ?>
                    Dalam Pemeriksaan
                    <?php
                    }else if($ringkasan_belanja->rp_status==2){
                    ?>
                    Menunggu Pembayaran
                    <?php
                    }else if($ringkasan_belanja->rp_status==3){
                    ?>
                    Dalam Proses
                    <?php
                    }else if($ringkasan_belanja->rp_status==4){
                    ?>
                    Dikirim
                    <?php
                    }else if($ringkasan_belanja->rp_status==5){
                    ?>
                    Selesai
                    <?php
                    }
                    ?></div>
        <?php
        if($ringkasan_belanja->rp_status==4){
        ?>
        <div><span>NORESI</span> <?=$ringkasan_belanja->rp_noresi?></div>
        <?php
        }
        ?>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service"></th>
            <th class="desc">&nbsp;</th>
            <th>HARGA</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
            <?php
            foreach ($belanjaan as $belanjaan){
            ?>
          <tr>
            <td class="service"><?=$belanjaan->bd_nama_barang?></td>
            <td class="desc">&nbsp;</td>
            <td class="unit">Rp<?=number_format($belanjaan->harga_barang,0,',','.')?></td>
            <td class="qty"><?=$belanjaan->dp_qty?></td>
            <td class="total">Rp<?=number_format($belanjaan->dp_total_harga,0,',','.')?></td>
          </tr>
            <?php
            }
            ?>
           <tr>
            <td class="service">Ongkos Kirim</td>
            <td class="desc">&nbsp;</td>
            <td class="unit"></td>
            <td class="qty"></td>
            <td class="total">Rp<?=number_format($ringkasan_belanja->rp_ongkir,0,',','.')?></td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">Rp<?=number_format($ringkasan_belanja->rp_total_harga+$ringkasan_belanja->rp_ongkir,0,',','.')?></td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>PRINT DATE:</div>
        <div class="notice"><?php echo date('Y-m-d')?> ID <?=$ringkasan_belanja->rp_id?></div>
      </div>
    </main>
    <!-- <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer> -->
  </body>
        <?php
        }
        ?>