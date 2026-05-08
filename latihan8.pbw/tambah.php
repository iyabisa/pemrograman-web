<html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
    <link href="https://jsdelivr.net" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .kotak-form {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-top: 10px solid #007bff;
        }
        h4 { color: #007bff; font-weight: bold; margin-bottom: 25px; text-align: center; }
        .btn-simpan { background-color: #28a745; color: white; border: none; padding: 10px; width: 100%; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .btn-batal { background-color: #6c757d; color: white; text-decoration: none; display: block; text-align: center; padding: 10px; margin-top: 10px; border-radius: 5px; font-weight: bold; }
        label { font-weight: bold; margin-bottom: 5px; display: block; }
        .form-group { margin-bottom: 15px; }
        input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
    </style>
</head>
<body>

    <div class="container">
        <div class="kotak-form">
            <h4>Tambah Buku Baru</h4>
            <form action="proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" placeholder="Contoh: Pemrograman PHP" required>
                </div>

                <div class="form-group">
                    <label>Penulis</label>
                    <input type="text" name="penulis" placeholder="Nama penulis" required>
                </div>

                <div style="display: flex; gap: 15px;">
                    <div class="form-group" style="flex: 1;">
                        <label>Tahun Terbit</label>
                        <input type="number" name="tahun" placeholder="2024" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Stok</label>
                        <input type="number" name="stok" placeholder="0" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" placeholder="Masukkan harga (angka saja)" required>
                </div>

                <button type="submit" class="btn-simpan">Simpan Data</button>
                <a href="index.php" class="btn-batal">Batal</a>

            </form>
        </div>
    </div>

</body>
</html>
