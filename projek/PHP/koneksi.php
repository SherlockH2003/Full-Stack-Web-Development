<?php

$db_host = "localhost";
$db_user = "root";
$db_pw = "";
$db_name = "pbw_universitas";

$conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

if (!$conn) {
    die("Connection failed");
}else{
    echo "<script>console.info(\"Koneksi Berhasil\")</script>";
}
?>