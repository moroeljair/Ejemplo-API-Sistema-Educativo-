<?php
// Configuración de la base de datos
$host = 'localhost';      // Host de la base de datos
$db_name = 'bd_educativa'; // Nombre de la base de datos
$username = 'root';       // Usuario de la base de datos
$password = '';           // Contraseña (dejar vacío si no hay contraseña)

// Función para establecer la conexión
function getDBConnection() {
    global $host, $db_name, $username, $password;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit(); // Salir si hay error de conexión
    }
}
?>