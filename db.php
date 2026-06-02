<!-- ESTE ES EL ARCHIVO DE CONEXIÓN PDO CON LA BASE DE DATOS CREADA PARA ESTE PROYECTO. -->
<?php
require_once 'config.php';

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $error) {

    echo ("Error de conexión a la base de datos: " . $error->getMessage());
    exit;
}
?>
