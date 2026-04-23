<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $hari = $_POST['hari'];
    $latihan = $_POST['latihan'];
    $durasi = $_POST['durasi'];
    $lokasi = $_POST['lokasi'];
    $stmt = $conn->prepare("UPDATE jadwal_olahraga SET hari=?, nama_latihan=?, durasi_menit=?, lokasi=? WHERE id=?");
    $stmt->bind_param("ssisi", $hari, $latihan, $durasi, $lokasi, $id);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Jadwal berhasil diperbarui!";
    } else {
        $_SESSION['pesan'] = "Gagal update: " . $stmt->error;
    }
    
    header("Location: index.php");
    exit();
}
?>
