<?php
session_start();
require 'functions.php';
if(!isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
$id = $_SESSION["id_admin"];
$profil = query("SELECT * FROM data_user WHERE kd_user=$id")[0];

if (isset($_POST["tambah"])) {
    if(request($_POST) > 0) {
        echo "
        <script>
        alert('anda berhasil memasukan tagihan spp!');
        document.location.href='menu-input.php';
        </script>";
    } else {
        echo "<script>
            alert('anda gagal memasukan tagihan!');
            document.location.href='halaman-utama.php';
            </script>";
    }
}
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
        <h2>Input Tagihan Semester</h2>
        
            <form action="" method="POST">
                <table class="spp-table">
                    <tr>
                        <td><label for="kelas">Kelas</label></td>
                        <td><select name="kelas" id="kelas" class="row">
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td><label for="tagihan" class="row">Tagihan</label>
                </td>
                    <td><input type="text" name="tagihan" class="row">
                </td>
                    </tr>
                    <tr>
                        <td><label for="tgl_tagihan" class="row">Tanggal tagihan</label>
                </td>
                <td><input type="date" name="tgl_tagihan"></td>
                    </tr>
                </table>
                <button type="submit" name="tambah" class="ftombol">Tambah</button>
            </form>
        
    </div>
</body>

</html>