<?php
    $conexion=mysqli_connect('localhost','root','','prueba');
?>

<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'prueba';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password); 
    } catch (PDOException $e) {
        die('Connected failed: ' .$e->getMessage());
    }
?>