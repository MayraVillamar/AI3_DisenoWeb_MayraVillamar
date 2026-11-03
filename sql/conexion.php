<?php
// Configuración de parámetros de conexión
$host     = 'localhost';
$dbname   = 'db_sistema_web';
$username = 'root';
$password = ''; // Ajustar según el entorno local (XAMPP/WAMP en blanco, MAMP/Docker 'root')
$charset  = 'utf8mb4';

$dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Manejo de excepciones
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Arrays asociativos
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Sentencias preparadas reales
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Log interno del error sin exponer credenciales a usuarios
    error_log("Error de conexión: " . $e->getMessage());
    die("Error crítico: No se pudo conectar a la base de datos.");
}
?>
