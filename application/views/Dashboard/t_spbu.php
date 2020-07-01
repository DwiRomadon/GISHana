<!-- select -->
<!-- Content Wrapper. Contains page content -->
<style>
    .table_wrapper {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data SPBU
            <small>Lihat Data SPBU</small>
        </h1>
    </section>

    <div class="box center-block">
        <div class="box-body">
            <table >
                <tbody>
                <tr>
                    <td width="15%">
                        <a href="<?php echo base_url('spbu/viewInputSpbu')?>">
                            <button class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button>
                        </a>
                    </td>
                </tr>
                <tr><td height="10px"></td></tr>
                </tbody>
            </table>
            <?php if (isset($_SESSION['message']['msg'])): ?>
                <div id="message">
                    <!-- message -->
                    <div class="alert <?php echo $_SESSION['message']['color'] ?>">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            &times;
                        </button>
                        <h4><i class="icon fa fa-check"></i> <?php echo $_SESSION['message']['title'] ?>!
                        </h4>
                        <?php echo $_SESSION['message']['msg'] ?>
                    </div>
                    <!-- message end -->
                </div>
            <?php endif; ?>
            <div>
                <table id="example1" class="table table-bordered">
                    <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Nama Spbu</th>
                        <th>Alamat</th>
                        <th>Kecamatan</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    <?php
                    $no = 1;
                    foreach ($dataspbu as $data):?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->nama ?></td>
                            <td><?php echo $data->alamat ?></td>
                            <td><?php echo $data->nama_kec ?></td>
                            <td><?php echo $data->deskripsi ?></td>
                            <td>
                                <img id='img-upload' style="width: 100px" src="<?php echo base_url('gambar_spbu/').$data->gambar?>"/>
                            </td>
                            <td><?php echo $data->lati ?></td>
                            <td><?php echo $data->longi ?></td>
                            <td>
                                <a href="<?php echo base_url('kecamatan/viewEditKecamatan/') . $data->id; ?>">
                                    <button class="btn btn-success btn-sm ">
                                        <i class="fa fa-edit"></i>
                                        Ubah
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modal-default<?php echo $data->id; ?>">
                                    <i class="fa fa-remove"></i>
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <!-----Modal Hapus------>
                        <div class="modal fade" id="modal-default<?php echo $data->id; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Yakin Ingin Menghapus Data Ini
                                            ? <?php echo $data->nama ?></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <img src="<?php echo base_url('assets/adminlte/dist/img/trash.png') ?>"
                                             style="width: 100px; height: 100px"
                                             class="user-image" alt="User Image">
                                    </div>
                                    <form action="<?php echo base_url('kecamatan/hapusKecamatan') ?>" method="post">
                                        <input hidden name="idkecamatan" value="<?php echo $data->id; ?>">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left"
                                                    data-dismiss="modal">
                                                Batal
                                            </button>
                                            <button type="submit" class="btn btn-danger">Hapus Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
</div>
</section>

