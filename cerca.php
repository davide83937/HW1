<?php

//session_start();
$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
//$username = $_SESSION["power_username"];
$parola = mysqli_real_escape_string($conn, $_GET['parola']);

$query = "SELECT *
          FROM VERSIONE_COMPONENTE
          WHERE Nome LIKE '$parola%' OR Nome_Modello LIKE '$parola%'";

$res = mysqli_query($conn, $query);

$post_array = array();
$i = 0;
while ($post_array[$i] = mysqli_fetch_assoc($res)){
    $i = $i + 1;
}

$json = json_encode($post_array);

echo $json;
?>