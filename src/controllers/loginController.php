<?php
require_once __DIR__ . '/../models/userModel.php';

class LoginController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new UserModel($db); // Instancia el modelo con la conexión
    }

    public function login($email, $password)
    {
        $user = $this->userModel->getUserByEmail($email); // Busca el usuario


        if ($user && password_verify($password, $user['password'])) { //comprueba la contraseña con su hash
            session_start(); // Inicia la sesión
            $_SESSION['user_id'] = $user['id']; // Guarda el ID del usuario
            $_SESSION['user_role'] = $user['id_rol']; // Guarda el rol del usuario

            // Redirige según el rol (usar rutas relativas para evitar 404 si la app no está en la raíz)
            $this->redirectByRole($user['id_rol']);
        } else {

            header("Location: ./views/login.php?error=1"); // Redirige si falla
            exit;
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        // Redirigir al index después de cerrar sesión
        header("Location: ./index.php");
        exit;
    }

    public function redirectByRole($role)
    {
        switch ($role) {
            case 1:
                header("Location: ./views/admin/home.php");
                break;
            case 2:
                header("Location: ./views/client/home.php");
                break;
            default:
                echo "Rol de usuario no reconocido.";
                exit;
        }
        exit;
    }
}
