<?php 

    session_start();
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
    $username = $_SESSION["power_username"];

    $query = "SELECT Cliente, Componente
    FROM CARRELLO 
    WHERE Cliente = '$username'";

    $res = mysqli_query($conn, $query);
    $array = array();
    $n = mysqli_num_rows($res);

    for($i = 0; $i < $n; $i++)
    {
       $array[$i] = mysqli_fetch_assoc($res);
    }
    


    for($u = 0; $u < $n; $u++){
       $componente = $array[$u]['Componente'];
       $query1 = "INSERT INTO ACQUISTO(Cliente, Componente, Data_) VALUES ('$username', '$componente', current_date())";
       $res1 = mysqli_query($conn, $query1);
    }

    echo 0;

?>