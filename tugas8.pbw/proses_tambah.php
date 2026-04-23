<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hari = $_POST['hari'];
    $latihan = $_POST['latihan'];
    $durasi = $_POST['durasi'];
    $lokasi = $_POST['lokasi'];
    $stmt = $conn->prepare("INSERT INTO jadwal_olahraga (hari, nama_latihan, durasi_menit, lokasi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $hari, $latihan, $durasi, $lokasi);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data berhasil disimpan!";
    } else {
        $_SESSION['pesan'] = "Gagal: " . $stmt->error;
    }
    header("Location: index.php");
    exit();
}
?>
