<?php
session_start();
$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$username = $_SESSION["power_username"];

$query = "SELECT count(*) FROM CARRELLO WHERE CLIENTE = '$username'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_row($res);

echo $row[0];
?>