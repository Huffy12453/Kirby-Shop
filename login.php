<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email_login'];
    $password = $_POST['pass_login'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        
        if (password_verify($password, $usuario['password'])) {
            
            echo "<h2 style='color: rosybrown; font-family: sans-serif; text-align: center; margin-top: 50px;'>";
            echo "¡Bienvenido a Kirby Shop, " . $usuario['nombre'] . "! ";
            echo "</h2>";
            echo "<p style='text-align: center; font-family: sans-serif;'>Serás redirigido a la tienda en unos segundos...</p>";
            
            echo "<meta http-equiv='refresh' content='3;url=index.html'>";
            
        } else {
            echo "<h2 style='color: red; font-family: sans-serif; text-align: center; margin-top: 50px;'>";
            echo "Contraseña incorrecta.";
            echo "</h2>";
            echo "<p style='text-align: center; font-family: sans-serif;'>Regresando para que intentes de nuevo...</p>";
            
            echo "<meta http-equiv='refresh' content='3;url=registro.html'>";
        }
    } else {
        echo "<h2 style='color: red; font-family: sans-serif; text-align: center; margin-top: 50px;'>";
        echo "No existe una cuenta con ese correo.";
        echo "</h2>";
        echo "<p style='text-align: center; font-family: sans-serif;'>Regresando para que intentes de nuevo o te registres...</p>";
        
        echo "<meta http-equiv='refresh' content='3;url=registro.html'>";
    }
}
mysqli_close($conexion);
?>