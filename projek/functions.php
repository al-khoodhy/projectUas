<?php
$conn= mysqli_connect("localhost","root","","sisteminformasi");

function query($query){
    // global digunakan untuk memberitahu bahwa variabel ini bukan variabel baru.
    global $conn;
    // query memiliki 2 parameter, 1.conek database 2. perintah sql
    $result= mysqli_query($conn, $query);
    // rows adalah array kosong 
    $rows=[];
    // while melakukan pengulangan untuk menampilkan semua data dalam data base berupa array assosiatif
    while($row=mysqli_fetch_assoc($result)){
    $rows[]=$row;
    }
    return $rows;
}

function request($data){
    global $conn;
    $kelas = $data["kelas"];
    $tagihan = $data["tagihan"];
    $tgl_tagihan = $data["tgl_tagihan"];
    $seleksi = ("SELECT nis FROM data_user WHERE kelas = '$kelas'");

    $nis= query($seleksi);
    foreach ($nis as $baru) {
        $nis=$baru["nis"];
        $input=("INSERT INTO spp (`id`, `kd_siswa`, `tagihan`, `tgl_tagihan`, `tgl_pembayaran`, `status`, `bukti`) VALUES ('','$nis','$tagihan','$tgl_tagihan','','belum','')");
        mysqli_query($conn, $input);
        return mysqli_affected_rows($conn);
    }



     
}
function login($data){
    global $conn;error_reporting(0);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);

    if(isset($username)){
        if( $result=query("SELECT * FROM login WHERE username='$username' && password='$password'")[0]){
        var_dump($result);
            if($result["level_user"] === "admin"){
            $_SESSION["login"] = true;
            $_SESSION["id_admin"] = $result["id_login"];
            header("Location: halaman-utama.php");
        }
        elseif($result["level_user"] === "siswa") {
            $_SESSION["login"] = true;
            $_SESSION["id_siswa"] = $result["id_login"];
            header("Location: halaman-siswa.php");
         }}else{
            return [
            'error' => true,
            'pesan' => 'Username/Password yang anda masukan Salah'];
            }
        }
}

    function tambah($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $jenis_kelamain = htmlspecialchars($data["jenis_kelamin"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $semester = htmlspecialchars($data["semester"]);
    $kota = htmlspecialchars($data["kota"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $total = htmlspecialchars($data["total"]);
    $tahun_ajaran = htmlspecialchars($data["tahun_ajaran"]);
    $level_user = "siswa";


    $query1 = "INSERT INTO login VALUES('', '$username', '$password', '$level_user')"; 
    mysqli_query($conn, $query1);
    $lastdata = "SELECT * FROM login WHERE id_login IN (SELECT MAX(id_login) FROM login)";
    $id_login = query($lastdata)[0]["id_login"];
    
        // uploud gambar dan pindah ke folder
    $gambar = uploud();
    if(!$gambar){
    false;
    }

    $query2 = "INSERT INTO data_user VALUES('$id_login', '$nama', '$nis', '$jenis_kelamain', '$kota', '$tanggal','$kelas','$semester','$tahun_ajaran','$gambar')"; 
    mysqli_query($conn, $query2);

    $query3 = "INSERT INTO spp VALUES('', '$nis', '','$total','$tanggal','','belum','')";
    mysqli_query($conn, $query3);
    return mysqli_affected_rows($conn);
    }

    function uploud(){
        $ukuranFile = $_FILES['gambar']['size'];
        $namaFile = $_FILES['gambar']['name'];
        $error = $_FILES['gambar']['error'];
        $tmpName= $_FILES['gambar']['tmp_name'];

        // cek apakah gambar udah di uploud
        if($error === 4){
            echo "<script>
            alert('Pilih gambar dahulu!');
            </script>";
            return false;
        }
        // cek apakah yang diuploud adalah gambar
        $ekstensiGambarValid = ['jpg','png','jpeg'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script>
            alert('yang anda uploud bukan gambar');
            </script>";
            return false;
        }
        //  cek ukuran apa memenuni ukuran maks
        if($ukuranFile > 1000000 ){
            echo "<script>
            alert('ukuran gambar maks 1mb');
            </script>";
            return false;
        }
        // gambar siap di uploud
        // buat nama file gambar acak
        $namaGambarBaru =  uniqid();
        $namaGambarBaru .= '.';
        $namaGambarBaru .= "$ekstensiGambar";

        move_uploaded_file($tmpName, '/xampp/htdocs/img/'. $namaGambarBaru);
        return $namaGambarBaru;
        
    }

    function ajukan($data){
        global $conn;

        $tgl = $data['tgl'];
        $nis = $data["nis"];
        $jenis = $data["jenis"];
        $gambar = uploud();
        $today = date("Y/m/d");
        $spp = ("UPDATE spp SET jenis_pembayaran='$jenis', tgl_pembayaran='$today', bukti='$gambar', status='proses' WHERE kd_siswa='$nis' && tgl_tagihan='$tgl' ");
        mysqli_query($conn, $spp);
        return mysqli_affected_rows($conn);
    }

    function validasi($data){
        global $conn;
        
        $status = "lunas";
        $nis = $data["id"];
        $tgl = $data["tgl"];
        $change = "UPDATE spp SET status='$status' WHERE kd_siswa='$nis' && tgl_tagihan='$tgl'";
        mysqli_query($conn, $change);
        return mysqli_affected_rows($conn);
    }

    function ppdb($data){
        global $conn;
        
        $judul = htmlspecialchars($data["judul"]);
        $keterangan = htmlspecialchars($data["keterangan"]);
        $tipe = "p-ppdb";

        // uploud pdf
        $namaFile = $_FILES['data-pdf']['name'];
        $error = $_FILES['data-pdf']['error'];
        $tmpName= $_FILES['data-pdf']['tmp_name'];

        if($error === 4){
            echo "<script>
            alert('Pilih gambar dahulu!');
            </script>";
            return false;
        }
        // cek apakah yang diuploud adalah gambar
        $ukuranFile = $_FILES['data-pdf']['size'];
        $ekstensiGambarValid = ['pdf'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script>
            alert('yang anda uploud bukan pdf');
            </script>";
            return false;
        }
        //  cek ukuran apa memenuni ukuran maks
        if($ukuranFile > 100000 ){
            echo "<script>
            alert('ukuran gambar maks 1mb');
            </script>";
            return false;
        }
        move_uploaded_file($tmpName, '/xampp/htdocs/img/'. $namaFile);

        $query = "UPDATE db_pengumuman SET judul='$judul', keterangan='$keterangan', file='$namaFile' WHERE tipe='$tipe'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function info($data){
        global $conn;
        
        $judul = htmlspecialchars($data["judul"]);
        $keterangan = htmlspecialchars($data["keterangan"]);
        $tipe = htmlspecialchars($data["tipe"]);

        $query = "UPDATE db_pengumuman SET judul='$judul', keterangan='$keterangan' WHERE tipe='$tipe'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }