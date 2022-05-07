<?php

include_once("../../helper/koneksi.php");
include_once("../../helper/function.php");


$login = cekSession();
if ($login == 0) {
    redirect("login.php");
}

if (post("nama")) {
    $nama = post("nama");
    $nomor = post("nomor");
    $pesan = utf8_encode(post("pesan"));
    $u = $_SESSION['username'];
}

require_once('../../templates/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <a href="ta_izin_bidan.php?act=insert" class="btn btn-primary btn-block">Tambah Izin</a>

    <br>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="display: contents">Data Izin Praktik Bidan</h6>
            <a class="btn btn-info float-right" href="<?= $base_url; ?>lib/export_excel.php" style="margin:5px">Synchron</a>
            <button type="button" class="btn btn-success float-right px-4" data-toggle="modal" style="margin:5px" data-target="#import">
                Import
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="result"></div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="#">HambaAllah</a></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= $base_url; ?>auth/logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Izin Praktik Bidan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="POST">
                    <div class="row">
                        <div class="col">

                            <label> SIPB </label>
                            <input type="text" name="sipb" required class="form-control" size="100">
                            <br>
                            <label> Nama </label>
                            <input type="text" name="nama" required class="form-control" placeholder="">
                            <br>
                            <label>Tempat Lahir </label>
                            <input type="text" name="temp_lahir" required class="form-control" placeholder="">
                            <br>
                            <label>Tgl Lahir</label>
                            <input type="text" name="tg_lahir" required class="form-control" placeholder="">
                            <br>
                            <label for="">Alamat</label>
                            <textarea type="text" name="alamat" required class="form-control" placeholder="alamat"></textarea>
                            <br>
                            <label>No STRB</label>
                            <input type="text" name="no_strb" required class="form-control" placeholder="">
                            <br>
                            <label>Untuk Praktik</label>
                            <input type="text" name="uk_praktik" required class="form-control" placeholder="">
                            <br>


                        </div>
                        <div class="col">

                            <label>Alamat Praktik</label>
                            <textarea type="text" name="al_praktik" required class="form-control" placeholder=""></textarea>
                            <br>
                            <label>No Rekomendasi</label>
                            <input type="text" name="no_rekom" required class="form-control" placeholder="">
                            <br>
                            <label>Tgl Rekomendasi</label>
                            <input type="text" name="tg_rekom" required class="form-control" placeholder="">
                            <br>
                            <label>Terbit</label>
                            <input type="text" name="terbit" required class="form-control" placeholder="">
                            <br>
                            <label>Masa Berlaku</label>
                            <input type="text" name="ms_berlaku" required class="form-control" placeholder="">
                            <br>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Nomor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../lib/import_excel.php" method="POST" enctype="multipart/form-data">
                    <label> File (.xlsx) </label>
                    <input type="file" name="file" required class="form-control">
                    <br>
                    <label> Mulai dari Baris ke </label>
                    <input type="text" name="a" required class="form-control" value="2">
                    <br>
                    <label> Kolom Nama ke </label>
                    <input type="text" name="b" required class="form-control" value="1">
                    <br>
                    <label> Kolom Nomor ke </label>
                    <input type="text" name="c" required class="form-control" value="2">
                    <br>
                    <label> Kolom pesan ke </label>
                    <input type="text" name="d" required class="form-control" value="3">
                    <br>
                    <p> Download file contoh <a href="<?= $base_url; ?>excel/contoh.xlsx" target="_blank">disini</a> </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= $base_url; ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= $base_url; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= $base_url; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= $base_url; ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= $base_url; ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $base_url; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= $base_url; ?>js/demo/datatables-demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        load_bidan();


    });

    $(document).on('click', '.edit_bidan', function() {
        var id = $(this).attr("id");
        window.location = 'ta_izin_bidan.php?act=edit&id=' + id;

    });

    $(document).on('click', '.hapus_bidan', function() {
        var id = $(this).attr("id");
        var nama = $(this).data("nama");
        // alert(id);
        $.ajax({
            url: "../../helper/aksi.php",
            method: "POST",
            data: {
                id: id,
                action: "hapus_bidan"
            },
            beforeSend: function(data) {
                return confirm('Apakah anda yakin ingin menghapus data " ' + nama + ' "');
            },
            success: function(data) {
                var jsonData = JSON.parse(data);
                // alert(jsonData.simpan);
                // alert("coab hapus");
                load_bidan();
            },
            error: function(xhr, e, errorThrown) {
                console.log("Kesalahan :" + e);
            }
        });
    });

    function load_bidan() {
        $.ajax({
            url: "load_bidan.php",
            method: "POST",
            success: function(data) {
                // console.log("Sukses fungsi ajax");
                // $(".result").html(data);
                $('.result').html(data);

                <?php

                toastr_show();

                ?>
            }
        });
    }
</script>
</body>

</html>