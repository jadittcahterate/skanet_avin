<?php
include "../koneksi.php";
$id_nilai = $_GET['id_nilai'];

$stmt = mysqli_prepare($koneksi, "SELECT * FROM nilai WHERE id_nilai = ?");
mysqli_stmt_bind_param($stmt, "i", $id_nilai);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$data) { die("Data tidak ditemukan."); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Nilai - Skanet Avin</title>
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
        max-width: 480px;
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
    .form-group select {
        width:100%;
        padding: 12px 14px;
        border: 2px solid #c8e6c9;
        border-radius: 10px;
        font-size: 15px;
        transition: 0.25s ease;
        background:#fbfdf8;
        font-family: inherit;
        appearance: none;
    }

    .form-group select {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='9' viewBox='0 0 14 9'%3E%3Cpath fill='%232e7d32' d='M1 1l6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;
        padding-right: 36px;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline:none;
        border-color:#ffca28;
        box-shadow: 0 0 0 3px rgba(255,202,40,0.25);
        background-color:#ffffff;
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
        <h1>Edit Data Nilai</h1>
    </div>
    <div class="form-body">
        <a href="index.php" class="btn-back-link">⬅ Kembali</a>

        <form action="update.php" method="post">
            <input type="hidden" name="id_nilai" value="<?php echo htmlspecialchars($data['id_nilai']); ?>">

            <div class="form-group">
                <label for="nis">Siswa</label>
                <select id="nis" name="nis" required>
                    <?php
                    $q = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nama ASC");
                    while ($s = mysqli_fetch_assoc($q)) {
                        $sel = ($s['nis'] == $data['nis']) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($s['nis']) . '" ' . $sel . '>' . htmlspecialchars($s['nama']) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nip">Guru</label>
                <select id="nip" name="nip" required>
                    <?php
                    $q = mysqli_query($koneksi, "SELECT * FROM guru ORDER BY nama ASC");
                    while ($g = mysqli_fetch_assoc($q)) {
                        $sel = ($g['nip'] == $data['nip']) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($g['nip']) . '" ' . $sel . '>' . htmlspecialchars($g['nama']) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_mapel">Mata Pelajaran</label>
                <select id="id_mapel" name="id_mapel" required>
                    <?php
                    $q = mysqli_query($koneksi, "SELECT * FROM mapel ORDER BY mapel ASC");
                    while ($m = mysqli_fetch_assoc($q)) {
                        $sel = ($m['id_mapel'] == $data['id_mapel']) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($m['id_mapel']) . '" ' . $sel . '>' . htmlspecialchars($m['mapel']) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="number" id="nilai" name="nilai" min="0" max="100" value="<?php echo htmlspecialchars($data['nilai']); ?>" required>
            </div>

            <button type="submit" class="btn-simpan">Simpan</button>
        </form>
    </div>
</div>

</body>
</html>
