<?php

    $message = '';

    if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['curso'])) {
        $sql = "INSERT INTO datos (dni, nombre, apellido, email, curso) VALUES (:dni, :nombre, :apellido, :email, :curso)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':dni', $_POST['dni']);
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':apellido', $_POST['apellido']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':curso', $_POST['curso']);

        if ($stmt->execute()) {
            $message = 'Datos guardados exitosamente';
        }else {
            $message = 'Hubo un error';
        }
    }
?>