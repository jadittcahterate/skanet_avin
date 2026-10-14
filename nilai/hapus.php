<?php
include "../koneksi.php";
$id_nilai = $_GET['id_nilai'];
$stmt = mysqli_prepare($koneksi, "DELETE FROM nilai WHERE id_nilai = ?");
mysqli_stmt_bind_param($stmt, "i", $id_nilai);
if (mysqli_stmt_execute($stmt)) {
    header('location: index.php');
    exit();
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
