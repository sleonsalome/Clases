<?php
    $nombre = '';

    if (!empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
?>


<html>
    <body>

        <?php if (!empty($nombre)): ?>
            <h1>Bienvenido, tu nombre es <?= $nombre ?></h1>
        <?php else: ?>
            
        <?php endif; ?>

        <form action="nombre.php" method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Ingrese su nombre">
            <input  type="submit" value="Registrar" role="button">
        </form>

    </body>
</html>