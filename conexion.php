<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "kirby_shop";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die("Fallo la conexión: " . mysqli_connect_error());
}
?>