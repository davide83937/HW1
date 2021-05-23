<?php
session_start();

if(isset($_SESSION["power_username"])){

    header('Location:carrelloo.html');

}else{

    echo 0;

}

?>