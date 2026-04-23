\<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Baru</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; }
        .kotak-tambah {
            max-width: 500px;
            margin: 60px auto;
            background: white;
            padding: 0;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header-kotak {
            background: #0d6efd;
            color: white;
            padding: 25px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="kotak-tambah">
        <div class="header-kotak">
            <h4 class="mb-0 fw-bold">📅 Tambah Jadwal Baru</h4>
            <small>Atur jadwal olahragamu hari ini</small>
        </div>
        
        <div class="card-body p-4">
            <form action="proses_tambah.php" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Hari</label>
                    <input type="text" name="hari" class="form-control form-control-lg" placeholder="Contoh: Senin" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Latihan</label>
                    <input type="text" name="latihan" class="form-control form-control-lg" placeholder="Contoh: Jogging / Gym" required>
                </div>

                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label fw-bold">Durasi (Menit)</label>
                        <input type="number" name="durasi" class="form-control form-control-lg" placeholder="30" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label fw-bold">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control form-control-lg" placeholder="Lapangan" required>
                    </div>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm">Simpan Jadwal</button>
                    <a href="index.php" class="btn btn-light border text-secondary">Batal / Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://jsdelivr.net"></script>
</body>
</html>
