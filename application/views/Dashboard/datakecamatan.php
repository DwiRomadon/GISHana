<?php
    $datanya = '';
    $kodeKecamatan = '';
    $namaKec = '';
    $idKecamatan = '';
    $url = '';
    if($edit == true){
        $title = "Edit";
        $kodeKecamatan = $datakecamatan->kd_kec;
        $namaKec = $datakecamatan->nama_kec;
        $idKecamatan = $datakecamatan->id_kec;
        $url = base_url('kecamatan/editKecamatan');
    }else{
        $title = "Input";
        $url = base_url('kecamatan/inputKecamatan');
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title?> Data Kecamatan
            <small>Data Kecamatan</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $title?> Data Kecamatan</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo $url ?>" method="post">
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
                        <div class="box-body">
                            <div class="form-group" hidden>
                                <input type="text" value="<?php echo $idKecamatan?>"
                                       name="idkecamatan" class="form-control" id="exampleInputEmail1"
                                       placeholder="Kode Kecamatan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Kecamatan</label>
                                <input type="text" value="<?php echo $kodeKecamatan?>" name="kode" class="form-control" id="exampleInputEmail1"
                                       placeholder="Kode Kecamatan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kecamatan</label>
                                <input type="text" value="<?php echo $namaKec?>" name="nama" class="form-control" id="exampleInputPassword1"
                                       placeholder="Nama Kecamatan">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
