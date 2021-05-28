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

<?php

    $message = '';

    if (!empty($_POST['nombre']) && !empty($_POST['detalles'])) {
        $sql = "INSERT INTO movies (nombre, detalles) VALUES (:nombre, :detalles)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':detalles', $_POST['detalles']);

        if ($stmt->execute()) {
            $message = 'Datos guardados exitosamente';
        }else {
            $message = 'Hubo un error';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }

        h1{
            text-align: center;
        }

    </style>
</head>
<body>

    <h1>Agregar Películas</h1>

    <br>

    <?php if (!empty($message)): ?>
        <h2><?= $message ?></h2>
    <?php endif; ?>

    <br>

    <form action="agregar.php" method="post" class="form-inline">
        <div class="row g-2">
            <label class="col-sm-2 col-form-label">Nombre:</label> <input  type="text" name="nombre" class="form-control" placeholder="Ingrese un nombre">        

            <br>
            <br>

            <label class="col-sm-1 col-form-label">Detalles:</label>  <input  type="text" name="detalles" class="form-control" placeholder="Ingrese detalles">
                
            <br>
            <br>

            <input type="submit" value="Agregar" role="button">
        </div>
    </form>

    <br>
    <hr>

    <div class="table">
        <table id="tpeliculas" style="width:100%">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Detalles</th>
            </thead>

            <tbody>
                <?php

                    $msql="SELECT * from movies";
                    $result=mysqli_query($conexion,$msql);

                    while ($mostrar=mysqli_fetch_array($result)) {

                ?>

                <tr style="text-align: center;">
                    <td><?php echo $mostrar['id'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['detalles'] ?></td>             
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
                
        </table>
    </div>
    
</body>
</html>