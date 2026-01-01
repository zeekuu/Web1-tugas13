<?php
include "koneksi.php";

if (isset($_POST["addMHS"])) {
    $namaMHS = $_POST["namaMHS"];
    $nimMHS = $_POST["nimMHS"];

    mysqli_query($koneksi, "INSERT INTO tabel_mhs (namaMHS, nimMHS) VALUES ('$namaMHS', '$nimMHS')");
    echo "<script>
            alert('Nama Mahasiswa Berhasil Ditambahkan.');
            window.location='tambahKursus.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <div class="card">
    <h1>Tambah Mahasiswa</h1>
    <form method='POST'>
        <input type="text" placeholder='Nama Mahasiswa' name='namaMHS' autocomplete="off" required>
        <input type="number" placeholder='NIM' name='nimMHS' autocomplete="off" required>
        <button type='submit' name='addMHS'>Simpan</button>
    </form>
    </div>
</body>
</html>