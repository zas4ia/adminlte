<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_db = "zaskia_xlrpl4";

$koneksi = mysqli_connect("localhost","root","","zaskia_xlrpl4");

if( !$koneksi){
    die("Gagal terhubung dengan database: " .mysqli_connect_error());
}
?>