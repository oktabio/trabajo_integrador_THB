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
}
