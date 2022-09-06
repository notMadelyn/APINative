<?php
 
$host_db = "localhost";
$user_db = "madelyn";
$pass_db = "1";
$database = "apinative";
 
$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $database);
 
if ($koneksi) {
    echo "berhasil";
}else{
    
    die(mysqli_connect_error());
}
// echo "berhasil konek";
 
?>