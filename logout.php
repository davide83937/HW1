<?php
session_start();
session_destroy();

if(isset($_COOKIE['power_user_cookie']) && isset($_COOKIE['power_id_cookie']) && isset($_COOKIE['power_token'])){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
    $cookieid = mysqli_real_escape_string($conn, $_COOKIE['power_id_cookie']);
    $userid = mysqli_real_escape_string($conn, $_COOKIE['power_user_cookie']);
    $res = mysqli_query($conn, "SELECT* FROM COOKIES WHERE Id = '$cookieid' AND Cliente = '$userid'");
    if($cookie = mysqli_fetch_assoc($res)){
       if(password_verify($_COOKIE['power_token'], $cookie['Has'])){
          mysqli_query($conn, "DELETE FROM COOKIES WHERE Id = $cookieid");
          mysqli_close($conn);
          setcookie("power_user_cookie", "");
          setcookie("power_id_cookie", "");
          setcookie("power_token", "");
       }
    }
}
mysqli_close($conn);
header("Location:form_login.php");
exit;
?>