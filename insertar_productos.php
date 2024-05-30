<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    
    // Manejar la subida de la imagen
    $directorio_destino = "imgenes/ruta/donde/quieres/guardar/tus/imagenes";
    $imagen = $_FILES["imagen"]["name"];
    $tmp_name = $_FILES["imagen"]["tmp_name"];
    $ruta_destino = $directorio_destino . $imagen;

    // Crear el directorio si no existe
    if (!file_exists($directorio_destino)) {
        mkdir($directorio_destino, 0777, true);
    }

    // Mover el archivo cargado al directorio de destino
    if (move_uploaded_file($tmp_name, $ruta_destino)) {
        // Consulta SQL de inserción
        $sql_insert = "INSERT INTO productos_carrito (nombre, precio, imagen) VALUES (?, ?, ?)";
        
        // Preparar la consulta SQL
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("sds", $nombre, $precio, $ruta_destino);

        // Ejecutar la consulta SQL
        if ($stmt->execute()) {
           header("location:http://localhost/brokies/agregar.php");
        } else {
            echo "Error al insertar producto: " . $stmt->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}

$conn->close();
?>
