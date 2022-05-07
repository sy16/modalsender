<?php
include_once("../helper/koneksi.php");
include_once("../helper/function.php");


$login = cekSession();
if ($login == 0) {
    redirect("login.php");
}

$save;

if (isset($_POST['action']) && $_POST['action'] == "hapus_bidan") {
    $id = $_POST['id'];
    $q = mysqli_query($koneksi, "DELETE FROM izin_bidan WHERE id_bidan='$id'");


    if ($q) {
        toastr_set("success", "Sukses hapus nomor");
        $save = "Data {$_POST['nama']} Berhasil Di Hapus";
    } else {
        $save = "Data Gagal Di Hapus";
        toastr_set("error", "Gagal hapus nomor");
    }

    $status = array("simpan" => $save);

    echo json_encode($status);
}


if (isset($_POST['action']) && $_POST['action'] == "insert_bidan") {
    $sipb = $_POST['sipb'];
    $nama = $_POST['nama'];
    $temp_lahir = $_POST['temp_lahir'];
    $tg_lahir = $_POST['tg_lahir'];
    $alamat = $_POST['alamat'];
    $no_strb = $_POST['no_strb'];
    $uk_praktik = $_POST['uk_praktik'];
    $al_praktik = $_POST['al_praktik'];
    $no_rekom = $_POST['no_rekom'];
    $tg_rekom = $_POST['tg_rekom'];
    $terbit = $_POST['terbit'];
    $ms_berlaku = $_POST['ms_berlaku'];
    $no_wa = $_POST['no_wa'];

    $u = $_SESSION['username'];
    // echo "$nama & $sipb <br><br>";
    $aksi = array(
        "sipb" => $sipb,
        "nama" => $nama,
        "temp_lahir" => $temp_lahir,
        "tg_lahir" => $tg_lahir,
        "alamat" => $alamat,
        "no_strb" => $no_strb,
        "uk_praktik" => $uk_praktik,
        "al_praktik" => $al_praktik,
        "no_rekom" => $no_rekom,
        "tg_rekom" => $tg_rekom,
        "terbit" => $terbit,
        "ms_berlaku" => $ms_berlaku,
        "no_wa" => $no_wa,
        "akun" => $u,
        "action" => $_POST['action'],
    );



    // echo json_encode(
    //     array('success' => 1)
    // );

    $q = mysqli_query($koneksi, "INSERT INTO izin_bidan(`sipb`, `nama`,`temp_lahir`, `tg_lahir`, `alamat`, `no_strb`, `uk_praktik`, `al_praktik`, `no_rekom`, `tg_rekom`, `terbit`, `ms_berlaku`,`no_wa`)
            VALUES('$sipb', '$nama','$temp_lahir', '$tg_lahir', '$alamat', '$no_strb', '$uk_praktik','$al_praktik', '$no_rekom', '$tg_rekom', '$terbit', '$ms_berlaku', '$no_wa')");
    if ($q) {
        toastr_set("success", "Sukses input data");
        $save = "Data Berhasil Di Tambahakan";
    } else {
        toastr_set("error", "Gagal Menyimpan Data");
        $save = "Gagal Menambahakan Data !";
    }


    $status = array("simpan" => $save);
    $ar_merge = array_merge($aksi, $status);

    echo json_encode($ar_merge);

    // $count = countDB("nomor", "nomor", $nomor);

    // if ($count == 0) {
    //     $q = mysqli_query($koneksi, "INSERT INTO nomor(`nama`, `nomor`,`pesan`, `make_by`)
    //         VALUES('$nama', '$nomor','$pesan', '$u')");
    //     toastr_set("success", "Sukses input nomor");
    // } else {
    //     toastr_set("error", "Nomor telah ada sebelumnya");
    // }
    // }

    // if (get("act") == "hapus") {
    //     $id = get("id");

    //     
    //     redirect("nomor.php");
}

// if (get("act") == "delete_all") {
//     $q = mysqli_query($koneksi, "DELETE FROM nomor");
//     toastr_set("success", "Sukses hapus semua nomor");
//     redirect("nomor.php");
// }

if (empty($_POST['action'])) {

    echo json_encode(
        array(
            'simpan' => 'Aksi tidak diketahui !',
            'sukses' => 0
        )
    );
}
