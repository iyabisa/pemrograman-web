<?php
define("PAJAK", 0.15);
$nama    = $_POST['nama'];
$nim     = $_POST['nim'];
$email   = $_POST['email'];
$layanan = $_POST['layanan'];
$barang_dipilih = isset($_POST['barang']) ? $_POST['barang'] : [];
$harga_list = [
    "Buku"   => 5000,
    "Pulpen" => 3000,
    "Pensil" => 2000
];

$subtotal = 0;
$detail_belanja = "";

if (!empty($barang_dipilih)) {
    foreach ($barang_dipilih as $item) {
        $qty = $_POST['qty_' . $item];
        $harga_item = $harga_list[$item] * $qty;
        $subtotal += $harga_item;
        $detail_belanja .= "$item ($qty pcs), ";
    }
}

if ($layanan == "Prioritas") {
    $biaya_layanan = 5000;
} else {
    $biaya_layanan = 0;
}
$total_pajak = $subtotal * PAJAK;
$total_akhir = $subtotal + $total_pajak + $biaya_layanan;

?>
