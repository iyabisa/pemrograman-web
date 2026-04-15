<?php
if (isset($_POST['ktp'])) {
    $nama = $_POST['ktp'];
    echo "KTP: " . htmlspecialchars($nama) . "<br>";
}
?>