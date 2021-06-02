<?php
    require 'basepc2.php';
?>

<?php
    $where="";

    if (isset($_POST['consulta'])) {
        $id=$_POST['buscar'];

        if (!empty($_POST['buscar'])) {
            $where="WHERE dni = '$id'";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
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

        <h1>Resultados de búsqueda</h1>
        <br>
        <hr>
        <br>

        <table id="tbusqueda" style="width:100%">
            <thead>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Curso</th>
            </thead>

            <tbody>
                <?php
                    
                    $msql="SELECT * from datos $where";
                    $result=mysqli_query($conexion,$msql);
                    if (mysqli_num_rows($result)==0) {
                        header("location: error.php");
                    }
        
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

        <br>
        <a href="buscar.php" role="button">Regresar</a>
        <br>
        
    </body>
</html>