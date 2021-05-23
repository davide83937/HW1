<?php 
session_start();
$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$username = $_SESSION["power_username"];

$query = "SELECT ROUND(sum(VC.Prezzo), 2) as Totale
FROM CARRELLO C JOIN VERSIONE_COMPONENTE VC ON C.Componente = VC.Id_Versione
WHERE C.Cliente = '$username'
GROUP BY C.CLIENTE";

$res = mysqli_query($conn, $query);

$row = mysqli_fetch_row($res);

echo $row[0];

?>