<?php
include "koneksi.php";
$MHS = mysqli_query($koneksi, "SELECT * FROM tabel_mhs");
$Kursus = mysqli_query($koneksi, "SELECT * FROM tabel_kursus");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tabel_pendaftaran WHERE id = '$id'");
    $tengkuData = mysqli_fetch_assoc($query);

    if (!$tengkuData) {
        header('location: index.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $idMHS = $_POST['idMHS'];
    $idKursus = $_POST['idKursus'];

    $query1 = "UPDATE tabel_pendaftaran SET idMHS = '$idMHS', idKursus = '$idKursus' WHERE id = '$id'";

    if (mysqli_query($koneksi, $query1)) {
        echo "<script>
        alert('Data Pendaftar Berhasil diubah');
        window.location='index.php';
        </script>";
    } else {
        echo 'Error: ' . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>

<body>
    <div class="card">
        <h1>Edit Pendaftaran</h1>
        <form method='POST'>
            <input type="hidden" name="id" value="<?= $tengkuData['id']; ?>">
            <label>Pilih Mahasiswa:</label>
            <select name="idMHS" required>
                <?php while ($m = mysqli_fetch_assoc($MHS)) { ?>
                    <option value="<?= $m['id'] ?>" <?= ($m['id'] == $tengkuData['idMHS']) ? 'selected' : ''; ?>>
                        <?= $m['namaMHS'] ?>
                    </option>
                <?php } ?>
            </select>
            <label>Pilih Mahasiswa:</label>
            <select name="idKursus" required>
                <?php while ($k = mysqli_fetch_assoc($Kursus)) { ?>
                    <option value="<?= $k['id'] ?>" <?= ($k['id'] == $tengkuData['idKursus']) ? 'selected' : ''; ?>>
                        <?= $k['namaKursus'] ?> (<?= $k['Durasi'] ?> Jam)
                    </option>
                <?php } ?>
            </select>
                <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>