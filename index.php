<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }
include 'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM buku");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sistem Informasi Data Buku Perpustakaan</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="logout.php">Logout (admin)</a></li>
        </ul>
    </nav>

    <div class="content">
        <h3>Tambah Data Buku</h3>
        <form action="tambah.php" method="post">
            <input type="text" name="judul" placeholder="Judul Buku" required>
            <input type="text" name="penulis" placeholder="Penulis" required>
            <button type="submit" name="simpan">Simpan</button>
        </form>

        <h3>Daftar Buku</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis (Ket. Tambahan)</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['judul_buku']; ?></td>
                <td><?= $row['penulis']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> | 
                    <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <footer>
        <p>&copy; 2026 UAS Pemrograman Website - Azzahra</p>
    </footer>
</body>
</html>