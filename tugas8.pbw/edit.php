<?php 
include 'koneksi.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM jadwal_olahraga WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
if (!$data) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card shadow p-4 mx-auto" style="max-width: 500px;">
        <h4 class="mb-3 text-center">Edit Jadwal Olahraga</h4>
        <form action="proses_edit.php" method="POST">
            <!-- ID disembunyikan agar bisa diproses UPDATE -->
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            
            <div class="mb-3">
                <label class="form-label">Hari</label>
                <input type="text" name="hari" class="form-control" value="<?= htmlspecialchars($data['hari']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Latihan</label>
                <input type="text" name="latihan" class="form-control" value="<?= htmlspecialchars($data['nama_latihan']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Durasi (Menit)</label>
                <input type="number" name="durasi" class="form-control" value="<?= $data['durasi_menit'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="<?= htmlspecialchars($data['lokasi']) ?>" required>
            </div>
            
            <button type="submit" class="btn btn-warning w-100 fw-bold">Update Jadwal</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Batal</a>
        </form>
    </div>
</body>
</html>
