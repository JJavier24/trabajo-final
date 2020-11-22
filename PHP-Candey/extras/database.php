<?php

session_start();

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'php_db_login';

$database = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

$mensaje = '';


//Registro Personas
if (isset($_POST['registrar'])) {

    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = mysqli_real_escape_string($database, $_POST['pass']);
    $confirm = mysqli_real_escape_string($database, $_POST['confirm']);

    //Me aseguro que se llenen los campos
    if (!empty($email) && !empty($password) && !empty($confirm)) {

        //Si los campos de contraseña y confimar contraseña coinciden entonces...
        if ($password == $confirm) {

            $passwordX = md5($password); //Encriptar contraseña

            //Si el email contiene los carácteres (@admin.com) se hará el registro en la base de
            //datos de los Admin, sino se hará en la de Usuario común
            if (strpos($email, '@admin.com')) {

                $sql = "INSERT INTO admin (email, password) VALUES ('$email', '$passwordX')";
                mysqli_query($database, $sql);
            } else {
                $sql = "INSERT INTO users (email, password) VALUES ('$email', '$passwordX')";
                mysqli_query($database, $sql);
            }

            $_SESSION['sendMessage'] = '¡Usuario registrado con éxito!';
            header('location: login.php'); //Nos redirige a la pág login

        } else {
            $mensaje = 'Contraseñas no coinciden';
        }
    } else {
        $mensaje = '¡Por favor. Ingrese todos los campos requeridos!';
    }
}

//Login Personas
if (isset($_POST['ingresar'])) {

    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = mysqli_real_escape_string($database, $_POST['pass']);

    //Me aseguro que se llenen los campos
    if (!empty($email) && !empty($password)) {

        $passwordX = md5($password); //Encriptar contraseña

        //Si el email contiene los carácteres (@admin.com) se hará la búsqueda en la base de
        //datos de los Admin, sino se hará en la de Usuario común
        if (strpos($email, '@admin.com')) {

            $consulta = "SELECT * FROM admin WHERE email = '$email' AND password = '$passwordX'";
            $resultado = mysqli_query($database, $consulta);

            if (mysqli_num_rows($resultado) == 1) {

                $_SESSION['ingreso'] = true;
                $_SESSION['admin'] = true;

                header('location: inventario.php'); //Nos redirige a la pág inventario
    
            } else {
                $mensaje = '¡Error en las credenciales de inicio de sesión!';
            }

        } else {
            $consulta = "SELECT * FROM users WHERE email = '$email' AND password = '$passwordX'";
            $resultado = mysqli_query($database, $consulta);

            if (mysqli_num_rows($resultado) == 1) {

                $_SESSION['ingreso'] = true;
                $_SESSION['admin'] = false;

                header('location: index.php'); //Nos redirige a la pág principal
    
            } else {
                $mensaje = '¡Error en las credenciales de inicio de sesión!';
            }
        }

    } else {
        $mensaje = '¡Por favor. Ingrese todos los campos requeridos!';
    }
}

//salir
if (isset($_GET['salir'])) {

    $_SESSION['ingreso'] = false;

    session_destroy();
    unset($_SESSION['ingreso']);

    header('location: index.php');
}
