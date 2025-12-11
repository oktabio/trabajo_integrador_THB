<?php

class UserModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db; // Guarda la conexión a la base de datos
    }

    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->db->prepare($query); // Prepara la consulta para evitar inyecciones SQL
        $stmt->bindParam(':email', $email); // Asocia el parámetro
        $stmt->execute(); // Ejecuta la consulta
        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve el usuario como array asociativo
    }

    public function registerUser($username, $email, $telefono, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hashea la contraseña
        $rol = 2; // Rol de cliente por defecto
        $query = "INSERT INTO usuario (id_rol, nombre, email, telefono, password) VALUES (:role, :username, :email, :telefono, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':role', $rol);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':password', $hashedPassword);
        return $stmt->execute(); // Devuelve true si la inserción fue exitosa
    }
}
