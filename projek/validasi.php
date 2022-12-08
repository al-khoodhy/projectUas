<?php 
session_start();
require 'functions.php';
if(!isset($_SESSION["login"]) || !isset($_SESSION["id_admin"])){
    header("Location: index.php");
    exit;
}


$id = $_SESSION["id_admin"];
$profil = query("SELECT * FROM data_user WHERE kd_user=$id")[0];
$data = query("SELECT * FROM data_user RIGHT JOIN spp ON data_user.nis=spp.kd_siswa");
if (isset($_POST["submit"])) {
    if (validasi($_POST) > 0) {
        echo "
        <script>
        alert('anda berhasil mengkonfirmasi spp!');
        document.location.href='validasi.php';
        </script>";
    } else {
        echo "<script>
            alert('anda gagal mengkonfirmasi spp!');
            document.location.href='halaman-utama.php';
            </script>";
    }
}

$jumperhalaman= 5;
$jumlahData = count(query("SELECT * FROM spp"));
$jumlahHalaman = ceil($jumlahData/$jumperhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumperhalaman * $halamanAktif) - $jumperhalaman;
$mahasiswa = query("SELECT * FROM data_user RIGHT JOIN spp ON data_user.nis=spp.kd_siswa LIMIT $awalData, $jumperhalaman");


$jumperhalaman= 5;
$jumlahData = count(query("SELECT * FROM spp"));
$jumlahHalaman = ceil($jumlahData/$jumperhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumperhalaman * $halamanAktif) - $jumperhalaman;
$mahasiswa = query("SELECT * FROM data_user RIGHT JOIN spp ON data_user.nis=spp.kd_siswa LIMIT $awalData, $jumperhalaman");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/projek/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
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
                <img src="/img/<?= $profil["gambar"];?>" alt="image" class="photo"></li>
                <h3><?= strtoupper($profil["nama"]); ?></h3>
               <h3><?= $profil["nis"];?></h3>
                </div>
                
                <li><a href="halaman-utama.php">Halaman Utama</a></li>
                <li><a href="validasi.php">Validasi</a></li>
                <li><a href="menu-input.php">Input Data</a></li>
        </ul>
    </nav>
        <img src="/img/garuda.png" alt="garuda" class="bg-content">

        <div class="box-wrap-content">
        <h2>Informasi Pembayaran Siswa</h2>
        <table class="spp-table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Tagihan</th>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Jumlah Pembayaran</th>
                <th>Status</th>
                <th>Bukti Pembayaran</th>
                <th>konfirmasi</th>
            </tr>
            <?php $no = 1;
            foreach ($mahasiswa as $siswa) : ?>
                <form action="" method="POST">
                    <tr>
                        <input type="hidden" name="id" value="<?= $siswa['nis']; ?>">
                        <input type="hidden" name="tgl" value="<?= $siswa['tgl_tagihan']; ?>">
                        <td><?= $no; ?></td>
                        <td><?= $siswa["nama"]; ?></td>
                        <td><?= $siswa["tgl_tagihan"]; ?></td>
                        <td><?= $siswa["kelas"]; ?></td>
                        <td><?= $siswa["semester"]; ?></td>
                        <td><?= $siswa["tagihan"]; ?></td>
                        <td>
                            <?php if ($siswa["status"] == "lunas") {
                                echo "Lunas";
                            } elseif (!empty($siswa["tgl_pembayaran"]) && !empty($siswa["bukti"])) {
                                echo "Proses";
                            } else {
                                echo "-";
                            }

                            ?></td>
                        <td>
                            <?php if (!empty($siswa["bukti"])) : ?>
                                <a href="/img/<?= $siswa["bukti"]; ?>"><img src="/img/<?= $siswa["bukti"]; ?>" alt="bukti"></a>
                            <?php else : ?>
                                <p style="text-align: center;">-</p>
                            <?php endif; ?>
                        </td>
                        <?php if(!empty($siswa["bukti"]) && $siswa["status"]== "proses") :?>
                        <td><input type="submit" value="Konfirmasi" name="submit" class="ftombol"></td>
                        <?php else :?>
                            <td><input type="submit" value="Konfirmasi" disabled class="ftombol"></td>
                            <?php endif; ?>
                    </tr>
                </form>
            <?php $no++;
            endforeach; ?>
        </table>
        <br>
        <?php if($halamanAktif > 1) :?>
            <a class="l-peg" href="?halaman=<?= $halamanAktif - 1;?>"> << </a>
            <?php endif; ?>
      
        <?php for ($i=1; $i <= $jumlahHalaman;  $i++) : ?>
           
            <?php if( $i == $halamanAktif) :?>
                <div class="col-peg-aktif">
                    <a class="num-peg" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                </div>
                <?php else : ?>
                    <div class="col-peg">
                        <a class="num-peg" href="?halaman=<?= $i; ?>" ><?= $i; ?></a>
                    </div>
                    <?php endif; ?>
                    
        <?php endfor;?>
        <?php if($halamanAktif < $jumlahHalaman) :?>
            <a class="r-peg" href="?halaman=<?= $halamanAktif + 1;?>"> >> </a>
            <?php endif; ?>
    </div>
</body>
</html>