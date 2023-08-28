<?php
$servername = "localhost";
$database = "cliente";
$username = "root";
$password = "";

//creando conexion
$conn = mysqli_connect($servername, $username, $password, $database);
//chequenado la conexion
if (!$conn) {
    die("conexion falló: " . mysqli_connect_error());
}


echo "<script type=\"text/javascript\">alert(\"Conectado Satisfactoriamente\");</script>";

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$Correo_Electronico = $_POST['Correo_Electronico'];

// enviando datos a la base de datos 

$sql = "INSERT INTO registrar (usuario, contrasena, Correo_Electronico) VALUES ('$usuario', '$contrasena', '$Correo_Electronico')";
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\">alert(\"Registro Guardado\");</script>";
} else {
    echo "Error: "  . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
// permite que se envie la informacion y regrese al formulario
echo "<meta http-equiv='refresh' content ='0; url=index_log.html'>"; // tiempo de espera