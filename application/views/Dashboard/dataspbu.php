<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php
$idSpbu = '';
$namaSpbu = '';
$alamat = '';
$kecamatan = '';
$deskripsi = '';
$gambarSpbu = '';
$lati = '';
$longi = '';
$kode_kec ='';
$kecamatan ='';
$url = '';
if ($edit == true) {
    $title = "Edit";
    $idSpbu = $datanya->id;
    $namaSpbu = $datanya->nama;
    $alamat = $datanya->alamat;
    $kecamatan = $datanya->nama_kec;
    $kode_kec = $datanya->kd_kec;
    $deskripsi = $datanya->deskripsi;
    $gambarSpbu = $datanya->gambar;
    $lati = $datanya->lati;
    $longi = $datanya->longi;
    $url = form_open_multipart('spbu/do_upload_edit');
} else {
    $title = "Input";
    $url = form_open_multipart('spbu/do_upload');
}
?>
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload {
        width: 250px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title ?> Data Studio Photo
            <small>Data Studio Photo</small>
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
                        <h3 class="box-title"><?php echo $title ?> Data Studio Photo</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo $url; ?>
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
                            <input type="text" value="<?php echo $idSpbu ?>"
                                   name="id" class="form-control" id="exampleInputEmail1"
                                   placeholder="Kode Kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Studio Photo</label>
                            <input type="text" value="<?php echo $namaSpbu ?>" name="namaspbu" class="form-control"
                                   id="exampleInputEmail1"
                                   placeholder="Nama Studio Photo">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"><?=$alamat?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select class="form-control select2" name="kodekecamatan" style="width: 100%;">
                                <option> - Pilih Kecamatan --</option>
                                <option value="<?=$kode_kec?>"><?=$kecamatan?></option>
                                <?php
                                foreach ($datakecamatan as $kecamatan) {
                                    ?>
                                    <option value="<?php echo $kecamatan->kd_kec ?>"><?php echo $kecamatan->nama_kec; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi"><?=$deskripsi?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar Studio Photo</label>
                            <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Cari… <input size="20" value="<?=$gambarSpbu?>" type="file" id="imgInp" name="gambar">
                                        </span>
                                    </span>
                                <input type="text" value="<?=$gambarSpbu?>" name="gambar" class="form-control" readonly>
                            </div>
                            <img id='img-upload'/>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Latitude</label>
                            <input type="text" value="<?php echo $lati ?>" name="lat" class="form-control"
                                   id="exampleInputEmail1"
                                   placeholder="Latitude">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Longitude</label>
                            <input type="text" value="<?php echo $longi ?>" name="long" class="form-control"
                                   id="exampleInputEmail1"
                                   placeholder="Latitude">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" value="upload" class="btn btn-success">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function (event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if (input.length) {
                input.val(log);
            } else {
                if (log) alert(log);
            }

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    });
</script>
