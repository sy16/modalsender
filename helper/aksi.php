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


if (isset($_POST['action']) && $_POST['action'] == "insert") {
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


    $status = array(
        "simpan" => $save,
        'sukses' => 1
    );
    $ar_merge = array_merge($aksi, $status);

    echo json_encode($ar_merge);
}

if (isset($_POST['action']) && $_POST['action'] == "edit") {

    $id_bidan = $_POST['id_bidan'];
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

    $q = mysqli_query($koneksi, "UPDATE izin_bidan SET `sipb` = '$sipb', `nama` = '$nama', `temp_lahir` = '$temp_lahir', `alamat` = '$alamat', `no_strb` = '$no_strb', `uk_praktik` = '$uk_praktik', `al_praktik` = '$al_praktik', `no_rekom` = '$no_rekom', `tg_rekom` = '$tg_rekom', `terbit` = '$terbit', `ms_berlaku` = '$ms_berlaku', `no_wa` = '$no_wa' WHERE `id_bidan` = $id_bidan");

    // $q = mysqli_query($koneksi, "INSERT INTO izin_bidan(`sipb`, `nama`,`temp_lahir`, `tg_lahir`, `alamat`, `no_strb`, `uk_praktik`, `al_praktik`, `no_rekom`, `tg_rekom`, `terbit`, `ms_berlaku`,`no_wa`)
    //         VALUES('$sipb', '$nama','$temp_lahir', '$tg_lahir', '$alamat', '$no_strb', '$uk_praktik','$al_praktik', '$no_rekom', '$tg_rekom', '$terbit', '$ms_berlaku', '$no_wa')");
    if ($q) {
        toastr_set("success", "Sukses Perbaiki Data");
        $save = "Data Berhasil Di Perbaiki";
    } else {
        toastr_set("error", "Gagal Memperbaiki Data");
        // $save = "Gagal Memperbaiki Data !";
        $save = $koneksi->error;
    }


    $status = array(
        "simpan" => $save,
        'sukses' => 1
    );
    $ar_merge = array_merge($aksi, $status);

    echo json_encode($ar_merge);

    // echo json_encode(
    //     array("simpan" => "edit")
    // );
}


if (empty($_POST['action'])) {

    echo json_encode(
        array(
            'simpan' => 'Aksi tidak diketahui !',
            'sukses' => 0
        )
    );
}
