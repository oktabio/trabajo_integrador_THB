<?php

class productModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertProduct($name, $description, $price)
    {
        $query = "INSERT INTO producto (nombre, descripcion, precio) VALUES (:name, :description, :price)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        return $stmt->execute();
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM producto";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM producto WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
