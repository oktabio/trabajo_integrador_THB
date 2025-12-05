<?php
function conectar()
{
    try {
        return new PDO("mysql:host=localhost;dbname=trabajo_final_db", "root", "");
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
