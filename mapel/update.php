<?php
include "../koneksi.php";
$id_mapel = $_POST['id_mapel'];
$mapel = $_POST['mapel'];
$stmt = mysqli_prepare($koneksi, "UPDATE mapel SET mapel = ? WHERE id_mapel = ?");
mysqli_stmt_bind_param($stmt, "si", $mapel, $id_mapel);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal memperbarui data: " . mysqli_error($koneksi);
}
?>
