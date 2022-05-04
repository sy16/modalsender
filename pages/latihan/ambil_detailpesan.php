<?php
$apikey = "980dc809b940d0c0a1358c1622be6726268adb9e";

$data = [
    "message_id" => "40566506"
];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://starsender.online/api/getMessage',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
        'apikey: ' . $apikey
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

echo "<br>";
echo "<br>";

$pesan = json_decode($response);
echo "message :" . $pesan->message . "<br>";

foreach ($pesan->data as $val) {
    echo "data . Val : {$val->text} <br>";
}
