<?php

session_start();

include 'conexion_be.php';

$email = $_POST['email'];
$password = $_POST['password'];
$password = hash('sha512', $password);


$validar_login = mysqli_query($conexion, "SELECT * FROM registrar WHERE email='$email' and password='$password'");


if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $email;
    header("location:http://localhost/brokies/brokies.php");
    exit;
} else {
    echo '
    <script> 

    alert("Usuario no existe, por favor verifique los datos introducidos");
    window.location = "http://localhost/brokies/login.php";
    

    </script> 

    ';
    exit;
}

?>