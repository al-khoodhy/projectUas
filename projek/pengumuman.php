<?php
session_start();
require 'functions.php';
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
$id = $_SESSION["id_siswa"];

$data = query("SELECT * FROM data_user WHERE kd_user=$id")[0];
$ket_jadwal = query("SELECT * FROM db_pengumuman WHERE tipe='p-jadwal'")[0];
$ket_pembayaran = query("SELECT * FROM db_pengumuman WHERE tipe='p-pembayaran'")[0];
$ket_ppdb = query("SELECT * FROM db_pengumuman WHERE tipe='p-ppdb'")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style2.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
    <img src="/img/garuda.png" alt="garuda" class="bg-content">
    <nav class="navbar">
        <label class="logo">MA AS-SALAM BANGKALAN</label>
        <ul class="kotak-keluar">
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>
    <nav class="sidebar">
        <ul class="kotak-samping">
            <div>
                <img src="/img/<?= $data["gambar"]; ?>" alt="image"></li>
                <h3><?= strtoupper($data["nama"]); ?></h3>
                <h3><?= $data["nis"]; ?></h3>
            </div>
            <li><a href="halaman-siswa.php">Halaman Utama</a></li>
            <li><a href="pengumuman.php">Pengumuman</a></li>
            <li><a href="Pembayaran.php">Pembayaran</a></li>
        </ul>
    </nav>
    <div class="box-wrap-content">

        <h2>Halaman Pengumuman</h2>
        <ul>
            <li class="margin-top"><label for="btn">1. <?= $ket_jadwal["judul"]; ?></label></li>
            <button id="btn1" class="p-rata">Show</button>
            <li>
                <div id="box1" class="box-pengumuman"><?= $ket_jadwal["keterangan"]; ?></div>
            </li>

            <li class="margin-top"><label for="btn" >2.<?= $ket_ppdb["judul"]; ?> </label></li>
            <button id="btn2" class="p-rata">Show</button>
            <li>
                <div id="box2" class="box-pengumuman"><?= $ket_ppdb["keterangan"]; ?></div>
                <a href="<?= $ket_ppdb["file"]; ?>" class="p-rata">Download</a>
            </li>
            
            

            <li class="margin-top"><label for="btn3" >3. <?= $ket_pembayaran["judul"]; ?></label></li>
            <button id="btn3" class="p-rata">Show</button>
            <li>
                <div id="box3" class="box-pengumuman"><?= $ket_pembayaran["keterangan"]; ?></div>
            </li>
        </ul>


    </div>

    <script>
        $(document).ready(function() {
            $('#btn1').click(function() {
                $('#box1').toggle();
            })
        });
        $(document).ready(function() {
            $('#btn2').click(function() {
                $('#box2').toggle();
            })
        });
        $(document).ready(function() {
            $('#btn3').click(function() {
                $('#box3').toggle();
            })
        });
    </script>
</body>

</html>