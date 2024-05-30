<?php
// Verificar si se ha pasado el parámetro ID
if(isset($_GET['id'])) {
    // Obtener el ID del producto a eliminar
    $id = $_GET['id'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_register_db";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para eliminar el producto
    $sql = "DELETE FROM productos_carrito WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar de vuelta a la página principal
        header("Location:http://localhost/brokies/edit.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    echo "ID de producto no proporcionado.";
}
?>
