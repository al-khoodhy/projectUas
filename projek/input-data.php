<?php
session_start();
require 'functions.php';
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
// cek apakah tombol ssumbit di tekan
$id = $_SESSION["id_admin"];
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
        <ul>
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
        <h2>Masukan Data Siswa</h2>
        <div class="background-form">
        <h3>Masukan Username dan Password</h3>
        <form action="akun-baru.php" method="post" class="input-siswa">
                
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" placeholder="Your Username..." required >
                
                    <label for="password">Password :</label>
                    <input type="text" name="password" id="password" placeholder="Your Password..." required>
                
            <button type="submit">Next and Save</button>
        </form>
        </div>
    </div>
</body>

</html>