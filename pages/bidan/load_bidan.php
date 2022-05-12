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

//membuat pagination
$next_disabled;
$prev_disabled;
$batas = 10;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

if (isset($_GET['halaman'])) {
    $hal = "ada halaman";
} else {
    $hal = "tdk ada halaman";
}

$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "select * from izin_bidan");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

($halaman == $total_halaman) ? $next_disabled = "disabled" : "";
($halaman == 1) ? $prev_disabled = "disabled" : "";




// require_once('../../templates/header.php');

$output = "";

$output .= "

<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nomor Whatsapp</th>
            <th>Masa Berlaku</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    ";
$u = $_SESSION['username'];
$q = mysqli_query($koneksi, "SELECT * FROM izin_bidan order by id_bidan DESC limit $halaman_awal, $batas");
$nomor = $halaman_awal + 1;

$no = $halaman_awal + 1;
while ($row = mysqli_fetch_array($q)) {

    $output .= "
    <tr>
    <td> " . $no  . "</td>
    <td> " . $row['nama'] . "</td>
    <td>" .  $row['no_wa']  . "</td>
    <td>" .  $row['ms_berlaku'] . " </td>
    <td>                            
    
    <input type='hidden' name='nama' id='" . $row['nama'] . "'>
    <button class='btn btn-danger float-right hapus_bidan' data-nama='" . $row['nama'] . "' alt='hapus' id='" . $row['id_bidan'] . "' ><i class='fas fa-trash-alt'></i></button>
                            <a class='btn btn-warning float-right mr-3 edit_bidan' alt='edit' id='" . $row['id_bidan'] . "' ><i class='fas fa-edit'></i></a>
                            
                            </td>
    </tr>
    ";
    $no++;
}
$output .= "
</tbody>
</table>";

$output .= "
<nav>
			<ul class='pagination justify-content-center'>
            <li class='page-item'>
                <a  class='btn " . $prev_disabled . " page-link next_page ' id=" . $previous . "'><< Previous</a>
				</li>";

for ($x = 1; $x <= $total_halaman; $x++) {

    $output .= "   <a class='btn page-link next_page' id='" . $x . "'>" . $x . "</a>";
}

$output .= "
            <li class='page-item'>
            <a  class='btn " . $next_disabled . " page-link next_page ' id=" . $next . "'>Next >></a>
        </li>
            
            

			</ul>
		</nav>

";

echo $output;
