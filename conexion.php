<?php
// Configuración de la base de datos
$host     = 'localhost';
$db_name  = 'contacto_db';
$user     = 'root'; // Cambia según tu config
$password = '';     // Cambia según tu config

// 1. Conexión a la base de datos con PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

