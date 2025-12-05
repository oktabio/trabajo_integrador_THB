<?php
session_start();

require_once __DIR__ . '/../src/config/conexion.php';
require_once __DIR__ . '/../src/controllers/loginController.php';
require_once __DIR__ . '/../src/controllers/registerController.php';

$db = conectar();
$loginController = new LoginController($db);
$registerController = new RegisterController($db);

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginController->login($_POST['email'], $_POST['password']);
        }
        break;

    case 'logout':
        $loginController->logout();
        break;

    case 'registerUser':
        $registerController->register();
        break;

    default:
        header("Location: ./views/login.php?error=99");
        exit;
}
