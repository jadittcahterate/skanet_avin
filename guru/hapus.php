<?php
include "../koneksi.php";
$nip = $_GET['nip'];
$stmt = mysqli_prepare($koneksi, "DELETE FROM guru WHERE nip = ?");
mysqli_stmt_bind_param($stmt, "s", $nip);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
