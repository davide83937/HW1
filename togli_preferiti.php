<?php

session_start();
$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$username = $_SESSION["power_username"];
$nome = mysqli_real_escape_string($conn, $_GET['nome']);
$query = "DELETE FROM PREFERITI WHERE Username = '$username' AND Nome = '$nome'";

$query1 = "SELECT Username, P.Nome, Immagine FROM PREFERITI P JOIN VERSIONE_COMPONENTE VC ON P.Nome = VC.Nome WHERE P.Username = '$username'";

$res = mysqli_query($conn, $query);
$res1 = mysqli_query($conn, $query1);

$post_array = array();
     $i = 0;
     while ($post_array[$i] = mysqli_fetch_assoc($res1)){
       $i = $i + 1;
     }

     $json = json_encode($post_array);

     echo $json;

?>