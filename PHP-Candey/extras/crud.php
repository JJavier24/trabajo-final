<?php

//session_start();

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'php_db_login';

$database = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

//Create
if (isset($_POST['create'])) {

    $codigo = mysqli_real_escape_string($database, $_POST['codigo']);
    $nombre = mysqli_real_escape_string($database, $_POST['nombre']);
    $precio = mysqli_real_escape_string($database, $_POST['precio']);
    $cantidad = mysqli_real_escape_string($database, $_POST['cantidad']);

    //Me aseguro que se llenen los campos
    if (!empty($codigo) && !empty($nombre) && !empty($precio) && !empty($cantidad)) {

        $sql = "INSERT INTO productos (codigo, nombre, precio, cantidad) VALUES ('$codigo', '$nombre', '$precio', '$cantidad')";
        mysqli_query($database, $sql);

        $_SESSION['sendMessage'] = 'Producto ha sido registrado con éxito!';
        header('location: ../inventario.php'); //Nos redirige a la pág Inventario

    } else {
        $mensaje = '¡Por favor. Ingrese todos los campos requeridos!';
    }
}

//Delete
if (isset($_GET['codigo'])) {

    $codigo = $_GET['codigo'];

    $sql = "DELETE FROM productos WHERE codigo= '$codigo'";
    mysqli_query($database, $sql);

    $_SESSION['sendMessage'] = 'Producto ha sido Eliminado con éxito!';
    header('location: ../inventario.php'); //Nos redirige a la pág Inventario

}

//Comprar en Carrito
if (isset($_POST['comprar'])) {
    
    $codigo = $_POST['varCodigo'];
    $contador = $_POST['contador'];

    if($contador > 0){
        $sql = "UPDATE productos SET cantidad = (cantidad-'$contador') WHERE codigo = '$codigo'";
        mysqli_query($database, $sql);

        $_SESSION['sendMessage'] = '¡Felicidades por su Compra!';

        unset($_SESSION['varCodigo']);

    } else {
        $_SESSION['sendMessage'] = '¡Debes comprar como mínimo un producto!';
    }
}
