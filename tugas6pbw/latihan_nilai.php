<html>
<head>
    <title>Latihan Nilai</title>
</head>
<body>
    <h2>Form Input Nilai Mahasiswa</h2>

    <form method="post" action="">
        Nama: <input type="text" name="nama"><br>
        Nilai: <input type="number" name="nilai"><br>
        <input type="submit" value="Proses">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama  = htmlspecialchars($_POST['nama']);
        $nilai = (int)$_POST['nilai'];
        if ($nilai >= 85 && $nilai <= 100) {
            $predikat = "A";
        } elseif ($nilai >= 75 && $nilai <= 84) {
            $predikat = "B";
        } elseif ($nilai >= 65 && $nilai <= 74) {
            $predikat = "C";
        } elseif ($nilai >= 50 && $nilai <= 64) {
            $predikat = "D";
        } elseif ($nilai >= 0 && $nilai <= 49) {
            $predikat = "E";
        } else {
            $predikat = "Tidak valid";
        }
        if ($predikat == "A" || $predikat == "B" || $predikat == "C") {
            $status = "Lulus";
        } elseif ($predikat == "D" || $predikat == "E") {
            $status = "Tidak Lulus";
        } else {
            $status = "-";
        }
        echo "<div class='hasil'>";
        echo "Nama : $nama <br>";
        echo "Nilai : $nilai <br>";
        echo "Predikat : $predikat <br>";
        echo "Status : $status";
        echo "</div>";
    }
    ?>
</body>
</html>