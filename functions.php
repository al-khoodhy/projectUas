<?php
$conn= mysqli_connect("localhost","root","","sisteminformasi");

function query($query){
    // global digunakan untuk memberitahu bahwa variabel ini bukan variabel baru.
    global $conn;
    // query memiliki 2 parameter, 1.conek database 2. perintah sql
    $result= mysqli_query($conn,$query);
    // rows adalah array kosong 
    $rows=[];
    // while melakukan pengulangan untuk menampilkan semua data dalam data base berupa array assosiatif
    while($row=mysqli_fetch_assoc($result)){
    $rows[]=$row;
    }
    return $rows;
}
?>