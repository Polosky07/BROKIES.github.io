<?php

include 'conexion_be.php';

$email = $_POST['email'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];





$query = "INSERT INTO admin (email, usuario, password)
          VALUES('$email', '$usuario', '$password')";

//Verificar que el correo no se repita a la base de datos 
$verificar_correo = mysqli_query($conexion, "SELECT * FROM admin WHERE email='$email'");

if(mysqli_num_rows($verificar_correo) > 0 ) {
    echo '
    <script> 

    alert("Este correo ya esta registrado, intentalo con otro diferente");
    window.location = "http://localhost/brokies/admin_register.php";
    

    </script> 

    ';
    exit();

}

//Verificar que el usuario no se repita a la base de datos 
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM admin WHERE usuario='$usuario'");

if(mysqli_num_rows($verificar_usuario) > 0 ) {
    echo '
    <script> 

    alert("Este usuario ya esta registrado, intentalo con otro diferente");
    window.location = "http://localhost/brokies/admin_register.php";
    

    </script> 

    ';
    exit();

}


$ejecutar = mysqli_query($conexion, $query);

if($ejecutar) {
    echo '
    <script> 
    
    alert("Usuario almacenado exitosamente");
    window.location = "http://localhost/brokies/admin.php";
    
    </script>
    ';
} else {
echo '
    <script> 

    alert("Intentalo de nuevo, usuario no almacenado");
    window.location = "http://localhost/brokies/admin_register.php";
    
    </script>
';
}

mysqli_close($conexion);

?>