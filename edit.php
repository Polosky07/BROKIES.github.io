<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td a {
            color: #007bff;
            color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    background: #232323;
        }
        td a:hover {
            text-decoration: underline;
        }
        .btn-back {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }

        button{
            background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Botón de "Ir Atrás" -->
<button onclick="goBack()">Ir Atrás</button>

<script>
// Función para ir atrás en la historia del navegador
function goBack() {
  window.history.back();
}
</script>
<h2>Lista de Productos</h2>
</table>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Producto</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Acciones</th> <!-- Nueva columna para las acciones -->
        </tr>
    </thead>
    <tbody>
        <?php
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

            // Consulta SQL para obtener los productos
            $sql = "SELECT id, nombre, precio, imagen FROM productos_carrito";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar los datos en la tabla
                while($row = $result->fetch_assoc()) {
        ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["precio"]; ?></td>
                        <td><?php echo $row["imagen"]; ?></td>
                        <td><a href="eliminar_producto.php?id=<?php echo $row["id"]; ?>">Eliminar</a></td> <!-- Enlace para eliminar -->
                    </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='5'>No hay productos disponibles</td></tr>";
            }
            // Cerrar conexión
            $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
