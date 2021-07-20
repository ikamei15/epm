<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">Testimoni Pembeli</h1>
    <br>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Testimoni</button>

    <!-- Modal -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Testimoni</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <form action="<?=base_url()?>backoffice/testimoni/tambah" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <dl>
              <dt class="col-sm-6">Nama</dt>
              <dd class="col-sm-12"><input type="text" name="nama" class="form-control"></dd>
              <dt class="col-sm-6">Testimoni</dt>
              <dd class="col-sm-12"><textarea class="form-control" name="testimoni"></textarea></dd>
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
                <th>Nama</th>
                <th>Testimoni</th>
                <th>Dibuat</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($testimoni as $testimoni){
            ?>
            <tr>
                <td><?=$testimoni->tp_nama?></td>
                <td><?=$testimoni->tp_testimoni?></td>
                <td>
                    <button type="button" class="btn btn-primary" title="Edit Testimoni" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$testimoni->tp_id?>"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="staticBackdrop<?=$testimoni->tp_id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update Testimoni</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                        <form action="<?=base_url()?>backoffice/testimoni/edit" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <dl>
                              <dt class="col-sm-6">Nama</dt>
                              <dd class="col-sm-12"><input type="text" name="nama" class="form-control" value="<?=$testimoni->tp_nama?>"></dd>

                              <dt class="col-sm-6">Testimoni</dt>
                              <dd class="col-sm-12"><textarea class="form-control" name="testimoni"><?=$testimoni->tp_testimoni?></textarea></dd>
                            </dl>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-success" name="submit" type="submit">Simpan</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-danger" title="Hapus Testimoni" onclick="window.location.href='<?=base_url()?>backoffice/testimoni/hapus/<?=$testimoni->tp_id?>'"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>Testimoni</th>
                <th>Dibuat</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>

<script type="text/javascript">
    document.getElementById("menu-testimoni").className = "list-group-item list-group-item-action p-3 menu-active";
</script>