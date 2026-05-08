<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM jadwal_olahraga WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['pesan'] = "Data berhasil dihapus!";
} else {
    $_SESSION['pesan'] = "Gagal: " . $stmt->error;
}
header("Location: index.php");
exit();
?>
