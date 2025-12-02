<?php
require_once __DIR__ . '/../src/config/conexion.php';
require_once __DIR__ . '/../src/controllers/loginController.php';

$db = conectar(); // Función que devuelve la conexión PDO
$controller = new LoginController($db);

// Comprobar que 'action' esté definido para evitar notices y errores
if (isset($_GET['action']) && $_GET['action'] === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $controller->login($_POST['email'], $_POST['password']);
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

    Contenido principal <a href="./views/login.php">Log in</a>

  </main>
  <footer>Pie de página</footer>
  <div onclick="alert('¡Hola!')" style="cursor: pointer;">
    Haz clic en este texto
  </div>
</body>

</html>