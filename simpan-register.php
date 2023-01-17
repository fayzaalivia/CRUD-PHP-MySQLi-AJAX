<?php

include('koneksi.php');

$nama         = $_POST['nama'];
$username     = $_POST['username'];
$password     = MD5($_POST['password']);

$query = "INSERT INTO tbl_users (nama, username, password) VALUES ('$nama', '$username', '$password')";        

if($connection->query($query)) {
    
    echo "success";

} else {
    
    echo "error";

}