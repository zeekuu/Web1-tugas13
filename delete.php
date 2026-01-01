<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tabel_pendaftaran WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data Pendaftar berhasil dihapus.');
            window.location='index.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>