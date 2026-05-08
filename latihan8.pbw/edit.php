<?php 
include 'koneksi.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM buku WHERE ID = ?");
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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <!-- Link Bootstrap Utama -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .kotak-edit {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 0; /* Padding diatur di card-body */
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            border: none;
        }
        .header-biru {
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card kotak-edit">
        <div class="header-biru">
            <h4 class="mb-0">Edit Data Buku</h4>
        </div>
        
        <div class="card-body p-4">
            <form action="proses_edit.php" method="POST">
                <!-- ID disembunyikan agar bisa diproses oleh UPDATE -->
                <input type="hidden" name="id" value="<?= $data['ID'] ?>">
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Judul Buku</label>
                    <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['Judul']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="<?= htmlspecialchars($data['Penulis']) ?>" required>
                </div>

                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label fw-bold">Tahun Terbit</label>
                        <input type="number" name="tahun" class="form-control" value="<?= $data['Tahun_Terbit'] ?>" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label fw-bold">Stok</label>
                        <?php $stok = isset($data['stok']) ? $data['stok'] : (isset($data['Stok']) ? $data['Stok'] : '0'); ?>
                        <input type="number" name="stok" class="form-control" value="<?= $stok ?>" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light">Rp</span>
                        <input type="number" name="harga" class="form-control" value="<?= (int)$data['Harga'] ?>" required>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning fw-bold">Update Data</button>
                    <a href="index.php" class="btn btn-outline-secondary">Batal / Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
