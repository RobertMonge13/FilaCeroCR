<?php
session_start();
include("conexion.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    $sql = "SELECT id_usuario, nombre, contrasena, rol FROM usuarios WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $row = $resultado->fetch_assoc();
        
        if ($contrasena === $row['contrasena']) { 
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['rol'] = $row['rol'];

           if ($row['rol'] == "administrador") {

    header("Location: administrador/panel_admin.php");
    exit();

} else if ($row['rol'] == "profesional") {

    header("Location: panel_profesional.php");
    exit();

}
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "El usuario no existe.";
    }
    $stmt->close();
}
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - FilaCeroCR</title>
</head>
<body>
    <h2>Acceso Profesional - FilaCeroCR</h2>
    <?php if(!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form action="iniciar_sesion.php" method="POST">
        <label>Correo Electrónico:</label><br>
        <input type="email" name="correo" value="pro@filacero.com" required><br><br>
        
        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" value="1234" required><br><br>
        
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>