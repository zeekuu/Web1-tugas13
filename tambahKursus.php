<?php
include "koneksi.php";

if (isset($_POST["addKursus"])) {
    $namaKursus = $_POST["namaKursus"];
    $Durasi = $_POST["Durasi"];

    mysqli_query($koneksi, "INSERT INTO tabel_kursus (namaKursus, Durasi) VALUES ('$namaKursus', '$Durasi')");
    echo "<script>
        alert('Kursus Berhasil Ditambahkan.');
        window.location='Pendaftaran.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Kursus</title>
</head>

<body>
    <div class="card">
        <h1>Tambah Kursus</h1>
        <form method='POST'>
            <input type="text" placeholder='Nama Kursus' name='namaKursus' autocomplete="off" required>
            <input type="number" placeholder='Durasi' name='Durasi' autocomplete="off" required>
            <button type='submit' name='addKursus'>Simpan</button>
        </form>
    </div>
</body>
</html>