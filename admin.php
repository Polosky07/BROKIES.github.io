<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container,
.register-container {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
}

.register-link {
    text-align: center;
}

.register-link a {
    color: #007bff;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

</style>
<body>

<a href="brokies.php"><button>Ir Atrás</button></a>


    <div class="container">
        <div class="login-container">
            <form action="admin_login_be.php"  metod="POST" id="login-form">
                <h2>Hola admin inicia sesion</h2>

                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Ingresar</button>
            </form>
            <div class="register-link">
                <p>¿No tienes una cuenta? <a href="admin_register.php" id="register-link">Regístrate aquí</a></p>
            </div>
        </div>
        <div class="register-container" style="display: none;">
            <form id="register-form">
                <h2>Registrarse</h2>
                <input type="text" id="new-username" name="new-username" placeholder="Nuevo Usuario" required>
                <input type="password" id="new-password" name="new-password" placeholder="Nueva Contraseña" required>
                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
