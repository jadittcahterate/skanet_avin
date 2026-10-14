<?php
include "../koneksi.php";
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$stmt = mysqli_prepare($koneksi, "UPDATE siswa SET nama = ?, alamat = ? WHERE nis = ?");
mysqli_stmt_bind_param($stmt, "sss", $nama, $alamat, $nis);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal memperbarui data: " . mysqli_error($koneksi);
}
?>
