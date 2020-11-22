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

    <main class="main-contacto">
        <section class="sec-cont-info">
            <h2>Contacto</h2>

            <h3>Información de Contacto</h3>

            <h3>Sede Principal:</h3>
            <p>Lorem ipsum dolor sit amet.</p>

            <h3>Sucursal 1:</h3>
            <p>Lorem ipsum dolor sit amet.</p>

            <h3>E-mail:</h3>
            <p>Loremipsum@dolor.sit</p>
        </section>

        <section class="sec-cont-aside"> 
            <picture>
                <img src="img/tarro.png" alt="Tarro de dulces">
            </picture>
        </section>
    </main>

    <?php include('plantillas/footer.php') ?>

    <?php include('extras/function.php') ?>

</body>
</html>