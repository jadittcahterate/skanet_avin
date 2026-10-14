<?php
include "../koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM siswa");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Siswa - Skanet Avin</title>
<style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

    body {
        min-height:100vh;
        background: linear-gradient(135deg, #fffde7 0%, #fff9c4 30%, #c8e6c9 70%, #81c784 100%);
        background-attachment: fixed;
        padding: 30px 16px;
    }

    .container { max-width: 1000px; margin: 0 auto; }

    .topbar {
        background: linear-gradient(120deg, #43a047, #2e7d32);
        border-radius: 18px;
        padding: 22px 28px;
        display:flex;
        justify-content: space-between;
        align-items:center;
        flex-wrap: wrap;
        gap: 12px;
        box-shadow: 0 10px 25px rgba(46,125,50,0.25);
        margin-bottom: 22px;
        border: 3px solid #ffd54f;
    }

    .topbar .brand { display:flex; align-items:center; gap:12px; }

    .topbar .brand .badge {
        width:44px; height:44px; background:#ffd54f; border-radius:50%;
        display:flex; align-items:center; justify-content:center; font-size:20px;
    }

    .topbar h1 { color:#fff; font-size:20px; font-weight:700; }

    .actions-bar {
        display:flex;
        gap:12px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .btn-link {
        display:inline-flex;
        align-items:center;
        gap:6px;
        padding: 10px 18px;
        border-radius: 10px;
        text-decoration:none;
        font-weight:600;
        font-size: 14px;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .btn-back {
        background:#ffffff;
        color:#2e7d32;
        border: 2px solid #a5d6a7;
    }

    .btn-back:hover { background:#e8f5e9; transform: translateY(-2px); }

    .btn-add {
        background: linear-gradient(120deg, #ffca28, #ffb300);
        color:#2e4d24;
        box-shadow: 0 4px 10px rgba(255,179,0,0.3);
    }

    .btn-add:hover { transform: translateY(-2px); box-shadow: 0 6px 14px rgba(255,179,0,0.4); }

    .card {
        background:#ffffff;
        border-radius: 16px;
        padding: 8px;
        box-shadow: 0 8px 20px rgba(76,175,80,0.15);
        border: 2px solid #dcedc8;
        overflow-x:auto;
    }

    table { width:100%; border-collapse: collapse; }

    thead th {
        background: linear-gradient(120deg, #66bb6a, #4caf50);
        color:#fff;
        padding: 12px 14px;
        text-align:left;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    thead th:first-child { border-radius: 10px 0 0 0; }
    thead th:last-child { border-radius: 0 10px 0 0; }

    tbody td {
        padding: 12px 14px;
        border-bottom: 1px solid #f1f8e9;
        font-size: 14px;
        color:#33691e;
    }

    tbody tr:hover { background:#fffde7; }
    tbody tr:last-child td { border-bottom:none; }

    .action-link {
        text-decoration:none;
        font-weight:600;
        font-size: 13px;
        padding: 5px 10px;
        border-radius: 7px;
        margin-right: 4px;
        display:inline-block;
    }

    .action-edit { background:#fff9c4; color:#f57f17; }
    .action-edit:hover { background:#ffecb3; }

    .action-hapus { background:#ffebee; color:#c62828; }
    .action-hapus:hover { background:#ffcdd2; }

    footer { text-align:center; margin-top:24px; font-size:12px; color:#558b2f; }
</style>
</head>
<body>

<div class="container">
    <div class="topbar">
        <div class="brand">
            <div class="badge">🧑‍🎓</div>
            <h1>Data Siswa</h1>
        </div>
    </div>

    <div class="actions-bar">
        <a href="../index.php" class="btn-link btn-back">⬅ Kembali ke Menu</a>
        <a href="tambah.php" class="btn-link btn-add">➕ Tambah Data</a>
    </div>

    <div class="card">
        <table>
            <tr><th>NIS</th><th>Nama</th><th>Alamat</th><th>Aksi</th></tr>
            <?php while ($data = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?php echo htmlspecialchars($data['nis']); ?></td>
                <td><?php echo htmlspecialchars($data['nama']); ?></td>
                <td><?php echo htmlspecialchars($data['alamat']); ?></td>
                <td>
                    <a href="edit.php?nis=<?php echo urlencode($data['nis']); ?>" class="action-link action-edit">Edit</a>
                    <a href="hapus.php?nis=<?php echo urlencode($data['nis']); ?>" class="action-link action-hapus" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <footer>&copy; <?php echo date("Y"); ?> Skanet Avin</footer>
</div>

</body>
</html>
