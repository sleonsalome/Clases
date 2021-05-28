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
  
  session_start();

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, usuario, contraseña FROM usuarios WHERE usuario=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && $_POST['password'] == $results['contraseña']) {
            $_SESSION['user_id'] = $results['id'];
            header("location: menu.php");
        } else {
            $message = 'El usuario o contraseña son incorrectos';
        
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <style>

        h1{
            text-align: center;
        }

        form{
            text-align: center;
        }


    </style>
</head>
<body>

    <h1>Incio de sesión</h1>
    <br>

    <?php if (!empty($message)): ?>
        <h2><?= $message ?></h2>
    <?php endif; ?>

    <form action="login.php" method="post" class="form-inline">

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-5">
                <input type="email" name="email" class="form-control" placeholder="Ingrese su email">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña:</label>
            <div class="col-sm-5">
                <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-5 offset-sm-2">
                <input type="submit" value="Ingresar" class="btn btn-primary" role="button">
            </div>
        </div>
       
    </form>
</body>
</html>