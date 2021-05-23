<?php 

$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$query = "SELECT * FROM VERSIONE_COMPONENTE";
$res = mysqli_query($conn, $query);

$post_array = array();
$i = 0;
while ($post_array[$i] = mysqli_fetch_assoc($res)){
    $i = $i + 1;
}

$json = json_encode($post_array);

echo $json;

?>