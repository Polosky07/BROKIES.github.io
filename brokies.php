<?php

session_start();

if(!isset($_SESSION['usuario'])) {
    echo '
    <script> 

    alert("Por favor debes iniciar sesion");
    window.location = "http://localhost/brokies/login.php";

    </script> 
    
    ';
    session_destroy();
    die();
}
 
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Brokies</title>
    <link rel="stylesheet" href="brokies.css">
</head>
<body>
    <header class="header">
        <header class="header">
            <div class="menu container">
                <a href="#" class="logo">BROKIES</a>
                <input type="checkbox" id="menu" />
                <label for="menu">
            <img src="images/menu.png" class="menu-icono" alt="menu">
                </label>
            <nav class="navbar">
                <ul>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_1">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_2">Productos</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_3">Proximamente</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_4">Contactos</a></li>
                    <li class="nav-item"><a  href="agregar.php">ingresar productos</a></li>
                    <li class="nav-item"><a  href="admin.php">Modo administrador</a></li>
                    <li><a href="cerrar.php">cerrar sesion</a></li>
                </ul>
            </nav>
                  <div>
                    <ul>
                        <li class="submenu">
                            <img src="images/car.svg" id="img-carrito" alt="carrito">
                            <div id="carrito">
                                <table id="lista-carrito">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Precios</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a href="#" id="vaciar-carrito" class="btn-2">Vaciar Carrito</a>
                            </div>
                        </li>
                    </ul>
                  </div>
                </label>
            </div>
            <div class="header-content container">
                <div class="header-img">
                    <img src="images/right.png" alt="">
                </div>
                <div class="header-txt">
                    <h1>Ofertas especiales</h1>
                    <p>Estrena las mejores prendas</p>
                    <a href="#" class="btn-1">Informacion</a>
                </div>
            
            </div>
            
             </header>
    </header>

    <section class="ofert container" id="section_1">
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="images/f1.png" alt="">
            </div>
            <div class="ofert-txt">
                <h3>Producto 1</h3>
                <a href="#" class="btn-2">Informacion</a>
            </div>
        </div>
    
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="images/f2.png" alt=""> 
            </div>
            <div class="ofert-txt">
                <h3>Producto 2</h3>
                <a href="#" class="btn-2">Informacion</a>
            </div>
    
            <div class="ofert-1">
                <div class="ofert-img">
                    <img src="images/f3.png" alt="">
                </div>
                <div class="ofert-txt">
                    <h3>Producto 3</h3>
                    <a href="#" class="btn-2">Informacion</a>
                </div>
    </section>

    <section class="ofert product" id="section_2">
        <main class="products container" id="lista-1">

            <h2>Productos</h2>
        
            <?php
// Incluir el archivo de conexión
include 'conexion.php';

// Si se envió un formulario para insertar un nuevo producto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];

    // Manejar la subida de la imagen
    $imagen_nombre = $_FILES["imagen"]["name"];
    $imagen_temporal = $_FILES["imagen"]["tmp_name"];
    $ruta_imagen = "ruta/donde/guardar/tus/imagenes/" . $imagen_nombre;
    move_uploaded_file($imagen_temporal, $ruta_imagen);

    // Consulta SQL de inserción
    $sql_insert = "INSERT INTO productos_carrito (nombre, precio, imagen) VALUES ('$nombre', '$precio', '$ruta_imagen')";

    // Ejecutar la consulta SQL de inserción
    if ($conn->query($sql_insert) === TRUE) {
        echo "Producto insertado correctamente";
    } else {
        echo "Error al insertar producto: " . $conn->error;
    }
}

// Query para obtener productos del carrito
$sql = "SELECT * FROM productos_carrito";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output de los datos
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        // Agregamos una barra (/) al inicio de la ruta para que sea relativa al directorio raíz del servidor web
        echo "<img src='/" . $row["imagen"] . "' alt='" . $row["nombre"] . "'>";
        echo "<div class='product-txt'>";
        echo "<h3>" . $row["nombre"] . "</h3>";
        echo "<p>Precio: $" . $row["precio"] . "</p>";
        echo "<a href='#' class='agregar_carrito btn-2' data-id='" . $row["id"] . "'>Agregar al carrito</a>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>


        
            </div>
             
        </main>
    </section>

    <section class="blog container" id="section_3">
        <div class="blog-1">
            <img src="images/b1.jpg" alt="">
            <h3>
¡Próximamente! Prepárate para emocionarte con nuestra próxima colección de ropa nueva. Estamos trabajando duro para traerte lo último en moda y estilo. Desde prendas de vestir hasta accesorios, estamos preparando una selección que te dejará sin aliento. Mantente atento a nuestras redes sociales y sitio web para no perderte ninguna actualización. ¡Estamos ansiosos por compartirlo contigo!</h3>
            <p></p>
        </div>
    
        <div class="blog-1">
            <img src="images/b2.jpg" alt="">
            <h3>
¡Próximamente! Prepárate para caminar con estilo con nuestra próxima colección de zapatos nuevos. Estamos emocionados de presentarte una variedad de estilos que van desde elegantes tacones hasta cómodas zapatillas. Cada par está diseñado con atención al detalle y los mejores materiales para garantizar comodidad y estilo en cada paso que des. ¡Mantente atento a nuestras redes sociales y sitio web para no perderte ningún detalle!</h3>
            <p></p>
        </div>
    
        <div class="blog-1">
            <img src="images/b3.jpg" alt="">
            <h3>
¡Próximamente! Prepárate para elevar tu estilo con nuestra próxima colección de camisas nuevas. Desde elegantes camisas de vestir hasta camisetas casuales con estilo, estamos emocionados de presentarte una variedad de opciones que te harán destacar en cualquier ocasión. Con cortes modernos, telas de alta calidad y detalles únicos, cada camisa está diseñada para brindarte comodidad y estilo sin esfuerzo. ¡Mantente atento a nuestras redes sociales y sitio web para conocer todos los detalles y ser el primero en lucir nuestras últimas incorporaciones!</h3>
            <p></p>
        </div>
    </section>

    <footer class="footer">
    <div class="footer-content container">
        <div class="link">
            <h3 style="text-align: center;">Contactos Personales</h3>
            <ul>
                <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                <li><a href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
                <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> Correo</a></li>
            </ul>
        </div>
        <div class="link">
            <h3></h3>
            <ul>
                <li><a href="#"><i class="fas fa-user"></i> manuelpacheco_90</a></li>
                <li><a href="#"><i class="fas fa-phone"></i> +57 312 4105754</a></li>
                <li><a href="#"><i class="fas fa-user"></i> manuel.pacheco</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> menauel_pa@gmail.com</a></li>
            </ul>
        </div>
    </div>
</footer>


    <script src="tienda.js"></script>
</body>
</html>

