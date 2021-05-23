<?php

header("Content-Type: application/json");

session_start();

$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$username = $_SESSION["power_username"];
$nome = mysqli_real_escape_string($conn, $_GET['nome']);

$img = mysqli_real_escape_string($conn, $_GET['img']);
$query1 = "SELECT Username, Nome FROM PREFERITI WHERE Username='$username' AND Nome='$nome'";
$query2 = "INSERT INTO PREFERITI VALUES ('$username','$nome')";
$query3 = "SELECT Immagine FROM  PREFERITI P JOIN VERSIONE_COMPONENTE VC 
ON P.Nome = VC.Nome WHERE P.Nome = '$nome'";
$res1 = mysqli_query($conn, $query1);

if(mysqli_num_rows($res1)>0){
    echo '1';
}else{
    $array1 = array(); $array3 = array(); $arraytot = array();
    $res2 = mysqli_query($conn, $query2);
    $res3 = mysqli_query($conn, $query3);
    $res1 = mysqli_query($conn, $query1);
    $array1 = mysqli_fetch_assoc($res1);
    $array3 = mysqli_fetch_assoc($res3);
    $arraytot = array(array_merge ($array1, $array3));
    $json = json_encode($arraytot);
    echo $json;
}

?>