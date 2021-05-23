<?php

$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$email = mysqli_real_escape_string($conn, $_GET['email']);
$query = "SELECT Email FROM CLIENTE WHERE Email='$email'";
$res = mysqli_query($conn, $query);
$n = mysqli_num_rows($res);

if($n > 0){
    echo '1';
}else{
    echo '0';
}

mysqli_close($conn);
exit;

?>