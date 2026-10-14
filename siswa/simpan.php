<?php
include "koneksi.php";
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$stmt = mysqli_prepare($koneksi, "INSERT INTO siswa (nis, nama, alamat) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "iss", $nis, $nama, $alamat);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal menyimpan data: " . htmlspecialchars(mysqli_error($koneksi));
}
?>
