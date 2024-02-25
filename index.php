<?php

include 'koneksi.php';

$query = "SELECT * FROM buku";

$result = mysqli_query($link, $query);

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'delete') {
        $id = $_GET['id'];
        $query_delete = "DELETE FROM buku WHERE id = $id";
        $result_delete = mysqli_query($link, $query_delete);

        if ($result_delete) {
            echo "Data telah dihapus.";
        } else {
            echo "Gagal menghapus data: " . mysqli_error($link);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persiapan UKK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-2">
        <h1 class="text-center">Data Buku</h1>
        <div class="text-center">
            <a href="inputbuku.php">Input Data</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no  = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['judul'] . "</td>";
                    echo "<td>" . $row['penulis'] . "</td>";
                    echo "<td>" . $row['penerbit'] . "</td>";
                    echo "<td>" . $row['tahun_terbit'] . "</td>";
                    echo "<td><a href='editbuku.php?id=" . $row['id'] . "'>Edit</a> | <a href='?aksi=delete&id=" . $row['id'] . "'>Delete</a></td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>

        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>