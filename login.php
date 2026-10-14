<?php
session_start();
include "koneksi.php";

$pesan_error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($koneksi, "SELECT * FROM users WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['status'] = "sukses";
        $_SESSION['username'] = $user['username'];
        header('location: index.php');
        exit();
    } else {
        $pesan_error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Login - Skanet Avin</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #fff9c4 0%, #ffe082 35%, #a5d6a7 70%, #4caf50 100%);
        background-attachment: fixed;
        padding: 20px;
    }

    .login-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(76, 175, 80, 0.25), 0 5px 15px rgba(255, 193, 7, 0.15);
        width: 100%;
        max-width: 400px;
        overflow: hidden;
        border: 3px solid #ffd54f;
    }

    .login-header {
        background: linear-gradient(120deg, #66bb6a, #43a047);
        padding: 30px 30px 25px;
        text-align: center;
        position: relative;
    }

    .login-header::after {
        content: "";
        position: absolute;
        bottom: -12px;
        left: 0;
        right: 0;
        height: 24px;
        background: #ffffff;
        border-radius: 50% 50% 0 0 / 100% 100% 0 0;
    }

    .login-header .icon-circle {
        width: 64px;
        height: 64px;
        margin: 0 auto 12px;
        background: #ffd54f;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .login-header h1 {
        color: #ffffff;
        font-size: 22px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .login-header p {
        color: #eafff0;
        font-size: 13px;
        margin-top: 4px;
    }

    .login-body {
        padding: 30px 32px 32px;
    }

    .error-msg {
        background: #fff3e0;
        border-left: 4px solid #e53935;
        color: #c62828;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 14px;
        margin-bottom: 18px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #2e7d32;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 14px;
        border: 2px solid #c8e6c9;
        border-radius: 10px;
        font-size: 15px;
        transition: 0.25s ease;
        background: #fbfdf8;
    }

    .form-group input:focus {
        outline: none;
        border-color: #ffca28;
        box-shadow: 0 0 0 3px rgba(255, 202, 40, 0.25);
        background: #ffffff;
    }

    .btn-login {
        width: 100%;
        padding: 13px;
        border: none;
        border-radius: 10px;
        background: linear-gradient(120deg, #ffca28, #ffb300);
        color: #2e4d24;
        font-size: 16px;
        font-weight: 700;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
        box-shadow: 0 4px 10px rgba(255, 179, 0, 0.35);
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 179, 0, 0.45);
        background: linear-gradient(120deg, #ffd54f, #ffa000);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .footer-note {
        text-align: center;
        margin-top: 20px;
        font-size: 12px;
        color: #7cb342;
    }
</style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <div class="icon-circle">🎓</div>
        <h1>Selamat Datang</h1>
        <p>Silakan masuk ke akun Anda</p>
    </div>
    <div class="login-body">

        <?php if ($pesan_error): ?>
            <div class="error-msg"><?php echo htmlspecialchars($pesan_error); ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" name="login" class="btn-login">Masuk</button>
        </form>

        <p class="footer-note">&copy; <?php echo date("Y"); ?> Skanet Avin</p>
    </div>
</div>

</body>
</html>
