<?php
include "../koneksi.php";
$nis = $_POST['nis'];
$nip = $_POST['nip'];
$id_mapel = $_POST['id_mapel'];
$nilai = $_POST['nilai'];

$stmt = mysqli_prepare($koneksi, "INSERT INTO nilai (nis, id_mapel, nip, nilai) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sisi", $nis, $id_mapel, $nip, $nilai);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
