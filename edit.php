<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Cari data buku berdasarkan ID
$query = "SELECT * FROM buku WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Jika tombol update ditekan
if (isset($_POST['update'])) {
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $keterangan = $_POST['keterangan'];

    // Update data ke database
    $sql = "UPDATE buku SET 
            judul_buku = '$judul', 
            penulis = '$penulis', 
            keterangan = '$keterangan' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Data Buku Perpustakaan</h1>
    </header>

    <div class="content">
        <form action="" method="post">
            <label>Judul Buku:</label><br>
            <input type="text" name="judul_buku" value="<?= $row['judul_buku']; ?>" required><br><br>

            <label>Penulis (Ket. Tambahan):</label><br>
            <input type="text" name="penulis" value="<?= $row['penulis']; ?>" required><br><br>

            <label>Status/Keterangan:</label><br>
            <textarea name="keterangan" required><?= $row['keterangan']; ?></textarea><br><br>

            <button type="submit" name="update">Update Data</button>
            <a href="index.php">Batal</a>
        </form>
    </div>
</body>
</html>