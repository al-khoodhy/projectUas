<?php
require 'functions.php';

if(isset($_POST['login'])){
    login($_POST);
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
    <form action="index.html" method="post" class="box">
        <div class="header">
            <h4>Login ke Pembayaran SPP</h4>
            <p>Halaman login pembayaran SPP SMK </p>
        </div>
        <div class="login-area">
            <input type="text" class="username" placeholder="Username">
            <input type="text" class="password" placeholder="Password">
            <input type="submit" value="Login" class="submit"> 
            
        </div>
    </form>
</body>
</html>