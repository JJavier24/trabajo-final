<?php

session_start();

if(!isset($_SESSION['ingreso']) && !isset($_SESSION['admin'])){
    header('Location: index.php');
}

include('extras/crud.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('plantillas/head.php') ?>
</head>

<body>
    <?php include('plantillas/header.php') ?>

    <main>
        <?php if (isset($_SESSION['sendMessage'])) : ?>
            <p>
                <?php
                    echo $_SESSION['sendMessage'];
                    unset($_SESSION['sendMessage']);
                ?>
            </p>
        <?php endif; ?>

        <section>
            
            <table class="tabla">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad a Comprar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    //Read
                    $sql = "SELECT * FROM productos";
                    $resultado = mysqli_query($database, $sql);

                    while ($fila = $resultado->fetch_assoc()) {

                        echo "<tr>";
                        echo "<td>"; echo $fila['nombre']; echo "</td>";
                        echo "<td>"; echo $fila['precio']; echo "</td>";
                        echo '<td><form action="" method="POST">
                        <input type="number" name="contador" placeholder="1-20" min="1" max="20">
                        <input type="hidden" name="varCodigo" value="'; echo $fila['codigo']; echo '">
                        <button type="submit" name="comprar" class="btn-comprar">Comprar</button></form></td>';
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </section>

    </main>

    <?php include('plantillas/footer.php') ?>

    <?php include('extras/function.php') ?>
</body>

</html>