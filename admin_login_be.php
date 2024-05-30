<?php

session_start();

include 'conexion_be.php';

$email = $_POST['email'];
$password = $_POST['password'];



$validar_login = mysqli_query($conexion, "SELECT * FROM admin WHERE email='$email' and password='$password'");


if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $email;
    header("location:http://localhost/brokies/edit.php");
    exit;
} else {
    echo '
    <script> 

    alert("Usuario no existe, por favor verifique los datos introducidos");
    window.location = "http://localhost/brokies/admin.php";
    

    </script> 

    ';
    exit;
}

?>