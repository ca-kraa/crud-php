<?php

$host  = 'localhost';
$user  = 'root';
$pass  = '';
$name = "persiapan_ukk";

$link = mysqli_connect($host,$user, $pass, $name);
if (!$link) {
    die('Koneksi dengan Database Gagal : ' . mysqli_connect_errno() .
    " - " . mysqli_connect_error());
}