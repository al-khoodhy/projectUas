<?php
session_start();
require 'functions.php';
if(!isset($_SESSION["login"]) || !isset($_SESSION["id_admin"])){
    header("Location: index.php");
    exit;
}

if(!isset($_POST["username"])){
    header("Location: input-data.php");
    exit;
}
// cek apakah tombol ssumbit di tekan
$id = $_SESSION["id_admin"];
$profil = query("SELECT * FROM data_user WHERE kd_user=$id")[0];
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('anda berhasil memasukan data!');
        document.location.href='input-data.php';
        </script>";
    } else {
        echo "<script>
            alert('anda gagal memasukan data!');
            document.location.href='input-data.php';
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
        <h2>Masukan Data Siswa</h2>
        <div class="background-form">
        <form action="" method="post" enctype="multipart/form-data" class="input-siswa">
            <input type="hidden" name="username" value="<?= $_POST['username'];?>">
            <input type="hidden" name="password" value="<?= $_POST['password'];?>">
            <label for="nama">Nama :</label>
            <input type="text" id="nama" name="nama" placeholder="Masukan Nama Siswa..." required>

            <label for="nis">Nis :</label>
            <input type="text" id="nis" name="nis" placeholder="Masukan Nis Siswa..." required>

            <div class="space">
            <label for="jenis">Jenis kelamin</label>
            <select name="jenis" id="jenis" >
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            </div>
            <div class="space">
            <label for="kelas">Kelas :</label>
            <select name="kelas" id="kelas">
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            </div>
            <label for="semester">Semester :</label>
            <select name="semester" id="semester">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <br>
            <label for="kota" class="clear">Kota :</label>
            <input type="text" id="kota" name="kota" placeholder="Masukan Kota Siswa..." required>

            <label for="tanggal">Tanggal lahir :</label>
            <input type="date" id="tanggal" name="tanggal"  required>

            <label for="tahun_ajaran">Tahun ajaran :</label>
            <input type="text" id="tahun_ajaran" name="tahun_ajaran" placeholder="Masukan Tahun ajaran..." required>

            <label for="total">Total tagihan :</label>
            <input type="text" id="total" name="total" placeholder="Masukan Tagihan siswa" required>

            <label for="gambar">gambar :</label>
            <input type="file" name="gambar" id="gambar" required>

            <button type="submit" name="submit">INPUT DATA</button>
        </form>
        </div>
    </div>
</body>

</html>