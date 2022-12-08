<?php
session_start();
require 'functions.php';
if(!isset($_SESSION["login"]) || !isset($_SESSION["id_admin"])){
    header("Location: index.php");
    exit;
}
// cek apakah tombol ssumbit di tekan
$id = $_SESSION["id_admin"];
if(!($id == $_SESSION["id_admin"])){
    header("Location: index.php");
    exit;
}
$profil = query("SELECT * FROM data_user WHERE kd_user=$id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <nav class="navbar">
        <label class="logo">MA AS-SALAM BANGKALAN</label>
        <ul class="kotak-keluar">
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>
    <nav class="sidebar">
        <ul class="kotak-samping">
            <div>
                <img src="/img/<?= $profil["gambar"]; ?>" alt="image"></li>
                <h3><?= strtoupper($profil["nama"]); ?></h3>
                <h3><?= $profil["nis"]; ?></h3>
            </div>

            <li><a href="halaman-utama.php">Halaman Utama</a></li>
            <li><a href="validasi.php">Validasi</a></li>
            <li><a href="menu-input.php">Input Data</a></li>
        </ul>
    </nav>
    <img src="/img/garuda.png" alt="garuda" class="bg-content">
    <div class="box-wrap-content">
        <h2>Menu Input Data Siswa</h2>
        <a href="edit-pengumuman.php"><div class="selection-box" >
            <i class="i-icon"></i>
            <h3>Edit Pengumuman</h3>
            <p>Menu untuk memperbaruai Pengumuman pada menu pengumuman di akun siswa</p>
        </div></a>

        <a href="input-data.php"><div class="selection-box">
            <i class="i-siswa-icon"></i>
            <h3>Input Data Siswa</h3>
            <p>Menu untuk menambahkan data siswa</p>
        </div></a>
        
        <a href="input-tagihan.php"> <div class="selection-box">
             <i class="val-icon"></i>
             <h3>Input Tagihan Spp</h3>
             <p>Menu untuk menentukan tagihan siswa</p>
        </div></a>
       
    </div>
</body>

</html>