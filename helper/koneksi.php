<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "modal";
error_reporting(0);
$koneksi = mysqli_connect($host, $username, $password, $db) or die("GAGAL");

$base_url = "/modalsender/";
date_default_timezone_set('Asia/Jakarta');
