<?php
include "../koneksi.php";
$id_mapel = $_GET['id_mapel'];
$stmt = mysqli_prepare($koneksi, "DELETE FROM mapel WHERE id_mapel = ?");
mysqli_stmt_bind_param($stmt, "i", $id_mapel);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
