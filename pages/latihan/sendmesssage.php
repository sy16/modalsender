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
$a = array();
$notif;

function kirim_pesan($tujuan, $nama, $exp)
{
    global $jsons;
    global $pesan;

    $apikey = "980dc809b940d0c0a1358c1622be6726268adb9e";
    $tujuan = $tujuan;
    $pesan = "Hiii {$nama} ini pesan test denga api. tanggal berlaku izin anda {$exp}";

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
    $jsons = json_decode($response);

    // $notif = $jsons->message;

    // echo  $notif;
    // echo $jsons['data']['message'];
    // echo implode(" - ", $jsons);
    // echo $jsons;

    // foreach ($jsons as $res) {
    //     $res[0];
    // }


    // echo "<br>";
    // echo "<br> pesan : {$pesan}";
}




while ($row = mysqli_fetch_array($q)) {
    // echo " {$row['nama']} : {$row['no_wa']} : $status<br>";

    if ($row['ms_berlaku'] == $tgl) {
        $status = 3;  // 3 : kadaluarsa

        $id_bidan = $row['id_bidan'];

        echo "{$row['id_bidan']} - {$row['nama']} ({$row['ms_berlaku']} - exp): {$row['no_wa']} : Kadaluarsa (3)<br>";
        kirim_pesan($row['no_wa'], $row['nama'], $row['ms_berlaku']);
        echo "<br>Pesan : {$pesan}<br><br>";

        // echo $jsons->message;
        // array_push($a, $row['id_bidan']);
        $newdata[] =  array(
            'id_bidan' => $row['id_bidan'],
            'nama' => $row['nama'],
            'status' => $status,
            'id_message' => $jsons->data->message_id,
            'message' => $jsons->message,
            'isi_pesan' => $pesan

        );

        array_push($md_array[$id_bidan], $newdata);
        // $md_array["data"] = $newdata;

        $exp++;
    } else {
        $status = 1;  // 1 : Berlaku
        echo "{$row['id_bidan']} - {$row['nama']} ({$row['ms_berlaku']}) : Berlaku (1) <br>";
        $valid++;
    }
    $no++;
}
echo "<br><br>Jml Data : {$no}";
echo "<br>Masa Berlaku Habis : {$exp}";
echo "<br>Masih Berlaku : {$valid} <br><br>";

// print_r($newdata);

echo "save data ...";
$nodata = 1;
foreach ($newdata as $value) {
    $count = countDB("notif_bidan", "id_izin", $value['id_bidan']);
    if ($count == 0) {

        echo "<br>{$value['nama']} - ";

        $sql = mysqli_query($koneksi, "INSERT INTO notif_bidan (`id_izin`, `status`, `id_message`, `message`,`isi_pesan`)
        VALUES ('" . $value['id_bidan'] . "', '" . $value['status'] . "', '" . $value['id_message'] . "', '" . $value['message'] . "','" . $value['isi_pesan'] . "')");

        if ($sql) {
            echo "New record created successfully ({$nodata})";
            $nodata++;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

echo "<br> process completed ...<br>";
