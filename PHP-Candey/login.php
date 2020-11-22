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
                <?= $mensaje ?>
            </p>
        <?php endif; ?>

        <?php if (isset($_SESSION['sendMessage'])) : ?>
            <p>
                <?php
                    echo $_SESSION['sendMessage'];
                    unset($_SESSION['sendMessage']);
                ?>
            </p>
        <?php endif; ?>

        <form action="" method="POST" class="form">
            <h2>Login</h2>
            <input type="text" name="email" placeholder="Usuario">
            <input type="password" name="pass" placeholder="Password">
            <button type="submit" name="ingresar">Ingresar</button>
        </form>

        <p>
            ¿No tienes una cuenta? Regístrate <a href="registro.php">Aquí</a>
        </p>
    </main>

    <<?php include('plantillas/footer.php') ?>

    <?php include('extras/function.php') ?>

</body>

</html>