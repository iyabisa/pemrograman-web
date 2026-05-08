<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: index.php");
    exit();
}
 
$error = '';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
 
    $akun = [
        'admin' => 'admin123',
        'user'  => 'user123'
    ];
 
    if (isset($akun[$username]) && $akun[$username] === $password) {
        $_SESSION['login']    = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jadwal Olahraga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
        }
        .login-header {
            background: #0d6efd;
            color: white;
            padding: 35px 30px 25px;
            text-align: center;
        }
        .login-header .icon {
            font-size: 50px;
            margin-bottom: 10px;
        }
        .login-body {
            padding: 35px 35px 30px;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.15);
        }
        .btn-login {
            background: #0d6efd;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0.5px;
            border-radius: 10px;
        }
        .btn-login:hover {
            background: #0b5ed7;
        }
        .input-group-text {
            background: #f0f4ff;
            border-right: none;
        }
        .form-control {
            border-left: none;
        }
        .form-label {
            font-weight: 600;
            color: #333;
        }
    </style>
</head>
<body>
 
<div class="login-box">
    <div class="login-header">
        <div class="icon"></div>
        <h4 class="fw-bold mb-1">Jadwal Olahraga Harian</h4>
        <small class="opacity-75">Silakan login untuk melanjutkan</small>
    </div>
 
    <div class="login-body">
        <?php if ($error): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2 py-2" role="alert">
                <span></span> <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
 
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text">👤</span>
                    <input type="text" name="username" class="form-control form-control-lg"
                           placeholder="Masukkan username"
                           value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                           required autofocus>
                </div>
            </div>
 
            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"></span>
                    <input type="password" name="password" class="form-control form-control-lg"
                           placeholder="Masukkan password" required>
                </div>
            </div>
 
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-login text-white">
                    Masuk
                </button>
            </div>
        </form>
 
        <hr class="my-4">
        <div class="text-center text-muted" style="font-size:13px;">
            <p class="mb-1"> <strong>Demo Akun:</strong></p>
            <p class="mb-0">Username: <code>admin</code> | Password: <code>admin123</code></p>
        </div>
    </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>