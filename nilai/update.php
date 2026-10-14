<?php
include "../koneksi.php";
$id_nilai = $_POST['id_nilai'];
$nis = $_POST['nis'];
$nip = $_POST['nip'];
$id_mapel = $_POST['id_mapel'];
$nilai = $_POST['nilai'];

$stmt = mysqli_prepare($koneksi, "UPDATE nilai SET nis = ?, nip = ?, id_mapel = ?, nilai = ? WHERE id_nilai = ?");
mysqli_stmt_bind_param($stmt, "ssiii", $nis, $nip, $id_mapel, $nilai, $id_nilai);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal memperbarui data: " . mysqli_error($koneksi);
}
?>
