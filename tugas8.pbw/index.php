<?php 
session_start();
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Olahraga Harian</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .wadah-utama { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-top: 50px; }
    </style>
</head>
<body>

<div class="container">
    <div class="wadah-utama">
        <h2 class="text-center mb-4">📅 Jadwal Olahraga Harian</h2>

        <?php if (isset($_SESSION['pesan'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['pesan']; unset($_SESSION['pesan']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col-md-6">
                <a href="tambah.php" class="btn btn-primary shadow-sm">+ Tambah Jadwal</a>
            </div>
            <div class="col-md-6">
                <form action="index.php" method="GET" class="d-flex gap-2">
                    <input type="text" name="cari" class="form-control" placeholder="Cari nama latihan..." value="<?= $_GET['cari'] ?? '' ?>">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Hari</th>
                        <th>Nama Latihan</th>
                        <th>Durasi (Min)</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cari = isset($_GET['cari']) ? "%".$_GET['cari']."%" : "%";
                    $stmt = $conn->prepare("SELECT * FROM jadwal_olahraga WHERE nama_latihan LIKE ?");
                    $stmt->bind_param("s", $cari);
                    $stmt->execute();
                    $res = $stmt->get_result();

                    if ($res->num_rows > 0) {
                        while($row = $res->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($row['hari']) ?></td>
                            <td><?= htmlspecialchars($row['nama_latihan']) ?></td>
                            <td class="text-center"><?= $row['durasi_menit'] ?></td>
                            <td><?= htmlspecialchars($row['lokasi']) ?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile;
                    } else {
                        echo "<tr><td colspan='5' class='text-center text-muted'>Data tidak ditemukan atau masih kosong.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://jsdelivr.net"></script>
</body>
</html>
