<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="registrar.css">
</head>
<body>
     
    <div class="wrapper">
        <form action="registro_usuario_be.php" method="POST">
            <h1>Registrar</h1>

            <div class="input-box">
                <input type="text" name="nombre_completo" placeholder="nombre completo" required>
                <i class="bx bxs-user"></i>
            </div>


            <div class="input-box">
                <input type="email" name="email" placeholder="email" required>
                <i class='bx bxs-user'></i>
            </div>
           
 <div class="input-box">
                <input type="text" name="usuario" placeholder="usuario" required>
                <i class="bx bxs-user"></i>
            </div>

            <div class="input-box">
             <input type="password" name="password" placeholder="contraseña" required>
             <i class='bx bxs-lock-alt'></i>
            </div>

          <button type="submit" name="registrar" class="btn">registrar</button>
          
        </form>

    </div>

    
</body>
</html>