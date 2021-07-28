    <body class="bg-light">
<!-- Page content-->
<div class="cont-dashboard container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
        <?php
        foreach($summary as $summary){
        ?>
        <div class="col-lg-3 col-12 box-dashboard-resume">
            <div class="box-inside-resume">
                <div class="row">
                    <div class="col-4">
                        <img class="img-fluid img-box-resume" src="<?=base_url()?>assets/images/user.png">
                    </div>
                    <div class="col-8">
                        <p>User</p>
                        <h1><?=$summary->user_cnt?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 box-dashboard-resume">
            <div class="box-inside-resume">
                <div class="row">
                    <div class="col-4">
                        <img class="img-fluid img-box-resume" src="<?=base_url()?>assets/images/storage.png">
                    </div>
                    <div class="col-8">
                        <p>Stok Barang</p>
                        <h1><?=$summary->stok?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 box-dashboard-resume">
            <div class="box-inside-resume">
                <div class="row">
                    <div class="col-4">
                        <img class="img-fluid img-box-resume" src="<?=base_url()?>assets/images/trade.png">
                    </div>
                    <div class="col-8">
                        <p>Penjualan</p>
                        <h1><?=number_format($summary->penjualan,0,',','.')?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 box-dashboard-resume">
            <div class="box-inside-resume">
                <div class="row">
                    <div class="col-4">
                        <img class="img-fluid img-box-resume" src="<?=base_url()?>assets/images/shopping-cart.png">
                    </div>
                    <div class="col-8">
                        <p>Barang Terjual</p>
                        <h1><?=$summary->barang_terjual?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col-lg-9 col-12 box-dashboard">
            <div class="col-12 box-dashboard-inside">
                <h4>Penjualan</h4>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
                <canvas id="myChart" class="canvas-cart"></canvas>
                <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [<?php foreach($penjualan as $bulan){echo '"'.$bulan->bulan.'",';}?>],
                        datasets: [{
                            label: 'Penjualan (Rp)',
                            data: [<?php foreach($penjualan as $penjualan){echo '"'.$penjualan->amount.'",';}?>],
                            backgroundColor: [
                                <?php foreach($penjualan as $warna){echo "'rgba(54, 162, 235, 0.2)',";}?>
                            ],
                            borderColor: [
                                <?php foreach($penjualan as $border){echo "'rgba(54, 162, 235, 0.2)',";}?>
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                </script>
            </div>
        </div>
        <div class="col-lg-3 col-12 box-dashboard">
            <div class="col-12 box-dashboard-inside">
                <h4>Kategori</h4>
                <canvas id="myChart2" width="400" height="400"></canvas>
                <script>
                var ctx = document.getElementById('myChart2').getContext('2d');
                var myChart2 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [<?php foreach($kategori as $namakt){echo '"'.$namakt->kb_nama_kategori.'",';}?>],
                      datasets: [{
                        label: 'My First Dataset',
                        data: [<?php foreach($kategori as $terjual){echo '"'.$terjual->penjualan.'",';}?>],
                        backgroundColor: [
                          'rgb(234, 234, 87)',
                          'rgb(87, 234, 160)',
                          'rgb(87, 160, 234)',
                          'rgb(160, 87, 234)',
                          'rgb(234, 87, 160)',
                          'rgb(234, 160, 87)',
                          'rgb(160, 234, 87)',
                          'rgb(12, 58, 104)',
                          'rgb(87, 160, 234)',
                          'rgb(58, 104, 12)'
                        ],
                        hoverOffset: 4
                      }]
                    },
                    options: {
                    }
                });
                </script>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("menu-dashboard").className = "list-group-item list-group-item-action p-3 menu-active";
</script>
</body>