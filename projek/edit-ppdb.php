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
if(isset($_POST["submit"])){
    if(ppdb($_POST) > 0){
        echo "
        <script>
        alert('anda berhasil menguploud pengumuman!');
        document.location.href='edit-pengumuman.php';
        </script>";
    } else {
        echo "<script>
            alert('anda gagal menguploud dokumen');
            document.location.href='halaman-utama.php';
            </script>";
    }
}

$db_info=query("SELECT * FROM db_pengumuman WHERE tipe='p-ppdb'")[0];
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
        <h2>Halaman Perubahan informasi penerimaan peserta didik</h2>
        <form action="" method="post" enctype="multipart/form-data">
        <label for="judul" class="baris">Judul :</label>
        <input type="text" name="judul" id="judul" value="<?= $db_info["judul"]; ?>" class="fjudul">
        <label for="keterangan"class="baris">Keterangan :</label>
        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="fjudul"><?= $db_info["keterangan"]; ?></textarea>
        <label for="data-pdf">Uploud pdf :</label>
        <input type="file" name="data-pdf" id="data-pdf" size="50" class="baris">
        <button name="submit" class="baris">Uploud data</button>
        </form>
    </div>

</body>

</html>