<?php
include "../koneksi.php";
$nip = $_GET['nip'];
$stmt = mysqli_prepare($koneksi, "SELECT * FROM guru WHERE nip = ?");
mysqli_stmt_bind_param($stmt, "s", $nip);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$data) { die("Data tidak ditemukan."); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Guru - Skanet Avin</title>
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

    .form-group input[readonly] {
        background: #f1f8e9;
        color: #7cb342;
        font-weight:600;
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
        <div class="icon-circle">✏️</div>
        <h1>Edit Data Guru</h1>
    </div>
    <div class="form-body">
        <form action="update.php" method="POST">
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" id="nip" value="<?php echo htmlspecialchars($data['nip']); ?>" readonly>
                <input type="hidden" name="nip" value="<?php echo htmlspecialchars($data['nip']); ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat"><?php echo htmlspecialchars($data['alamat']); ?></textarea>
            </div>
            <button type="submit" class="btn-simpan">Simpan</button>
        </form>
    </div>
</div>

</body>
</html>
