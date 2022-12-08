<?php
session_start();
require 'functions.php';
if(isset($_SESSION['login'])){
    if(isset($_SESSION["id_admin"])){
        header("Location: halaman-utama.php");
    }else{header("Location: halaman-siswa.php");
        exit;
    }
}

if(isset($_POST['login'])){
    $login = login($_POST);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="overlay"></div>
    <form action="" method="post" class="box">
        <div class="header">
            <img src="/img/logo-garuda.jpg" alt="logo">
            <h1>User Login</h1>
            <?php if(isset($login['error'])) :?>
                <p style="font-style: italic; color:red;font-size:12px;"> <?= $login['pesan'];?> </p>
            <?php endif; ?>
        </div>
        <div class="login-area">
            <input type="text" name="username" class="username" placeholder="Username" autofocus autocomplete="off">
            <input type="password" name="password" class="password" placeholder="Password">
            <!-- <input type="checkbox" name="checkbox" id="checkbox" class="checkbox"><label for="checkbox" class="label">Remember me</label>
            <a href="#" name="forget" class="forget">Forget password?</a> -->
            <input type="submit" name="login" value="Login" class="submit">
            
        </div>
    </form>
</body>
</html>

