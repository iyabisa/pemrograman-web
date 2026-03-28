<?php
$npm      = $_POST['npm'];
$nama     = $_POST['nama'];
$prodi    = $_POST['prodi'];
$semester = $_POST['semester'];
$ukt      = $_POST['ukt'];

$diskon = 0;

if ($ukt >= 5000000 && $semester > 8) {
    $diskon = 15;
} elseif ($ukt >= 5000000) {
    $diskon = 10;
}

$total_bayar = $ukt - ($ukt * $diskon / 100);
echo "<h3>Luaran yang diharuskan</h3>";
echo "NPM : $npm <br>";
echo "NAMA : $nama <br>";
echo "PRODI : $prodi <br>";
echo "SEMESTER : $semester <br>";
echo "BIAYA UKT : Rp. " . number_format($ukt, 0, ',', '.') . 
"<br>";
echo "DISKON : $diskon% <br>";
echo "YANG HARUS DIBAYAR : Rp. " . number_format($total_bayar, 0, ',', '.');
?>