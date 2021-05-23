<?php

$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$username = mysqli_real_escape_string($conn, $_GET['user']);
$query = "SELECT Id_Cliente FROM CLIENTE WHERE Id_Cliente='$username'";
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