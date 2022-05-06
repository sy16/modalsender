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
$q = mysqli_query($koneksi, "SELECT * FROM izin_bidan order by id_bidan DESC");
$no = 1;
while ($row = mysqli_fetch_array($q)) {

    $output .= "
    <tr>
    <td> " . $no  . "</td>
    <td> " . $row['nama'] . "</td>
    <td>" .  $row['no_wa']  . "</td>
    <td>" .  $row['ms_berlaku'] . " </td>
    <td>Berlaku </td>
    <td>- </td>
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
