<?php
include "../koneksi.php";
$pesan_error = "";
if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $stmt = mysqli_prepare($koneksi, "INSERT INTO siswa (nis, nama, alamat) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "iss", $nis, $nama, $alamat);
    if (mysqli_stmt_execute($stmt)) {
        header('location: index.php');
        exit();
    } else {
        if (mysqli_errno($koneksi) == 1062) {
            $pesan_error = "NIS sudah digunakan, silakan gunakan NIS lain.";
        } else {
            $pesan_error = "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Data Siswa - Skanet Avin</title>
<style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

    body {
        min-height:100vh;
        display:flex;
        align-items:center;
        justify-content:center;
        background: linear-gradient(135deg, #fffde7 0%, #fff9c4 30%, #c8e6c9 70%, #81c784 100%);
        background-attachment: fixed;
        padding: 30px 16px;
    }

    .form-card {
        background:#ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(76,175,80,0.25), 0 5px 15px rgba(255,193,7,0.15);
        width:100%;
        max-width: 460px;
        overflow:hidden;
        border: 3px solid #ffd54f;
    }

    .form-header {
        background: linear-gradient(120deg, #66bb6a, #43a047);
        padding: 26px 30px 22px;
        text-align:center;
        position:relative;
    }

    .form-header::after {
        content:"";
        position:absolute;
        bottom:-12px; left:0; right:0; height:24px;
        background:#ffffff;
        border-radius: 50% 50% 0 0 / 100% 100% 0 0;
    }

    .form-header .icon-circle {
        width:56px; height:56px; margin:0 auto 10px;
        background:#ffd54f; border-radius:50%;
        display:flex; align-items:center; justify-content:center;
        font-size:26px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .form-header h1 { color:#fff; font-size:20px; font-weight:600; }

    .form-body { padding: 30px 32px 32px; }

    .btn-back-link {
        display:inline-block;
        margin-bottom: 18px;
        color:#2e7d32;
        font-weight:600;
        font-size: 13px;
        text-decoration:none;
    }
    .btn-back-link:hover { text-decoration: underline; }

    .error-msg {
        background:#fff3e0;
        border-left:4px solid #e53935;
        color:#c62828;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 14px;
        margin-bottom: 18px;
    }

    .form-group { margin-bottom: 18px; }

    .form-group label {
        display:block;
        font-size: 13px;
        font-weight:600;
        color:#2e7d32;
        margin-bottom:6px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .form-group input,
    .form-group textarea {
        width:100%;
        padding: 12px 14px;
        border: 2px solid #c8e6c9;
        border-radius: 10px;
        font-size: 15px;
        transition: 0.25s ease;
        background:#fbfdf8;
        font-family: inherit;
    }

    .form-group textarea { min-height: 90px; resize: vertical; }

    .form-group input:focus,
    .form-group textarea:focus {
        outline:none;
        border-color:#ffca28;
        box-shadow: 0 0 0 3px rgba(255,202,40,0.25);
        background:#ffffff;
    }

    .btn-simpan {
        width:100%;
        padding: 13px;
        border:none;
        border-radius: 10px;
        background: linear-gradient(120deg, #ffca28, #ffb300);
        color:#2e4d24;
        font-size: 16px;
        font-weight:700;
        letter-spacing: 0.5px;
        cursor:pointer;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
        box-shadow: 0 4px 10px rgba(255,179,0,0.35);
    }

    .btn-simpan:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(255,179,0,0.45); }
</style>
</head>
<body>

<div class="form-card">
    <div class="form-header">
        <div class="icon-circle">➕</div>
        <h1>Tambah Data Siswa</h1>
    </div>
    <div class="form-body">
        <a href="index.php" class="btn-back-link">⬅ Kembali</a>

        <?php if ($pesan_error): ?>
            <div class="error-msg"><?php echo htmlspecialchars($pesan_error); ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="number" id="nis" name="nis" placeholder="Masukkan NIS siswa" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama siswa" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" placeholder="Masukkan alamat siswa" required></textarea>
            </div>
            <button type="submit" name="simpan" class="btn-simpan">Simpan Data</button>
        </form>
    </div>
</div>

</body>
</html>
