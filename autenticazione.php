<?php


function check(){
    if(!isset($_SESSION['power_username'])){
        if(isset($_COOKIE['power_user_cookie']) && isset($_COOKIE['power_id_cookie']) && isset($_COOKIE['power_token'])){
            $conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
            $cookieid = mysqli_real_escape_string($conn, $_COOKIE['power_id_cookie']);
            $userid = mysqli_real_escape_string($conn, $_COOKIE['power_user_cookie']);

            $res = mysqli_query($conn, "SELECT* FROM COOKIES WHERE Id = '$cookieid' AND Cliente = '$userid'");
            if($cookie = mysqli_fetch_assoc($res)){
                if(time() > $cookie['Tempo']){
                    mysqli_query($conn, "DELETE * FROM COOKIES WHERE Id = '$cookieid'");
                    header("Location: logout.php");
                    exit;
                }else if(password_verify($_COOKIE['power_token'], $cookie['Has'])){
                    session_start();
                    $_SESSION['power_username'] = $_COOKIE['power_user_cookie'];
                    mysqli_close($conn);
                    return  $_SESSION['power_username'];
                }
            }
        }
    }
}
?>