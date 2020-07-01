<!-- select -->
<!-- Content Wrapper. Contains page content -->
<style>
    .table_wrapper{
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data User
            <small>Lihat Data User</small>
        </h1>
    </section>

    <div class="box center-block">
        <div class="box-body">
            <div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    foreach ($datauser as $data): ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $data->username?></td>
                            <td><?php echo $data->nama?></td>
                            <td><?php echo $data->email?></td>
                            <td><?php echo $data->level?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
</div>
</section>


<!-----Modal Tambah Jadwal------>
<?php //include 'modaljadwal/inputjadwal.php';?>
