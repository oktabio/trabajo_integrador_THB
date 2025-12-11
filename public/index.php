<?php
session_start(); // SIEMPRE al inicio

require_once __DIR__ . '/../src/config/conexion.php';
$db = conectar();

$action = $_POST['action'] ?? $_GET['action'] ?? '';

require_once __DIR__ . '/../src/routes/auth.php';
require_once __DIR__ . '/../src/routes/web.php';
