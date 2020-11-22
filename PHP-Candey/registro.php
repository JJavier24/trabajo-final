<?php

include('extras/database.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('plantillas/head.php');?>
</head>

<body>

    <?php include('plantillas/header.php') ?>

    <main class="main-login">

        <?php if (!empty($mensaje)) : ?>
            <p>
                <?php echo $mensaje ?>
            </p>
        <?php endif; ?>

        <form action="" method="POST" class="form">
            <h2>Registro</h2>
            <input type="text" name="email" placeholder="Usuario">
            <input type="password" name="pass" placeholder="Password">
            <input type="password" name="confirm" placeholder="Confirmar Password">
            <button type="submit" name="registrar">Registrar</button>
        </form>

        <p>¿Ya eres un Usuario Registrado? <a href="login.php">Ingresa Aquí</a></p>

    </main>

    <?php include('plantillas/footer.php') ?>

    <?php include('extras/function.php') ?>

</body>

</html>