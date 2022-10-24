<?php
require 'functions.php';

if(isset($_POST['login'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result= mysqli_query($conn, "SELECT * FROM login WHERE username = '$username' ");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if( $password = $row["password"]){
            header("Location: dasboard.php");
        }

    }
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
            <h4>Login ke Pembayaran SPP</h4>
            <p>Halaman login pembayaran SPP SMK </p>
        </div>
        <div class="login-area">
            <input type="text" name="username" class="username" placeholder="Username">
            <input type="password" name="password" class="password" placeholder="Password">
            <input type="submit" name="login" value="Login" class="submit"> 
            
        </div>
    </form>
</body>
</html>