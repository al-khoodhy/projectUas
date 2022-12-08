<?php
session_start();
require 'functions.php';
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$id = $_SESSION["id_siswa"];

$data = query("SELECT * FROM data_user RIGHT JOIN spp ON data_user.nis= spp.kd_siswa WHERE kd_user=$id")[0];
$nis = $data["nis"];
$dataspp  = query("SELECT * FROM spp WHERE kd_siswa=$nis");
if (isset($_POST["kirim"])) {
    if (ajukan($_POST) > 0) {
        echo "
        <script>
        alert('anda berhasil memasukan data!');
        document.location.href='pembayaran.php';
        </script>";
    } else {
        echo "<script>
            alert('anda gagal memasukan data!');
            document.location.href='halaman-siswa.php';
            </script>";
    }
    error_reporting(0);
}
$jumperhalaman= 4;
$jumlahData = count(query("SELECT * FROM spp WHERE kd_siswa=$nis"));
$jumlahHalaman = ceil($jumlahData/$jumperhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumperhalaman * $halamanAktif) - $jumperhalaman;
$mahasiswa = query("SELECT * FROM spp WHERE kd_siswa=$nis LIMIT $awalData, $jumperhalaman");

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
<?php if (isset($_POST["bayar"])) : ?>
        <?php $tgl = $_POST["tgl"]; ?>
        <div class="box-spp">
            <div class="rata-tebal">Metode Pembayaran SPP</div>
            <table>
                <tr>
                    <td><label for="bank">Tranfer Bank</label></td>
                    <td>
                        <form action="" method="post">
                            <select name="bayar" id="bank">
                                <option value="BCA">Bank BCA</option>
                                <option value="BRI">Bank BRI</option>
                                <option value="BNI">Bank BNI</option>
                            </select>
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="<?= $tgl; ?>" name="tgl">
                    <td><input type="submit" name="pilih" value="Pilih" class="ftombol"></td>
                </tr>
                </form>



            </table>
        </div>
    <?php endif; ?>
    <?php if (isset($_POST["pilih"])) : ?>
        <?php $jenis = $_POST["bayar"]; ?>

        <?php if ($_POST["bayar"] === "BCA") : ?>
            <div class="box-spp">
                </table>
                <div class="rata-tebal">Informasi Detail Bank BCA</div>
                <table>
                    <tr>
                        <td>Atas nama :</td>
                        <td>PT Fliptech Lentera</td>
                    </tr>
                    <tr>
                        <td>Nomor rekening :</td>
                        <td>0500836334</td>
                    </tr>
                    <form action="pembayaran.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $jenis; ?>" name="jenis">
                        <input type="hidden" value="<?= $tgl; ?>" name="tgl">
                        <input type="hidden" value="<?= $nis; ?>" name="nis">
                        <tr>
                            <td>Uploud Bukti Tranfer</td>
                            <td><input type="file" name="gambar" required></td>
                        </tr>
                        <tr> 
                            <td><input type="submit" name="kirim" value="Ajukan bukti" class="ftombol"></td>
                        </tr>
                    </form>
                </table>
            </div>
        <?php endif; ?>
        <?php if ($_POST["bayar"] === "BRI") : ?>
            <div class="box-spp">
                <?php $jenis = $_POST["bayar"]; ?>
                </table>
                <div>Informasi Detail Bank BRI</div>
                <table>
                    <tr>
                        <td>Atas nama :</td>
                        <td>PT Fliptech Lentera</td>
                    </tr>
                    <tr>
                        <td>Nomor rekening :</td>
                        <td>0500836334</td>
                    </tr>
                    <form action="pembayaran.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $jenis; ?>" name="jenis">
                        <input type="hidden" value="<?= $tgl; ?>" name="tgl">
                        <input type="hidden" value="<?= $nis; ?>" name="nis">
                        <tr>
                            <td>Uploud Bukti Tranfer</td>
                            <td><input type="file" name="gambar"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="kirim" value="Ajukan bukti" class="ftombol"></td>
                        </tr>
                    </form>
                </table>
            </div>
        <?php endif; ?>
        <?php if ($_POST["bayar"] === "BNI") : ?>
            <div class="box-spp">
                <?php $jenis = $_POST["bayar"]; ?>
                </table>
                <div>Informasi Detail Bank BNI</div>
                <table>
                    <tr>
                        <td>Atas nama :</td>
                        <td>PT Fliptech Lentera</td>
                    </tr>
                    <tr>
                        <td>Nomor rekening :</td>
                        <td>0500836334</td>
                    </tr>
                    <form action="pembayaran.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $jenis; ?>" name="jenis">
                        <input type="hidden" value="<?= $tgl; ?>" name="tgl">
                        <input type="hidden" value="<?= $nis; ?>" name="nis">
                        <tr>
                            <td>Uploud Bukti Tranfer</td>
                            <td><input type="file" name="gambar"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="kirim" value="Ajukan bukti" class="ftombol"></td>
                        </tr>
                    </form>
                </table>
            </div>
        <?php endif; ?>
    <?php endif; ?>  

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
    <img src="/img/garuda.png" alt="garuda" class="bg-content">
    <div class="box-wrap-content">
        
        <h2>Pembayaran</h2>
        <div class="box-bayar"> 
            <div>Data Pembayaran Siswa</div>
            <table>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td><?= $data["tahun_ajaran"]; ?></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td><?= $data["nis"]; ?></td>
                </tr>
                <tr>
                    <td>TTL</td>
                    <td>Mojokerto, <?= $data["tanggal_lahir"]; ?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td><?= $data["nama"]; ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><?= $data["kelas"]; ?></td>
                </tr>
            </table>
        </div>


        <div class="box-bayar">
            <div>Tagihan Semester</div>
            <table>
                <tr>
                    <th class="rapi">No</th>
                    <th class="rapi">Total Tagihan</th>
                    <th class="rapi">Tanggal Tagihan</th>
                    <th class="rapi">Tanggal Pembayaran</th>
                    <th class="rapi">Jenis Pembayaran</th>
                    <th class="rapi">Keterangan</th>
                    <th class="rapi">Bayar</th>
                </tr>
                <?php $no = 1;
                foreach ($dataspp as $spp) : ?>
                    <tr>
                        <td class="rapi"><?= $no; ?></td>
                        <td class="rapi"><?= $spp["tagihan"]; ?></td>
                        <td class="rapi"><?= $spp["tgl_tagihan"]; ?></td>
                        <td class="rapi">
                            <?php
                            $tgl = $spp["tgl_pembayaran"];
                            if (empty($spp["tgl_pembayaran"])) {
                                echo "-";
                            } else {
                                echo "$tgl";
                            }
                            ?>
                        </td>
                        <td class="rapi">
                            <?php if (empty($spp["jenis_pembayaran"])) {
                                echo "-";
                            } else {
                                echo $spp["jenis_pembayaran"];
                            }
                            ?>
                        </td>
                        <td class="rapi">
                            <?php if ($spp["status"] == "lunas") {
                                echo "Lunas";
                            } elseif ($spp["status"] == "proses") {
                                echo "Proses";
                            } else {
                                echo "-";
                            }

                            ?>
                        </td>
                        <form action="pembayaran.php" method="post">

                            <input type="hidden" value="<?= $spp["tgl_tagihan"]; ?>" name="tgl">
                            <?php if($spp["status"] == "lunas") :?>
                            <td><input type="submit" value="Bayar" name="bayar" class="ftombol" disabled>
                            <?php else :?>
                                <td><input type="submit" value="Bayar" name="bayar" class="ftombol">
                                <?php endif; ?>
                            </form>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </table>
        </div>
        <?php if($halamanAktif > 1) :?>
            <a class="l-peg" href="?halaman=<?= $halamanAktif - 1;?>"> << </a>
            <?php endif; ?>
      
        <?php for ($i=1; $i <= $jumlahHalaman;  $i++) : ?>
           
            <?php if( $i == $halamanAktif) :?>
                <div class="col-peg-aktif">
                    <a class="num-peg" href="?halaman=<?= $i; ?>"><u><?= $i; ?></u></a>
                </div>
                <?php else : ?>
                    <div class="col-peg">
                        <a class="num-peg" href="?halaman=<?= $i; ?>" ><u><?= $i; ?></u></a>
                    </div>
                    <?php endif; ?>
                    
        <?php endfor;?>
        <?php if($halamanAktif < $jumlahHalaman) :?>
            <a class="r-peg" href="?halaman=<?= $halamanAktif + 1;?>"> >> </a>
            <?php endif; ?>
    </div>
</body>

</html>