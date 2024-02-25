<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="text-center">Edit Data Buku</h1>
        <?php
        include 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $judul = $_POST['judul'];
            $penerbit = $_POST['penerbit'];
            $pengarang = $_POST['pengarang'];
            $tahun_terbit = $_POST['tahun_terbit'];

            $query_update = "UPDATE buku SET judul = '$judul', penerbit = '$penerbit', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit' WHERE id = $id";

            $result_update = mysqli_query($link, $query_update);
            if ($result_update) {
                echo "Data berhasil diedit";
                header("Location: index.php");
            } else {
                die(mysqli_error($link));
            }
        } else {
            $id = $_GET['id'];
            $query_select = "SELECT * FROM buku WHERE id='$id' ";
            $result_select = mysqli_query($link, $query_select);
            $row = mysqli_fetch_assoc($result_select);
        }
        ?>
        <form action="proses_editbuku.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul'] ?>">
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $row['penulis'] ?>">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $row['penerbit'] ?>">
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $row['tahun_terbit'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>