<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "sukses") {
    header('location: logout.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu Utama - Skanet Avin</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #fffde7 0%, #fff9c4 30%, #c8e6c9 70%, #81c784 100%);
        background-attachment: fixed;
        padding: 30px 16px;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
    }

    .topbar {
        background: linear-gradient(120deg, #43a047, #2e7d32);
        border-radius: 18px;
        padding: 22px 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        box-shadow: 0 10px 25px rgba(46, 125, 50, 0.25);
        margin-bottom: 28px;
        border: 3px solid #ffd54f;
    }

    .topbar .brand {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .topbar .brand .badge {
        width: 44px;
        height: 44px;
        background: #ffd54f;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .topbar h1 {
        color: #fff;
        font-size: 20px;
        font-weight: 700;
    }

    .topbar .welcome {
        color: #eafff0;
        font-size: 14px;
    }

    .topbar .welcome strong {
        color: #ffd54f;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 18px;
    }

    .menu-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 26px 18px;
        text-align: center;
        text-decoration: none;
        color: #2e7d32;
        box-shadow: 0 8px 20px rgba(76, 175, 80, 0.15);
        border: 2px solid #dcedc8;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .menu-card .emoji {
        font-size: 34px;
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #fff9c4, #dcedc8);
        border-radius: 50%;
    }

    .menu-card span.label {
        font-weight: 700;
        font-size: 16px;
        letter-spacing: 0.3px;
    }

    .menu-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 28px rgba(255, 179, 0, 0.25);
        border-color: #ffca28;
    }

    .menu-card.logout {
        color: #c62828;
    }

    .menu-card.logout .emoji {
        background: linear-gradient(135deg, #ffe0b2, #ffcdd2);
    }

    .menu-card.logout:hover {
        border-color: #ef5350;
        box-shadow: 0 14px 28px rgba(239, 83, 80, 0.25);
    }

    footer {
        text-align: center;
        margin-top: 32px;
        font-size: 12px;
        color: #558b2f;
    }
</style>
</head>
<body>

<div class="container">
    <div class="topbar">
        <div class="brand">
            <div class="badge">🎓</div>
            <h1>Menu Utama</h1>
        </div>
        <div class="welcome">Selamat datang, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></div>
    </div>

    <div class="menu-grid">
        <a href="siswa/" class="menu-card">
            <div class="emoji">🧑‍🎓</div>
            <span class="label">Siswa</span>
        </a>
        <a href="guru/" class="menu-card">
            <div class="emoji">👩‍🏫</div>
            <span class="label">Guru</span>
        </a>
        <a href="mapel/" class="menu-card">
            <div class="emoji">📚</div>
            <span class="label">Mapel</span>
        </a>
        <a href="nilai/" class="menu-card">
            <div class="emoji">📊</div>
            <span class="label">Nilai</span>
        </a>
        <a href="logout.php" class="menu-card logout">
            <div class="emoji">🚪</div>
            <span class="label">Logout</span>
        </a>
    </div>

    <footer>&copy; <?php echo date("Y"); ?> Skanet Avin &mdash; Sistem Informasi Nilai Siswa</footer>
</div>

</body>
</html>
