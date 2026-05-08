<?php
define("PAJAK", 0.10);
$barang = [
    "keyboard" => 150000,
    "mouse"    => 100000,
    "monitor"  => 1200000
];

$namaBarang = "keyboard";
$jumlahBeli = 2;

$hargaSatuan = $barang[$namaBarang];
$totalSebelumPajak = $hargaSatuan * $jumlahBeli;
$pajak = $totalSebelumPajak * PAJAK;
$totalBayar = $totalSebelumPajak + $pajak;

echo "<h2>Perhitungan Total Pembelian (Dengan Array)</h2>";
echo "Nama Barang: $namaBarang <br>";
echo "Harga Satuan: Rp " . number_format($hargaSatuan, 0, ',', '.') . "<br>";
echo "Jumlah Beli: $jumlahBeli <br>";
echo "Total Harga (Sebelum Pajak): Rp " . number_format($totalSebelumPajak, 0, ',', '.') . "<br>";
echo "Pajak (10%): Rp " . number_format($pajak, 0, ',', '.') . "<br>";
echo "<b>Total Bayar: Rp " . number_format($totalBayar, 0, ',', '.') . "</b>";
?>