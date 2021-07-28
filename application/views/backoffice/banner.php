<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">Banner</h1>
    <br>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Banner</button>

    <!-- Modal -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Banner</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <form action="<?=base_url()?>backoffice/banner/tambah" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <dl>
              <dt class="col-sm-6">banner</dt>
              <dd class="col-sm-12">
                <div id='img_contain'>
                  <img id="image-preview" align='middle'src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARgAAAC0CAMAAAB4+cOfAAAAPFBMVEXq6uqurq7X19fi4uKqqqrp6ene3t6vr6+0tLTHx8fl5eW3t7fd3d3t7e3U1NTZ2dm9vb3MzMzCwsKlpaXgX8HoAAAEWElEQVR4nO3a626rOhAFYOPBd3s8dt//Xc+YJLupdqV0/zilFetT2xAKCK8MJgaMAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA+F858nd09q78LFn2u+DO3pcfpLUs211w7VNn7+MJGo00459g0qeGP3s3vx/HsL0W+ez9/G41vk5lKVerGXs7gl4n08/e029md60G5vkxmlBE5EMt7fZiHbAGs9fn89KKZXRPRJXnxYPRJrenDCa5Zo5TtOvxPZiz9/SbrWC0zVT+5DLWdzxHlY7XcuGK2bY0nnLRmV67nLDFoQOEXK4czBPJ60xVEndOUaqezwOCWbi1HiblaqvzojG5dNk+5sN5eo0oi2OJMYqlogeWDagYPZKaBkHpnhJzbMYXBKPdcGtD+DEvcMiGBMHoOUmDeR9rbymQyYI+5lYxT0OBuDlUzKOP6c9jpNJMLagY7VX0a8zzCImN4Q0Vc3Qyz8OD5O5dDIKJ3jSS27fdmPKjYBDMJjpAcjxFJHVn2qPHuXofs5LxzTRHREZrxD56YlSMnomGud80oXTp6zF/i8l68ixP1ztRMfcclg8zrlYx/St3lZar3SUgeZ3JIpe73V/ntr8U5tXut5l13fsL8BAEAADA6dzXz8dr0ffF71P/sP7pcq3OuK89oJrZfrVljjnTeGyVxjFUyOMXjRhsidxIklnPZb7Pfp98ehgzD3YfF/t7mfsbxyPbzd4fFKlxrBfaUvt0/R+ocdyip6LB9MF07HPuvo/aXCfSv6xpOEuu9Zp7Ncbz6I06GerZ+WM0TTxGdWte7pT1jTWudteDdX2srWowXauF1g0pGr+ibhoH2WfVihmhxHCMdXyIEgORzhAjsYSSZeYc0iqsvhazq4kpchZZJTR0+WhXWfDW+6Yrs0lCGkyWIkFyLUFn9rVWj6WEcXazX9Ng+txmSXlPLUdZJVM3bj4m2lMl1jaOjUfwHOoKJkrOJTqZPkbRLNZGstPlkisxz5JdJi7FzCMY7W6rxOo1M4qphqFJZY3z5w/CNRi7nodKK41W4i2Y1YxJu84ZWylFtGUsxaxgdv3ERdooWjAl3UpMg5CQDIdRhvHrjdyDyTNKKX4Fo1WnwZAE/X/6FcFws2FLWX/8o2KG00YewfA2vLfezbLSWhVTuq/riIjTac1ks54IiVRjclmPstpm7L7cg+l9Hy7FFYyzIXnd8CyWqs1nt/slbTk3l/ZkUpASb33Mpp95yf5ttNVokWh1sT0bKlPPYkWXa1TerJlv6XgCL20yt+Sa9lZZa0xm0EOpkN3tOt70UKqxaF/l9eBsx/rz51eMyT6vP6TnEebb/tYtrUnnj3KoPLwzmfxxTUZ/me16WTP97ZPPlml9E1qbMa6z1+WInG7Aea5risjet+h0in/phZvVx5y9Dz9Sthe8QgkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAp/gPjOMyqC28HqMAAAAASUVORK5CYII=" alt="your image" title=''/>
                </div>
                    <input class="form-control" type="file" id="formFileMultiple" name="gambar_banner" multiple />
              </dd>
            </dl>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit" name="submit">Simpan</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <table id="tabledata" class="table" style="width:100%">
        <thead>
            <tr>
                <th class="col-4">Banner</th>
                <th>Dibuat</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($banner as $banner){
            ?>
            <tr>
                <td><img class="img-fluid" src="<?=base_url().'assets/images/banner/'.$banner->sb_gambar?>"></td>
                <td><?=$banner->sb_created_date?></td>
                <td>
                    <button type="button" class="btn btn-primary" title="Edit Banner" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$banner->sb_id?>"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="staticBackdrop<?=$banner->sb_id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Banner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                        <form action="<?=base_url()?>backoffice/banner/edit/<?=$banner->sb_id?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <dl>
                              <dt class="col-sm-6">Nama Kategori</dt>
                              <dd class="col-sm-12">
                              <div id='img_contain'>
                                <img id="img-preview" align='middle'src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARgAAAC0CAMAAAB4+cOfAAAAPFBMVEXq6uqurq7X19fi4uKqqqrp6ene3t6vr6+0tLTHx8fl5eW3t7fd3d3t7e3U1NTZ2dm9vb3MzMzCwsKlpaXgX8HoAAAEWElEQVR4nO3a626rOhAFYOPBd3s8dt//Xc+YJLupdqV0/zilFetT2xAKCK8MJgaMAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA+F858nd09q78LFn2u+DO3pcfpLUs211w7VNn7+MJGo00459g0qeGP3s3vx/HsL0W+ez9/G41vk5lKVerGXs7gl4n08/e029md60G5vkxmlBE5EMt7fZiHbAGs9fn89KKZXRPRJXnxYPRJrenDCa5Zo5TtOvxPZiz9/SbrWC0zVT+5DLWdzxHlY7XcuGK2bY0nnLRmV67nLDFoQOEXK4czBPJ60xVEndOUaqezwOCWbi1HiblaqvzojG5dNk+5sN5eo0oi2OJMYqlogeWDagYPZKaBkHpnhJzbMYXBKPdcGtD+DEvcMiGBMHoOUmDeR9rbymQyYI+5lYxT0OBuDlUzKOP6c9jpNJMLagY7VX0a8zzCImN4Q0Vc3Qyz8OD5O5dDIKJ3jSS27fdmPKjYBDMJjpAcjxFJHVn2qPHuXofs5LxzTRHREZrxD56YlSMnomGud80oXTp6zF/i8l68ixP1ztRMfcclg8zrlYx/St3lZar3SUgeZ3JIpe73V/ntr8U5tXut5l13fsL8BAEAADA6dzXz8dr0ffF71P/sP7pcq3OuK89oJrZfrVljjnTeGyVxjFUyOMXjRhsidxIklnPZb7Pfp98ehgzD3YfF/t7mfsbxyPbzd4fFKlxrBfaUvt0/R+ocdyip6LB9MF07HPuvo/aXCfSv6xpOEuu9Zp7Ncbz6I06GerZ+WM0TTxGdWte7pT1jTWudteDdX2srWowXauF1g0pGr+ibhoH2WfVihmhxHCMdXyIEgORzhAjsYSSZeYc0iqsvhazq4kpchZZJTR0+WhXWfDW+6Yrs0lCGkyWIkFyLUFn9rVWj6WEcXazX9Ng+txmSXlPLUdZJVM3bj4m2lMl1jaOjUfwHOoKJkrOJTqZPkbRLNZGstPlkisxz5JdJi7FzCMY7W6rxOo1M4qphqFJZY3z5w/CNRi7nodKK41W4i2Y1YxJu84ZWylFtGUsxaxgdv3ERdooWjAl3UpMg5CQDIdRhvHrjdyDyTNKKX4Fo1WnwZAE/X/6FcFws2FLWX/8o2KG00YewfA2vLfezbLSWhVTuq/riIjTac1ks54IiVRjclmPstpm7L7cg+l9Hy7FFYyzIXnd8CyWqs1nt/slbTk3l/ZkUpASb33Mpp95yf5ttNVokWh1sT0bKlPPYkWXa1TerJlv6XgCL20yt+Sa9lZZa0xm0EOpkN3tOt70UKqxaF/l9eBsx/rz51eMyT6vP6TnEebb/tYtrUnnj3KoPLwzmfxxTUZ/me16WTP97ZPPlml9E1qbMa6z1+WInG7Aea5risjet+h0in/phZvVx5y9Dz9Sthe8QgkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAp/gPjOMyqC28HqMAAAAASUVORK5CYII=" alt="your image" title=''/>
                              </div>
                                  <input class="form-control" type="file" id="formFileMultiple2" name="gambar_banner" multiple />
                              </dd>
                            </dl>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-success" name="submit" type="submit">Simpan</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-danger" title="Hapus Banner" onclick="window.location.href='<?=base_url()?>backoffice/banner/hapus/<?=$banner->sb_id?>'"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Kategori</th>
                <th>Dibuat</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>

<script type="text/javascript">
    document.getElementById("menu-banner").className = "list-group-item list-group-item-action p-3 menu-active";
</script>