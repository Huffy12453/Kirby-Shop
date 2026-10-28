<?php
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email_reg'];
    $password = $_POST['pass_reg'];

    $consulta_verificar = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado_verificar = mysqli_query($conexion, $consulta_verificar);

    if (mysqli_num_rows($resultado_verificar) > 0) {
        
        echo "<h2 style='color: red; font-family: sans-serif; text-align: center; margin-top: 50px;'>";
        echo "Error: Este correo ya está registrado en Kirby Shop.";
        echo "</h2>";
        echo "<meta http-equiv='refresh' content='3;url=registro.html'>";

    } else {
        
        $password_encriptada = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password_encriptada')";

        if (mysqli_query($conexion, $sql)) {
            
            echo "<h2 style='color: rosybrown; font-family: sans-serif; text-align: center; margin-top: 50px;'>";
            echo "¡Cuenta creada con éxito, " . $nombre . "! ";
            echo "</h2>";
            echo "<p style='text-align: center; font-family: sans-serif;'>Serás redirigido para iniciar sesión...</p>";
            
            echo "<meta http-equiv='refresh' content='3;url=registro.html'>";
            
        } else {
            echo "Error: " . mysqli_error($conexion);
        }
    }
}
mysqli_close($conexion);
?>