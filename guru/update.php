<?php
include "../koneksi.php";
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$stmt = mysqli_prepare($koneksi, "UPDATE guru SET nama = ?, alamat = ? WHERE nip = ?");
mysqli_stmt_bind_param($stmt, "sss", $nama, $alamat, $nip);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal memperbarui data: " . mysqli_error($koneksi);
}
?>
