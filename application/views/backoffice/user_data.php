<!-- Page content-->
<div class="container-fluid">
    <h1 class="mt-4">User Data</h1>
    <br>
    <table id="tabledata" class="table" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Last Login</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($user_data as $user_data){
            ?>
            <tr>
                <td><?=$user_data->ud_nama?></td>
                <td><?=$user_data->ud_email?></td>
                <td><p class="judul-item"><?=$user_data->ud_alamat?></p></td>
                <td><?=$user_data->ud_notelp?></td>
                <td><?=$user_data->ud_last_login?></td>
                <td></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Last Login</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>

<script type="text/javascript">
    document.getElementById("menu-userdata").className = "list-group-item list-group-item-action p-3 menu-active";
</script>