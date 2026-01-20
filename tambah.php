<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];

    $query = "INSERT INTO buku (judul_buku, penulis) VALUES ('$judul', '$penulis')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    }
}
?>