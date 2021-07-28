<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">Hubungi Kami</h1>
    <br>
    <br>
    <table id="tabledata" class="table" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>&nbsp;</th>
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
                <td>
                    <button type="button" class="btn btn-danger" title="Hapus Testimoni" onclick="window.location.href='<?=base_url()?>backoffice/hubungi_kami/hapus/<?=$hubungi_kami->hk_id?>'"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>

<script type="text/javascript">
    document.getElementById("menu-hubungi_kami").className = "list-group-item list-group-item-action p-3 menu-active";
</script>