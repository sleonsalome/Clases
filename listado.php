<?php
    require 'basepc2.php';
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado</title>
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

        <h1>Listado de alumnos</h1>

        <br>
        <a href="menu.php" role="button">Regresar</a>
        <br>

        <hr>

        <div class="table">
            <table id="tpeliculas" style="width:100%">
                <thead>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Curso</th>
                </thead>

                <tbody>
                <?php

                    $msql="SELECT * from datos";
                    $result=mysqli_query($conexion,$msql);

                    while ($mostrar=mysqli_fetch_array($result)) {

                ?>

                <tr style="text-align: center;">
                    <td><?php echo $mostrar['dni'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['apellido'] ?></td>
                    <td><?php echo $mostrar['email'] ?></td>
                    <td><?php echo $mostrar['curso'] ?></td>             
                </tr>
                
                <?php
                    }
                ?>
                </tbody>
                
            </table>
        </div>

    </body>
</html>