<?php
session_start();

// Validasi Session: Jika belum login, tidak boleh menghapus dan dilempar ke login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

// Mengambil ID dari URL menggunakan metode GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perintah SQL untuk menghapus data berdasarkan ID
    $query = "DELETE FROM buku WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil hapus, langsung kembali ke halaman utama
        header("Location: index.php");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    // Jika tidak ada ID di URL, kembali ke index
    header("Location: index.php");
    exit;
}
?>