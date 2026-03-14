<html>
<html>
<head>
    <title>
  Diskon Pembayaran Mahasiswa
    </title>
</head>
<body>
    <h2>
        Form Pembayaran UKT Mahasiswa
    </h2>
    <form method="post" action="">
        NPM: <input type="text" name="npm" value="2410631170122">
        <br>
        <br>
        Nama: <input type="text" name="nama" value="Devika Lorensa">
        <br>
        <br>
        Prodi: <input type="text" name="prodi" value="Informatika">
        <br>
        <br>
        Semester: <input type="number" name="semester" value="4">
        <br>
        <br>
        Biaya UKT (Rp): <input type="number" name="ukt" value="6.200.000">
        <br>
        <br>
        <input type="submit" value="Proses">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $semester = $_POST['semester'];
        $ukt = $_POST['ukt'];

        if (!empty($npm) && !empty($nama) && !empty($prodi) && !empty($semester) && !empty($ukt)) {
            echo "<h3>Luaran yang diharuskan</h3>";
            echo "NPM : " . htmlspecialchars($npm) . "<br>";
            echo "NAMA : " . htmlspecialchars($nama) . "<br>";
            echo "PRODI : " . htmlspecialchars($prodi) . "<br>";
            echo "SEMESTER : " . $semester . "<br>";
            echo "BIAYA UKT : Rp " . number_format($ukt, 0, ',', '.') . "<br>";

            $diskon = 0;
            if ($ukt >= 5000000) {
                $diskon = 10;
                if ($semester > 8) {
                    $diskon = 15;
                }
            }

            $potongan = ($diskon / 100) * $ukt;
            $total_bayar = $ukt - $potongan;

            echo "DISKON : " . $diskon . "%<br>";
            echo "YANG HARUS DIBAYAR : Rp " . number_format($total_bayar, 0, ',', '.');
        } else {
            echo "Semua data harus diisi!";
        }
    }
    ?>
</body>
</html>