<?php
$apikey = "980dc809b940d0c0a1358c1622be6726268adb9e";
$tujuan = "6285249660267";
$pesan = "Hiii ini pesan test denga api.";

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
// echo $response["status"];
