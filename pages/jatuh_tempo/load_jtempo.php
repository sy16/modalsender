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

// require_once('../../templates/header.php');

$output = "";

$output .= "


<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nomor Whatsapp</th>
            <th>Masa Berlaku</th>
            <th>Status</th>
            <th>Pesan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    ";

$u = $_SESSION['username'];
$q = mysqli_query($koneksi, "SELECT izin_bidan.nama as nama, izin_bidan.no_wa as no_wa, izin_bidan.ms_berlaku as berlaku, notif_bidan.status as status, notif_bidan.message as message FROM notif_bidan JOIN izin_bidan WHERE notif_bidan.id_izin = izin_bidan.id_bidan order by notif_bidan.id_jtempo DESC");

$no = 1;
while ($row = mysqli_fetch_array($q)) {

    $status = $row['status'];
    switch ($status) {
        case 1:
            $status = "Berlaku";
            break;
        case 2:
            $status = "Peringatan";
            break;
        case 3:
            $status = "Kadaluwarsa";
            break;
        default:
            echo "-";
    }

    $output .= "
    <tr>
    <td> " . $no  . "</td>
    <td> " . $row['nama'] . "</td>
    <td>" .  $row['no_wa']  . "</td>
    <td>" .  $row['berlaku'] . " </td>
    <td>" .  $status . " </td>
    <td>" .  $row['message'] . " </td>
    <td>                            
    
    <input type='hidden' name='nama' id='" . $row['nama'] . "'>
                            <a class='btn btn-warning float-right mr-3 edit_bidan' alt='edit' id='" . $row['id_bidan'] . "' ><i class='fas fa-edit'></i></a>
                            
                            </td>
    </tr>
    ";
    $no++;
}
$output .= "
</tbody>
</table>";

echo $output;
