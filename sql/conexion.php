<?php
// Configuración de parámetros de conexión
$host     = 'localhost';
$dbname   = 'db_sistema_web';
$username = 'root';
$password = ''; // Ajustar según el entorno local (XAMPP/WAMP)
$charset  = 'utf8mb4';

$dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    error_log("Error de conexión: " . $e->getMessage());
    die("Error crítico: No se pudo conectar a la base de datos.");
}
?>
