<?php
 session_start();

 if(isset($_SESSION["power_username"])){
 
     header('Location:acquistii.html');
 
 }else{
 
     echo 0;
 
 }
 
?>