<?php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $query = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit)
    VALUES ('$judul', '$penulis', '$penerbit', '$tahun_terbit')";

    $result = mysqli_query($link, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }
}
