<?php
session_start();

if(isset($_SESSION["power_username"])){

    echo $_SESSION["power_username"];

}else{

    echo 0;

}

?>