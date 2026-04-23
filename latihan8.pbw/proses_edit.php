<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id      = $_POST['id'];
    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun   = $_POST['tahun']; 
    $harga   = $_POST['harga'];
    $stok    = $_POST['stok'];
    $stmt = $conn->prepare("UPDATE buku SET Judul=?, Penulis=?, Tahun_Terbit=?, Harga=?, stok=? WHERE ID=?");
    $stmt->bind_param("ssidii", $judul, $penulis, $tahun, $harga, $stok, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal update: " . $stmt->error;
    }
}
?>
