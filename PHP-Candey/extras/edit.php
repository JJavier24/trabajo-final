<?php
session_start();

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'php_db_login';

$database = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manjari&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    <link rel="shortcut icon" href="favicon/frijolitos-confitados.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Candey</title>
</head>

<body>
    <?php include('../plantillas/header.php') ?>

    <main class="main-login">

        <?php if (!empty($mensaje)) : ?>
            <p>
                <?= $mensaje ?>
            </p>
        <?php endif; ?>

        <form action="edit.php?codigo=<?php echo $_GET['codigo']; ?>" method="POST" class="form">

            <h2>Actualizar Productos</h2>
            <input type="text" name="codigo" placeholder="Código">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="precio" placeholder="Precio">
            <input type="text" name="cantidad" placeholder="Cantidad">
            <button type="submit" name="edit">Actualizar</button>
        </form>

    </main>

    <?php

    //Update
    if (isset($_GET['codigo'])) {

        $codigo = $_GET['codigo'];

        if (isset($_POST['edit'])) {

            $codigoN = mysqli_real_escape_string($database, $_POST['codigo']);
            $nombre = mysqli_real_escape_string($database, $_POST['nombre']);
            $precio = mysqli_real_escape_string($database, $_POST['precio']);
            $cantidad = mysqli_real_escape_string($database, $_POST['cantidad']);

            //Me aseguro que se llenen los campos
            if (!empty($codigoN) && !empty($nombre) && !empty($precio) && !empty($cantidad)) {

                $sql = "UPDATE productos set codigo = '$codigoN', nombre = '$nombre', precio = '$precio', cantidad = '$cantidad' WHERE codigo = '$codigo'";
                mysqli_query($database, $sql);

                $_SESSION['sendMessage'] = 'Producto ha sido Actualizado con éxito!';
                header('location: ../inventario.php'); //Nos redirige a la pág Inventario

            } else {
                $mensaje = '¡Por favor. Ingrese todos los campos requeridos!';
            }
        }
    }

    ?>

    <?php include('function.php') ?>

</body>

</html>