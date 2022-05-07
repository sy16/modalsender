<?php
include_once("../../helper/koneksi.php");
include_once("../../helper/function.php");
$id;
$act = get("act");

$login = cekSession();
if ($login == 0) {
    redirect("login.php");
}



if (post("nama")) {
    $nama = post("nama");
    $nomor = post("nomor");
    $pesan = utf8_encode(post("pesan"));
    $u = $_SESSION['username'];


    $count = countDB("nomor", "nomor", $nomor);

    if ($count == 0) {
        $q = mysqli_query($koneksi, "INSERT INTO nomor(`nama`, `nomor`,`pesan`, `make_by`)
            VALUES('$nama', '$nomor','$pesan', '$u')");
        toastr_set("success", "Sukses input nomor");
    } else {
        toastr_set("error", "Nomor telah ada sebelumnya");
    }
}

// if (get("act") == "insert") {
//     $act = get("act");
// }

// if(get("act") == "edit"){
// $act=
// }

// if (get("act") == "delete_all") {
//     $q = mysqli_query($koneksi, "DELETE FROM nomor");
//     toastr_set("success", "Sukses hapus semua nomor");
//     redirect("nomor.php");
// }

if (!empty(get("id"))) {
    $id = get("id");

    $q = mysqli_query($koneksi, "SELECT * FROM izin_bidan WHERE id_bidan = '$id'");
    $row = mysqli_fetch_array($q);
}


require_once('../../templates/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->

    <br>

    <?php
    // echo $id;

    ?>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="display: contents">Form Tambah Izin Praktik Bidan</h6>
            <a class="btn btn-danger float-right px-4" href="izin_bidan.php"><i class="fas fa-hand-point-left"></i>back</a>
        </div>
        <div class="card-body">

            <form method="POST" id="add_izin_bidan" data-url="views/kwitansi/addkwitansi.php" data-home="views/kwitansi/load_data.php">
                <div class="row">
                    <div class="col">

                        <label> SIPB </label>
                        <input type="text" name="sipb" required class="form-control" value="<?= $row['sipb'] ?>" size="100">
                        <br>
                        <label> Nama </label>
                        <input type="text" name="nama" required class="form-control" value="<?= $row['nama'] ?>" placeholder="">
                        <br>
                        <label>Tempat Lahir </label>
                        <input type="text" name="temp_lahir" required class="form-control" value="<?= $row['temp_lahir'] ?>" placeholder="">
                        <br>
                        <label>Tgl Lahir</label>
                        <input type="text" name="tg_lahir" required class="form-control datepicker" value="<?= $row['tg_lahir'] ?>" placeholder="">
                        <br>


                        <label for="">Alamat</label>
                        <textarea type="text" name="alamat" required class="form-control" placeholder=""><?= $row['alamat'] ?></textarea>
                        <br>
                        <label>No STRB</label>
                        <input type="text" name="no_strb" required class="form-control" value="<?= $row['no_strb'] ?>" placeholder="">
                        <br>
                        <label>Untuk Praktik</label>
                        <input type="text" name="uk_praktik" required class="form-control" value="<?= $row['uk_praktik'] ?>" placeholder="">
                        <br>


                    </div>
                    <div class="col">

                        <label>Alamat Praktik</label>
                        <textarea type="text" name="al_praktik" required class="form-control" placeholder=""><?= $row['al_praktik'] ?></textarea>
                        <br>
                        <label>No Rekomendasi</label>
                        <input type="text" name="no_rekom" required class="form-control" value="<?= $row['no_rekom'] ?>" placeholder="">
                        <br>
                        <label>Tgl Rekomendasi</label>
                        <input type="text" name="tg_rekom" required class="form-control datepicker" value="<?= $row['tg_rekom'] ?>" placeholder="">
                        <br>
                        <label>Terbit</label>
                        <input type="text" name="terbit" required class="form-control datepicker" value="<?= $row['terbit'] ?>" placeholder="">
                        <br>
                        <label>Masa Berlaku</label>
                        <input type="text" name="ms_berlaku" required class="form-control datepicker" value="<?= $row['ms_berlaku'] ?>" placeholder="">
                        <br>
                        <label>No Whatsapp</label>
                        <input type="text" name="no_wa" required class="form-control" value="<?= $row['no_wa'] ?>" placeholder="">
                        <br>



                        <input type="hidden" name="id_bidan" id="action" value="<?= $id ?>">

                        <input type="hidden" name="action" id="action" value="<?= $act ?>">

                        <button type="submit" name="save" id="save" class="btn btn-success float-right px-5 mr-3 btn_submit">Simpan</button>

                        <button type="button" name="clear" id="clear" class="btn btn-secondary px-5 mr-3 float-right" data-bs-dismiss="modal">Clear</button>


                    </div>
                </div>
            </form>

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

<!-- Optional JavaScript; choose one of the two! -->
<script src="<?= $base_url; ?>vendor/bootstrap/js/bootstrap-datepicker.js"></script>

<script>
    <?php

    toastr_show();

    ?>

    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });

    $(document).on('submit', '#add_izin_bidan', function(event) {
        var form_data = $(this).serialize();
        event.preventDefault();
        // console.log(form_data);
        // alert(form_data);
        // end();
        $.ajax({
            url: "../../helper/aksi.php",
            method: "POST",
            data: form_data,


            success: function(data) {
                // console.log(data);
                // alert("sukses");
                var jsonData = JSON.parse(data);
                // console.log(data);

                if (jsonData.sukses == 0) {
                    alert(jsonData.simpan);
                    // $(':input').val('');
                } else {
                    alert(jsonData.simpan);
                    $(':input').val('');
                    window.location.href = "izin_bidan.php";
                }

            },
            error: function(xhr, e, errorThrown) {
                console.log(e, errorThrown, xhr);
                console.log("kesalahan " + errorThrown);
                // alert('gagal menyimpan data');
                var jsonData = JSON.parse(data);
                alert(jsonData.simpan);
            }

        })

    });
</script>
</body>

</html>