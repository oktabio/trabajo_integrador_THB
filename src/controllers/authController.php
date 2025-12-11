<?php

require_once __DIR__ . '/../controllers/loginController.php';
require_once __DIR__ . '/../controllers/registerController.php';

class AuthController
{
    private $db;
    private $loginController;
    private $registerController;

    public function __construct($db)
    {
        $this->db = $db;
        $this->loginController = new LoginController($db);
        $this->registerController = new RegisterController($db);
    }

    public function login()
    {
        $this->loginController->login($_POST['email'], $_POST['password']);
    }

    public function logout()
    {
        $this->loginController->logout();
    }

    public function registerUser()
    {
        $this->registerController->register();
    }
}
