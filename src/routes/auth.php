<?php

require_once __DIR__ . '/../controllers/authController.php';

$auth = new AuthController($db);

switch ($action) {
    case 'login':
        $auth->login($_POST['email'], $_POST['password']);
        break;
    case 'logout':
        $auth->logout();
        break;
    case 'registerUser':
        $auth->registerUser();
        break;
    default:
        // Acción por defecto para autenticación
        break;
        exit;
}
