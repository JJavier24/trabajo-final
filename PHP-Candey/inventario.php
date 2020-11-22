<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('Location: index.php');
}

include('extras/crud.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('plantillas/head.php');?>
</head>

<body>

    <?php include('plantillas/header.php') ?>

    <?php if (isset($_SESSION['sendMessage'])) : ?>
        <p>
            <?php
            echo $_SESSION['sendMessage'];
            unset($_SESSION['sendMessage']);
            ?>
        </p>
    <?php endif; ?>

    <table class="tabla">
        <thead>
            <th>Código</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th><a href="extras/altas.php"><button type="button" name="nuevo" class="btn-nuevo">Nuevo</button></a></th>
            <th></th>
        </thead>

        <?php

        //Read
        $sql = "SELECT * FROM productos";
        $resultado = mysqli_query($database, $sql);

        while ($fila = $resultado->fetch_assoc()) {

            echo "<tr>";
            echo "<td>"; echo $fila['codigo']; echo "</td>";
            echo "<td>"; echo $fila['nombre']; echo "</td>";
            echo "<td>"; echo $fila['precio']; echo "</td>";
            echo "<td>"; echo $fila['cantidad']; echo "</td>";
            echo '<td><a href="extras/edit.php?codigo='; echo $fila['codigo']; echo '"><button type="button" name="update" class="btn-update">Modificar</button></a></td>';
            echo '<td><a href="extras/crud.php?codigo='; echo $fila['codigo']; echo '"><button type="button" name="delete" class="btn-delete">Eliminar</button></a></td>';
            echo "</tr>";
        }
        ?>

    </table>

    <?php include('extras/function.php') ?>

</body>

</html>