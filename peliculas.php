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
        <title>Peliculas</title>
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

        <h1>Mis Películas</h1>

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