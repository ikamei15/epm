<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">Kategori Barang</h1>
    <br>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Kategori</button>

    <!-- Modal -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <form action="<?=base_url()?>backoffice/kategori/tambah" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <dl>
              <dt class="col-sm-6">Kategori</dt>
              <dd class="col-sm-12"><input type="text" name="kategori" class="form-control"></dd>
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
                <th>Kategori</th>
                <th>Dibuat</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($kategori as $kategori){
            ?>
            <tr>
                <td><?=$kategori->kb_nama_kategori?></td>
                <td><?=$kategori->kb_created_date?></td>
                <td>
                    <button type="button" class="btn btn-primary" title="Edit Kategori" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$kategori->kb_id?>"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="staticBackdrop<?=$kategori->kb_nama_kategori?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                        <form action="<?=base_url()?>backoffice/kategori/edit" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <dl>
                              <dt class="col-sm-6">Nama Kategori</dt>
                              <dd class="col-sm-12"><input type="text" name="kategori" class="form-control" value="<?=$kategori->kb_nama_kategori?>"></dd>
                            </dl>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-success" name="submit" type="submit">Simpan</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-danger" title="Hapus Kategori" onclick="window.location.href='<?=base_url()?>backoffice/kategori/hapus/<?=$kategori->kb_id?>'"><i class="bi bi-trash"></i></button>
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
    document.getElementById("menu-kategori").className = "list-group-item list-group-item-action p-3 menu-active";
</script>