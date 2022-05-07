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



$q = mysqli_query($koneksi, "SELECT * FROM izin_bidan order by id_bidan DESC");


$status = "belumkirim";

$tgl = date('Y-m-d');
// echo $tgl;


$no = 0;
$valid = 0;
$exp = 0;




while ($row = mysqli_fetch_array($q)) {
    // echo " {$row['nama']} : {$row['no_wa']} : $status<br>";

    if ($row['ms_berlaku'] == $tgl) {
        $notif = "Kirim Pesan";



        echo " {$row['nama']} ({$row['ms_berlaku']} - exp): {$row['no_wa']} : $notif<br>";

        // echo "Tanggal sekarang {$tgl} : valid <br>";



        $apikey = "980dc809b940d0c0a1358c1622be6726268adb9e";
        $tujuan = $row['no_wa'];
        $pesan = "Hiii {$row['nama']} ini pesan test denga api. tanggal berlaku izin anda {$row['ms_berlaku']}";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan) . '&tujuan=' . rawurlencode($tujuan . '@s.whatsapp.net'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'apikey: ' . $apikey
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


        echo "<br> pesan : {$pesan}";
        // echo $response["status"];

        echo "<br><br>";
        $exp++;
    } else {
        echo "{$row['nama']} ({$row['ms_berlaku']}) : Berlaku <br>";
        $valid++;
    }
    $no++;
}
echo "<br><br>Jml Data : {$no}";
echo "<br>Masa Berlaku Habis : {$exp}";
echo "<br>Masih Berlaku : {$valid}";
