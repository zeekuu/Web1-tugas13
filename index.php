<?php
include "koneksi.php";

$sql = "SELECT tabel_pendaftaran.id, tabel_mhs.namaMHS, tabel_mhs.nimMHS, tabel_kursus.namaKursus, tabel_kursus.Durasi, tabel_pendaftaran.tglDaftar
        FROM tabel_pendaftaran
        JOIN tabel_mhs ON tabel_pendaftaran.idMHS = tabel_mhs.id
        JOIN tabel_kursus ON tabel_pendaftaran.idKursus = tabel_kursus.id";
$result = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Pendaftaran</title>
</head>

<body>
    <div class="container">
        <h1>Data Pendaftaran Kursus</h1>
        <div class="nav">
            <a href="tambahMHS.php">Tambah Mahasiswa</a>
            <a href="tambahKursus.php">Tambah Kursus</a>
            <a href="Pendaftaran.php">Tambah Pendaftaran</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Nim</th>
                        <th>Kursus</th>
                        <th>Durasi</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['namaMHS'] ?></td>
                                <td><?= $row['nimMHS'] ?></td>
                                <td><?= $row['namaKursus'] ?></td>
                                <td><?= $row['Durasi'] ?> Jam</td>
                                <td><?= date('d-m-Y', strtotime($row['tglDaftar'])) ?></td>
                                <td>
                                    <div class="aksi">
                                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn-delete"
                                            onclick="return confirm('Kamu Yakin Ingin Hapus?')">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Belum Ada Pendaftaran</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>