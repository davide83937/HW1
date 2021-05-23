<?php

$conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');

$errori = array();

$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
$username = mysqli_real_escape_string($conn, $_POST['username']);

if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $username)){
    $errori[] = "Username non valido";
}else{
    $query = "SELECT Id_Cliente FROM Cliente WHERE Id_Cliente = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) == 1) {
                $errori[] = "Username già utilizzato";
     }
}

$password = mysqli_real_escape_string($conn, $_POST['password']);
if (strlen($password) < 8) {
    $errori[] = "Caratteri password insufficienti";
}

$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
if($password != $cpassword){
    $errori[] = "Le password inserite non sono uguali";
}

$password = password_hash($password, PASSWORD_BCRYPT);

$email = mysqli_real_escape_string($conn, $_POST['email']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errori[] = "Email non valida";
} else {
    $query = "SELECT email FROM cliente WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) == 1) {
        $errori[] = "Email già utilizzata";
    }
}


$cap = $_POST['cap'];
$via = mysqli_real_escape_string($conn, $_POST['via']);
$numero = $_POST['numero'];

if(count($errori)==0){
 
$query = "INSERT INTO CLIENTE  VALUES ('$username','$nome','$cognome','$password','$email','$cap','$via','$numero')";
$res = mysqli_query($conn, $query);
session_start();
$_SESSION['Reg'] = 'Registrazione avvenuta con successo';
header('Location: form_login.php');

}
else
{
    session_start();
    $_SESSION['Reg'] = $errori[0];
    header('Location: form_login.php');
}

mysqli_close($conn);
exit;

?>