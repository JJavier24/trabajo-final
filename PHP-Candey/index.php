<?php

include('extras/database.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('plantillas/head.php') ?>
</head>

<body>

    <?php include('plantillas/header.php') ?>

    <!-- En esta parte decidimos ocultar las 3 imágenes debido a que hacen parte de un Image Slider que queremos introducir, pero
         que aún no manejamos del todo bien, al ser relacinado directamente con JavaScript -->
    <section class="banner" hidden>
        <ul>
            <li><img src="img/candy-jar.jpg"  alt="Dulces"></li>
            <li><img src="img/caramels.jpg" alt="Caramelos"></li>
            <li><img src="img/gummibarchen.jpg" alt="Ositos de gomita"></li>
        </ul>
    </section>

    <main>
        <section class="welcome">
            <h2>¡Bienvenido una vez más!</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, quia?</p>
        </section>

        <section class="candyPacks">
        <h2>¡Dulces Combos!</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque, nostrum?</p>

            <article class="arti-1">
                <img src="img/combo-mix.jpg" id="toCarrito1" alt="Combo 1">
                <h3>Dulce 1</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia ab libero doloribus et nemo delectus aut quasi voluptates sint temporibus.</p>
            </article>

            <article class="arti-2">
                <img src="img/ballenitas.jpg" id="toCarrito2" alt="Combo 2">
                <h3>Dulce 2</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum provident minima placeat laudantium distinctio sequi? Provident ducimus dolorum amet nostrum.</p>
            </article>

            <article class="arti-3">
                <img src="img/huevitos.jpg" id="toCarrito3" alt="Combo 3">
                <h3>Dulce 3</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta accusantium nemo cupiditate ab vitae incidunt ducimus laboriosam ipsam ipsa temporibus.</p>
            </article>

            <article class="arti-4">
                <img src="img/gusanitos.jpg" id="toCarrito4" alt="Combo 4">
                <h3>Dulce 4</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit vel quas commodi iusto deleniti distinctio voluptatum exercitationem laudantium qui. Cupiditate.</p>
            </article>

            <article class="arti-5">
                <img src="img/corazon-azul.jpg" id="toCarrito5" alt="Combo 5">
                <h3>Dulce 5</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius explicabo velit numquam saepe laborum repellat laudantium blanditiis voluptate laboriosam id?</p>
            </article>
            
        </section>

    </main>

    <?php include('plantillas/footer.php') ?>

    <?php include('extras/function.php') ?>

</body>
</html>