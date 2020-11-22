<?php
include('../extras/crud.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manjari&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    <link rel="shortcut icon" href="../favicon/frijolitos-confitados.ico" type="image/x-icon">
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

        <form action="" method="POST" class="form">

            <h2>Registro de Productos</h2>
            <input type="text" name="codigo" placeholder="Código">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="precio" placeholder="Precio">
            <input type="text" name="cantidad" placeholder="Cantidad">
            <button type="submit" name="create">Registrar</button>
        </form>

    </main>

    <?php include('function.php') ?>

</body>

</html>