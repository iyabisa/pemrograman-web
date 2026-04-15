<html>
    <head>
        <title>Dokumen</title>
    </head>
    <body>
        <form action="" method="post">
            <input type ="text" name="nama" placeholder="Masukkan nama">
            <input type ="text" name="email" placeholder="Masukkan email">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>

<?php
if (isset($_GET['nama']) && isset($_GET['email'])) {
    $nama = $_GET['nama'];
    $email = $_GET['email'];
    echo "Nama: " . htmlspecialchars($nama) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
}