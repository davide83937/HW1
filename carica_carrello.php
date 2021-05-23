<?php
session_start();
$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$username = $_SESSION["power_username"];

$query = "SELECT COUNT(*) as Numero, VC.Nome, VC.Nome_Modello, VC.Prezzo, VC.Immagine, VC.Quantita_Componente, VC.Quantita_Venduta
FROM CARRELLO C JOIN VERSIONE_COMPONENTE VC ON C.Componente=VC.Id_Versione 
WHERE Cliente = '$username'
GROUP BY VC.Nome;";

$res = mysqli_query($conn, $query);

$post_array = array();
$i = 0;
while ($post_array[$i] = mysqli_fetch_assoc($res)){
    $i = $i + 1;
}

$json = json_encode($post_array);

echo $json;
?>