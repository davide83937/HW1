<?php

include 'autenticazione.php';
if(check()){
    header('Location: Home.php');
    exit;
}

session_start();
$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);



$query = "SELECT Id_Cliente, Pass FROM CLIENTE WHERE Id_Cliente = '$username'";
$res = mysqli_query($conn, $query);
$array = mysqli_fetch_assoc($res);

$n = mysqli_num_rows($res);

if(password_verify($_POST['password'], $array['Pass']) && $n == 1){
    if(isset($_POST['check']) && $_POST['check'] == 'Si') 
{
    $token = random_bytes(12);
    $hash = password_hash($token, PASSWORD_BCRYPT);
    $expires = strtotime("+7 day");
    $id = mysqli_insert_id($conn);
    $query1 = "INSERT INTO cookies VALUES('$username', '$id', '$hash', '$expires')";
    $res1 = mysqli_query($conn, $query1);
    setcookie("power_user_cookie", $username, $expires);
    setcookie("power_id_cookie", $id, $expires);
    setcookie("power_token", $token, $expires);
    
    $_SESSION["power_username"] = $array['Id_Cliente'];

}else{
    $_SESSION["power_username"] = $array['Id_Cliente'];
   }
}else{
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['errore'] = 'Username o password errati';
    header('Location: form_login.php');
    //echo 'Credenziali errate';
    exit;
}
header('Location: Home.php');
mysqli_close($conn);
exit;
?>