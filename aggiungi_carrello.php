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

$query1 = "SELECT Quantita_Componente FROM VERSIONE_COMPONENTE WHERE Nome = '$nome' AND Nome_Modello = '$nomemodello'";
$res1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_row($res1);

$query2 = "SELECT Quantita_Venduta FROM VERSIONE_COMPONENTE WHERE Nome = '$nome' AND Nome_Modello = '$nomemodello'";
$res2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_row($res2);

$disponibilita = $row1[0]-$row2[0];

$query3 = "SELECT COUNT(*) as Numero
FROM   CARRELLO C JOIN VERSIONE_COMPONENTE VC ON C.Componente=VC.Id_Versione 
WHERE Cliente = '$username' AND VC.Id_Versione = '$id'
GROUP BY VC.Nome;";
$res3 = mysqli_query($conn, $query3);
$row3 = mysqli_fetch_row($res3);
$n_in_carrello = $row3[0];


if($disponibilita == $n_in_carrello){
    echo 1;
}else{
    $query6 = "INSERT INTO CARRELLO(Cliente, Componente) VALUES ('$username', '$id')";
    $res1 = mysqli_query($conn, $query6);
    echo 0;
}
?>