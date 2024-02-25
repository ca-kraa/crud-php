<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $query_update = "UPDATE buku SET judul = '$judul', penerbit 
    = '$penerbit' , penulis = '$penulis', tahun_terbit = '$tahun_terbit' WHERE id = $id";

    $result_update = mysqli_query($link, $query_update);
    if ($result_update) {
        echo "Data berhasil diupdate";
        header("Location: index.php");
    } else {
        echo "Error: " . $query_update . "<br>" . mysqli_error($link);
    }
}
