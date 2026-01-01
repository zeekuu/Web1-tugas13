<?php
include "koneksi.php";

$MHS = mysqli_query($koneksi, "SELECT * FROM tabel_mhs");
$Kursus = mysqli_query($koneksi, "SELECT * FROM tabel_kursus");

if (isset($_POST["daftar"])) {
    $idMHS = $_POST["idMHS"];
    $idKursus = $_POST["idKursus"];
    mysqli_query($koneksi, "INSERT INTO tabel_pendaftaran (idMHS, idKursus) VALUES ('$idMHS', '$idKursus')");
    echo "<script>
            alert('Pendaftaran Berhasil');
            window.location='index.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pendaftaran</title>
</head>

<body>
    <div class="card daftar">
        <h1>Pendaftaran Kursus</h1>
        <form method='POST'>
            <label>Pilih Mahasiswa:</label>
            <select name="idMHS">
                <option value="">--- Nama Mahasiswa ---</option>
                <?php while ($m = mysqli_fetch_assoc($MHS)): ?>
                    <option value="<?= $m['id'] ?>"><?= $m['namaMHS'] ?></option>
                <?php endwhile; ?>
            </select>
            <label>Pilih Kursus:</label>
            <select name="idKursus">
                <option value="">--- Nama Kursus ---</option>
                <?php while ($k = mysqli_fetch_assoc($Kursus)): ?>
                    <option value="<?= $k['id'] ?>"><?= $k['namaKursus'] ?> (<?= $k['Durasi'] ?> Jam)</option>
                <?php endwhile; ?>
            </select>
            <button type="submit" name='daftar'>Daftarkan</button>
        </form>
    </div>
</body>

</html>