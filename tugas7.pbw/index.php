<html>
<head>
    <title>Tugas 7 PBW - Navigasi Include</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        nav { margin-bottom: 20px; padding: 10px; background: #eee; }
        .konten { border: 1px solid #ccc; padding: 15px; min-height: 100px; }
    </style>
</head>
<body>
    <h1>Tugas Praktikum</h1>
    <nav>
        <a href="index.php?menu=1">Soal 1</a> | 
        <a href="index.php?menu=2">Soal 2</a> | 
        <a href="index.php?menu=3">Soal 3</a> | 
        <a href="index.php?menu=4">Soal 4</a>
    </nav>
    <div class="konten">
        <?php
        $pilihan = isset($_GET['menu']) ? $_GET['menu'] : '';
        switch ($pilihan) {
            case '1':
                include 'soal1.php';
                break;
            case '2':
                include 'soal2.php';
                break;
            case '3':
                include 'soal3.php';
                break;
            case '4':
                include 'soal4.php';
                break;
            default:
                echo "<i>Silakan pilih menu di atas untuk menampilkan hasil jawaban.</i>";
                break;
        }
        ?>
    </div>

</body>
</html>
