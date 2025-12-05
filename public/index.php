<?php
session_start(); // SIEMPRE al inicio

require_once __DIR__ . '/../src/config/conexion.php';
require_once __DIR__ . '/../src/controllers/loginController.php';
require_once __DIR__ . '/../src/controllers/registerController.php';

$db = conectar(); // Función que devuelve la conexión PDO
$controller = new LoginController($db);

// Si ya hay sesión activa, reutilizar el método del controlador
if (isset($_SESSION['user_role'])) {
  $controller->redirectByRole($_SESSION['user_role']);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="./assets/style.css">
  <title>The House Burger - Con Carrito</title>
</head>

<body>
  <header>the house burger</header>
  <nav class="menu">
    <div class="menu-item">Hamburguesas</div>
    <div class="menu-item">Papas Fritas</div>
    <div class="menu-item">Bebidas</div>
    <div class="menu-item">Postres</div>
  </nav>


  <main>

    Contenido principal
    <a href="./views/login.php">Log in</a>
    <a href="./views/register.php">Register</a>

  </main>
  <footer>Pie de página</footer>
  <div onclick="alert('¡Hola!')" style="cursor: pointer;">
    Haz clic en este texto
  </div>
</body>

</html>