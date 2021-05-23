<?php
session_start();
$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$username = $_SESSION["power_username"];
$nome = mysqli_real_escape_string($conn, $_GET['nome']);
$nomemodello = mysqli_real_escape_string($conn, $_GET['nomeModello']);


$query = "SELECT Id_Versione FROM VERSIONE_COMPONENTE WHERE Nome = '$nome' AND Nome_Modello = '$nomemodello'";
$res = mysqli_query($conn, $query);
$row =  mysqli_fetch_row($res);
$id = $row[0];


if (isset($_GET['codice'])){
    $query0 = "DELETE FROM CARRELLO WHERE Cliente = '$username' AND Componente = '$id'";
    $res0 = mysqli_query($conn, $query0);
    echo 2;
    exit;
}

$query1 = "DELETE FROM CARRELLO WHERE Cliente = '$username' AND Componente = '$id' LIMIT 1";
$res1 = mysqli_query($conn, $query1);

$query3 = "SELECT COUNT(*) as Numero
FROM   CARRELLO C JOIN VERSIONE_COMPONENTE VC ON C.Componente=VC.Id_Versione 
WHERE Cliente = '$username' AND VC.Id_Versione = '$id'
GROUP BY VC.Nome;";
$res3 = mysqli_query($conn, $query3);
$row3 = mysqli_fetch_row($res3);
$row4 = mysqli_num_rows($res3);

if($row4 == 0){
    echo 0;
    exit;
}

echo $row3[0];

?>