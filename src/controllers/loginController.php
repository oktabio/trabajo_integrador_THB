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
        //password_verify($password, $user['password'])

        if ($user && $password === $user['password']) { //comprueba la contraseña con su hash
            session_start(); // Inicia la sesión
            $_SESSION['user_id'] = $user['id']; // Guarda el ID del usuario
            $_SESSION['user_role'] = $user['id_rol']; // Guarda el rol del usuario

            // Redirige según el rol (usar rutas relativas para evitar 404 si la app no está en la raíz)
            switch ($user['id_rol']) {
                case 1:
                    header("Location: ./views/admin.php");
                    break;
                case 2:
                    header("Location: ./views/client.php");
                    break;
                default:
                    header("Location: ./views/error.php");
            }
            exit;
        } else {
            // Redirige de forma relativa al directorio `public`
            header("Location: ./views/login.php?error=1"); // Redirige si falla
            exit;
        }
    }
}
