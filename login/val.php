<?php
error_reporting(0);
session_start();
$con = new mysqli("localhost", "root", "", "cliente");
if ($con->connect_errno) {
    echo "Fallo al conectar MySql: (" . $con->connect_errno . ")" . $con->connect_errno;
    exit();
}

@mysqli_query($con, "SET NAME 'utf8'");

if ($_POST['usuario'] == null || $_POST['contrasena'] == null) {
    echo '<span> Por favor complete todos los campos. </span>';
} else {
    $user = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $consulta = mysqli_query($con, "SELECT * FROM login WHERE usuario = '$user' and contrasena = '$contrasena'");

    if (mysqli_fetch_array($consulta) > 0) {

        $_SESSION["usuario"] = $user;
        echo '<script>location.href = "../index.html"</script>';
    } else {
        echo '<span>El usuario y clave son incorrectos, vuelva a intentasrlo.</span>';
        echo '<script>location.href = "index_log.html"</script>';
    }
}
