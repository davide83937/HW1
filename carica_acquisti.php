<?php
    session_start();
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
    $username = $_SESSION["power_username"];

    $query = "SELECT *
    FROM ACQUISTO A JOIN VERSIONE_COMPONENTE VC ON A.Componente = VC.Id_Versione
    WHERE A.Cliente = '$username'
    ORDER BY A.Data_ DESC";

    $res = mysqli_query($conn, $query);

    $post_array = array();
    $i = 0;
    while ($post_array[$i] = mysqli_fetch_assoc($res)){
        $i = $i + 1;
    }

    $json = json_encode($post_array);

    echo $json;
?>