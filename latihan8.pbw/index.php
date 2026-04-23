<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Manajemen Data Buku</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Buku Baru</a>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $conn->query("SELECT * FROM buku");
                
                if ($res && $res->num_rows > 0) {
                    while($row = $res->fetch_assoc()) {
                        $stok = isset($row['stok']) ? $row['stok'] : (isset($row['Stok']) ? $row['Stok'] : '0');

                        echo "<tr>
                            <td>".htmlspecialchars($row['Judul'])."</td>
                            <td>".htmlspecialchars($row['Penulis'])."</td>
                            <td>".$row['Tahun_Terbit']."</td>
                            <td>Rp ".number_format($row['Harga'], 0, ',', '.')."</td>
                            <td>".$stok."</td>
                            <td>
                                <a href='edit.php?id=".$row['ID']."' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='hapus.php?id=".$row['ID']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Belum ada data buku.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://jsdelivr.net"></script>
</body>
</html>
