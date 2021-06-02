<?php
    require 'basepc2.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
</head>
<body>

    <h1>Buscar Alumnos</h1>
    <br>

    <br>
    <a href="menu.php" role="button">Regresar</a>
    <br>
    <br>
    
    <form action="busqueda.php" method="post" class="form-inline">
        <input type="text" id="buscar" name="buscar">
        <input type="submit" id="consulta" name="consulta" value="Buscar" role="button">
    </form>
    
</body>
</html>