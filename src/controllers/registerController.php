<?php
require_once __DIR__ . '/../models/userModel.php';

class RegisterController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new UserModel($db); // Instancia el modelo con la conexión
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $telefono = trim($_POST['telefono']);
            $password = trim($_POST['password']);

            $success = $this->userModel->registerUser($username, $email, $telefono, $password);
            if ($success) {
                // Redirigir al login después del registro exitoso
                header("Location: ./views/login.php");
                exit;
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    }
}
