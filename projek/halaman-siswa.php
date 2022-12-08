<?php
session_start();
require 'functions.php';
$id = $_SESSION["id_siswa"];
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$data = query("SELECT * FROM data_user WHERE kd_user=$id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style2.css">
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
    <div class="content">
        <h2>Halaman Utama</h2>
        <p>Selamat Datang <?= $data["nama"]; ?> di Portal Akademik, Portal Akademik adalah sistem yang memungkinkan civitas akadamika MA AS-SALAM BANGKALAN untuk menerima informasi dengan lebih cepat malalui internet. Sistem ini diharapkan dapat memberikan kemudahan setiap civitas akademika untuk melakukan aktivitas-aktivitas akademik dan proses belajar mengajar. Slemat mengunakan fasilitas ini.</p>
    </div>
</body>

</html>