<?php

require_once __DIR__ . '/../controllers/adminController.php';
require_once __DIR__ . '/../controllers/clientController.php';

$admin = new adminController($db);
$client = new clientController($db);

if (!isset($_SESSION['user_role'])) {
    header("Location: ./views/inicio.php");
    exit;
}

if ($_SESSION['user_role'] === 1) {
    // Rutas para administradores
    switch ($action) {
        // Aquí puedes agregar más casos específicos para administradores
        case 'home':
            $admin->home();
            break;
        case 'showProducts':
            $admin->showProducts();
        case 'createProduct':
            $admin->createProduct();
            break;
        case 'removeProduct':
            if (isset($_POST['product_id'])) {
                $admin->removeProduct($_POST['product_id']);
            }
            break;
        default:
            // Acción por defecto para administradores
            break;
    }
} elseif ($_SESSION['user_role'] === 2) {
    // Rutas para clientes
    switch ($action) {
        // Aquí puedes agregar más casos específicos para clientes
        case 'home':
            $client->home();
            break;
        case 'showProducts':
            $client->showProducts();
            break;
        default:
            // Acción por defecto para clientes
            break;
    }
} else {
    header("Location: ./views/inicio.php");
    exit;
}
