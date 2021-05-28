<?php
    $conexion=mysqli_connect('localhost','root','','peliculas');
?>

<?php
    $where="";

    if (isset($_POST['consulta'])) {
        $id=$_POST['buscar'];

        if (!empty($_POST['buscar'])) {
            $where="WHERE id = '$id'";
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
        </style>
    </head>
    <body>

        <table id="tbusqueda" style="width:100%">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Detalles</th>
            </thead>

            <tbody>
                <?php
                    
                    $msql="SELECT * from movies $where";
                    $result=mysqli_query($conexion,$msql);
                    if (mysqli_num_rows($result)==0) {
                        header("location: error.php");
                    }
        
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
        
    </body>
</html>