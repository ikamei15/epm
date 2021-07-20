        <!-- Pricing section-->
        <section class="bg-white py-5">
            <div class="container px-5 my-5">
                <h1>Pembayaran</h1>
                <h6><i>Setelah melakukan transfer, mohon upload bukti transfer di form yang tersedia</i></h6>

                <br>
                <h4>Detail Pesanan</h4>
                <br>
                <?php foreach ($pembayaran as $pembayaran) {?>
                <dl class="row">
                  <dt class="col-sm-3">No. Pesanan</dt>
                  <dd class="col-sm-9"><a href="<?=base_url().'daftar_belanja/detail_daftar_belanja?id_pesanan='.$pembayaran->rp_id?>"><?=$pembayaran->rp_no_pesanan?></a></dd>

                  <dt class="col-sm-3">Jumlah Barang</dt>
                  <dd class="col-sm-9"><?=$pembayaran->rp_qty?></dd>

                  <dt class="col-sm-3">Total Harga</dt>
                  <dd class="col-sm-9">Rp<?=number_format($pembayaran->rp_total_harga,0,',','.')?></dd>

                  <dt class="col-sm-3">Ongkos Kirim</dt>
                  <dd class="col-sm-9">Rp<?=number_format($pembayaran->rp_ongkir,0,',','.')?></dd>
                  <hr>
                  <dt class="col-sm-3"><h3>Total Tagihan<h3></dt>
                  <dd class="col-sm-9"><strong><h3>Rp<?=number_format($pembayaran->rp_total_harga+$pembayaran->rp_ongkir,0,',','.')?></h3></strong></dd>
                </dl>

                <br>
                <h4>Upload Bukti Transfer</h4>
                <br>
                <div id='img_contain' class="shadow">
                  <img id="image-preview" align='middle'src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARgAAAC0CAMAAAB4+cOfAAAAPFBMVEXq6uqurq7X19fi4uKqqqrp6ene3t6vr6+0tLTHx8fl5eW3t7fd3d3t7e3U1NTZ2dm9vb3MzMzCwsKlpaXgX8HoAAAEWElEQVR4nO3a626rOhAFYOPBd3s8dt//Xc+YJLupdqV0/zilFetT2xAKCK8MJgaMAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA+F858nd09q78LFn2u+DO3pcfpLUs211w7VNn7+MJGo00459g0qeGP3s3vx/HsL0W+ez9/G41vk5lKVerGXs7gl4n08/e029md60G5vkxmlBE5EMt7fZiHbAGs9fn89KKZXRPRJXnxYPRJrenDCa5Zo5TtOvxPZiz9/SbrWC0zVT+5DLWdzxHlY7XcuGK2bY0nnLRmV67nLDFoQOEXK4czBPJ60xVEndOUaqezwOCWbi1HiblaqvzojG5dNk+5sN5eo0oi2OJMYqlogeWDagYPZKaBkHpnhJzbMYXBKPdcGtD+DEvcMiGBMHoOUmDeR9rbymQyYI+5lYxT0OBuDlUzKOP6c9jpNJMLagY7VX0a8zzCImN4Q0Vc3Qyz8OD5O5dDIKJ3jSS27fdmPKjYBDMJjpAcjxFJHVn2qPHuXofs5LxzTRHREZrxD56YlSMnomGud80oXTp6zF/i8l68ixP1ztRMfcclg8zrlYx/St3lZar3SUgeZ3JIpe73V/ntr8U5tXut5l13fsL8BAEAADA6dzXz8dr0ffF71P/sP7pcq3OuK89oJrZfrVljjnTeGyVxjFUyOMXjRhsidxIklnPZb7Pfp98ehgzD3YfF/t7mfsbxyPbzd4fFKlxrBfaUvt0/R+ocdyip6LB9MF07HPuvo/aXCfSv6xpOEuu9Zp7Ncbz6I06GerZ+WM0TTxGdWte7pT1jTWudteDdX2srWowXauF1g0pGr+ibhoH2WfVihmhxHCMdXyIEgORzhAjsYSSZeYc0iqsvhazq4kpchZZJTR0+WhXWfDW+6Yrs0lCGkyWIkFyLUFn9rVWj6WEcXazX9Ng+txmSXlPLUdZJVM3bj4m2lMl1jaOjUfwHOoKJkrOJTqZPkbRLNZGstPlkisxz5JdJi7FzCMY7W6rxOo1M4qphqFJZY3z5w/CNRi7nodKK41W4i2Y1YxJu84ZWylFtGUsxaxgdv3ERdooWjAl3UpMg5CQDIdRhvHrjdyDyTNKKX4Fo1WnwZAE/X/6FcFws2FLWX/8o2KG00YewfA2vLfezbLSWhVTuq/riIjTac1ks54IiVRjclmPstpm7L7cg+l9Hy7FFYyzIXnd8CyWqs1nt/slbTk3l/ZkUpASb33Mpp95yf5ttNVokWh1sT0bKlPPYkWXa1TerJlv6XgCL20yt+Sa9lZZa0xm0EOpkN3tOt70UKqxaF/l9eBsx/rz51eMyT6vP6TnEebb/tYtrUnnj3KoPLwzmfxxTUZ/me16WTP97ZPPlml9E1qbMa6z1+WInG7Aea5risjet+h0in/phZvVx5y9Dz9Sthe8QgkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAp/gPjOMyqC28HqMAAAAASUVORK5CYII=" alt="your image" title=''/>
                </div>
                <form action="<?=base_url()?>pembayaran/upload_bukti_transfer?pesanan=<?=$pembayaran->rp_id?>" method="post" enctype="multipart/form-data">
                    <input class="form-control" type="file" id="formFileMultiple" name="bukti_transfer" multiple />
                    <br>
                    <button class="btn btn-success" type="submit" name="submit">Upload</button>
                </form>
                <?php } ?>
                <br>
                <br>
                <br>
                <h4>Metode Pembayaran</h4>
                <br>
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <img class="img-pembayaran img-fluid" src="<?=base_url()?>assets/images/bca_logo.png">
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <dl>
                          <dt class="col-sm-3">No. Rekening</dt>
                          <dd class="col-sm-9"><h1>8330035413</h1></dd>

                          <dt class="col-sm-3">Atas Nama</dt>
                          <dd class="col-sm-9"><h3>Kasim</h3></dd>

                          <dt class="col-sm-3">Cara Melakukan Pembayaran</dt>
                          <dd class="col-sm-9"><ol>
                            <li>Pertama, jika kamu menggunakan mesin ATM, kamu tentunya perlu untuk memasukkan Kartu ATM BCA ke mesin ATM, pastikan kartunya tidak terbalik.</li>
                            <li>Masukkan PIN ATM, pastikan PIN yang kamu masukan benar. Setelah itu akan muncul menu transaksi. Di menu ini kamu dapat memilih ‘Menu Transaksi Lainnya’.</li>
                            <li>Kemudian pilih menu ‘transfer’ dan ‘Ke Rek BCA’.</li>
                            <li>Setelah itu kamu dapat memasukkan nomor rekening BCA yang dituju.</li>
                            <li>Kamu dapat melanjutkan dengan memasukan nominal yang akan ditransfer.</li>
                            <li>Setelahnya, akan muncul menu konfirmasi dan ketik YA atau OK jika informasi yang tertampil di layar adalah benar. Selanjutnya, struk akan keluar, dan transaksi selesai.</li>
                          </ol>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <img class="img-pembayaran img-fluid" src="<?=base_url()?>assets/images/Mandiri_logo.png">
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <dl>
                          <dt class="col-sm-3">No. Rekening</dt>
                          <dd class="col-sm-9"><h1>164-0000-1387366</h1></dd>

                          <dt class="col-sm-3">Atas Nama</dt>
                          <dd class="col-sm-9"><h3>Kasim</h3></dd>

                          <dt class="col-sm-3">Cara Melakukan Pembayaran</dt>
                          <dd class="col-sm-9"><ol>
                            <li>Masukkan kartu debit Mandiri ke mesin ATM, tekan PIN Anda. Jangan sampai Anda salah memasukkan PIN ya. Jika sampai salah tiga kali berturut-turut, kartu debit Anda akan diblokir dan tidak dapat digunakan lagi sampai Anda mengurusnya ke bank.</li>
                            <li>Setelah muncul laman menu utama, pilih menu “Transaksi Lainnya”.</li>
                            <li>Klik pilihan “Transfer”, setelah itu klik pilihan “Antar Bank Online”.</li>
                            <li>Jika Anda belum tahu tiga angka kode bank tujuan, pilih “Daftar Kode Bank”. Di sana tertera daftar nama bank beserta kodenya. Ingat-ingat kode tiga angka dari bank tujuan Anda. Misalnya, kalau Anda akan mentransfer ke Bank BCA, di sana tertulis 014. Angka tersebut adalah kode Bank BCA yang akan Anda tuju untuk mentransfer uang.</li>
                            <li>Klik “Kembali”, lalu masukkan tiga angka kode bank tujuan diikuti dengan nomor rekening penerima. Pilih “Benar”.</li>
                            <li>Masukkan jumlah uang yang ingin kamu transfer, lalu pilih “Benar”.</li>
                            <li>Selanjutnya akan tampak data-data tentang transfer Anda seperti nomor rekening tujuan, nama penerima, dan jumlah transfer. Jika semua data sudah benar, pilih “YA”.</li>
                            <li>Jika transfer berhasil, di layar akan tertulis transfer berhasil. Bukti transfer akan keluar dari mesin ATM.</li>
                          </ol>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
