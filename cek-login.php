<?php

session_start();

include('koneksi.php');

$username     = $_POST['username'];
$password      = MD5($_POST['password']);

$query  = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";
$result     = mysqli_query($connection, $query);
$num_row     = mysqli_num_rows($result);
$row         = mysqli_fetch_array($result);

if($num_row >=1) {
    
    echo "success";

    $_SESSION['id_user']       = $row['id_user'];
    $_SESSION['nama']          = $row['nama'];
    $_SESSION['username']      = $row['username'];

} else {
    
    echo "error";

}

?>