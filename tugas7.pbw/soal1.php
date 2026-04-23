<?php
$roda = 2; 

echo "<h4> Switch Case Kendaraan</h4>";
switch ($roda) {
    case 2:
        echo "Jumlah roda $roda adalah: <b>Motor</b>";
        break;
    case 4:
        echo "Jumlah roda $roda adalah: <b>Mobil</b>";
        break;
    default:
        echo "Jumlah roda tidak terdaftar.";
        break;
}
?>