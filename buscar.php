<?php
    $conexion=mysqli_connect('localhost','root','','peliculas');
?>

<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'peliculas';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password); 
    } catch (PDOException $e) {
        die('Connected failed: ' .$e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Buscar Películas</h1>
    <br>
    
    <form action="busqueda.php" method="post" class="form-inline">
        <input type="text" id="buscar" name="buscar">
        <input type="submit" id="consulta" name="consulta" value="Buscar" role="button">
    </form>
    
</body>
</html>