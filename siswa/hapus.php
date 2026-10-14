<?php
include "../koneksi.php";
$nis = $_GET['nis'];
$stmt = mysqli_prepare($koneksi, "DELETE FROM siswa WHERE nis = ?");
mysqli_stmt_bind_param($stmt, "s", $nis);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
