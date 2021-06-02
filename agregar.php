<?php
    require 'basepc2.php';
?>

<?php
    require 'insertar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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

    <h1>Registro de Alumnos</h1>

    <br>

    <?php if (!empty($message)): ?>
        <h2><?= $message ?></h2>
    <?php endif; ?>

    <br>

    <form action="agregar.php" method="post" class="form-inline">
        <div class="row g-2">
            <label class="col-sm-2 col-form-label">DNI:</label> <input  type="text" name="dni" class="form-control" placeholder="Ingrese un DNI">        

            <br>
            <br>

            <label class="col-sm-1 col-form-label">Nombre:</label>  <input  type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">
                
            <br>
            <br>
            
            <label class="col-sm-1 col-form-label">Apellido:</label>  <input  type="text" name="apellido" class="form-control" placeholder="Ingrese Apellido">
                
            <br>
            <br>

            <label class="col-sm-1 col-form-label">Email:</label>  <input  type="text" name="email" class="form-control" placeholder="Ingrese Email">
                
            <br>
            <br>

            <label class="col-sm-1 col-form-label">Curso:</label>  <input  type="text" name="curso" class="form-control" placeholder="Ingrese Curso">
                
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

    <br>
    <a href="menu.php" role="button">Regresar</a>
    <br>
    
</body>
</html>