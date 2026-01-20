<?php
// 1. Memulai session agar bisa mengakses session yang aktif
session_start();

// 2. Menghapus semua data session yang tersimpan
session_unset();

// 3. Menghancurkan session secara permanen
session_destroy();

// 4. Mengarahkan kembali pengguna ke halaman login
header("Location: login.php");
exit;
?>