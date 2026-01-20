<?php
// 1. Memulai Session
session_start();

// 2. Menghubungkan ke Database
include 'koneksi.php'; 

if (isset($_POST['login'])) {
    // Mengambil data dari form
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // 3. Logika Validasi Login: Cek ke tabel users
    $query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    // Jika data ditemukan (valid)
    if (mysqli_num_rows($result) === 1) {
        // 4. Membuat Session Login (Tiket Masuk)
        $_SESSION['login'] = true;
        $_SESSION['user_admin'] = $user;

        // Pindahkan ke halaman utama
        header("Location: index.php");
        exit;
    } else {
        // Jika tidak valid, buat variabel error
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS sederhana khusus halaman login agar rapi */
        body { font-family: Arial; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #555; }
        .error { color: red; font-size: 13px; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login Admin</h2>
    <p>Sistem Informasi Perpustakaan</p>

    <?php if(isset($error)) : ?>
        <p class="error">Username / Password Salah!</p>
    <?php endif; ?>

    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Masuk</button>
    </form>
</div>

</body>
</html>