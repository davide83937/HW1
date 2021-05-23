<?php

$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$username = mysqli_real_escape_string($conn, $_GET['user']);
$password = mysqli_real_escape_string($conn, $_GET['pass']);
$email = mysqli_real_escape_string($conn, $_GET['email']);
$query = "INSERT INTO CLIENTE (Id_Cliente, Pass, Email) VALUES ('$username','$password','$email')";
$res = mysqli_query($conn, $query);
echo 'Ok';
mysqli_close($conn);


//INSERT INTO CLIENTE (Id_Cliente, Pass, Email) VALUES ('futy', 'fre', 'ds');

?>