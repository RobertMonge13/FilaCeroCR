<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}

if ($_SESSION['rol'] != "administrador") {
    header("Location: ../iniciar_sesion.php");
    exit();
}

include("../conexion.php");


// Cantidad de clientes
$sql_clientes = "SELECT COUNT(*) AS total FROM clientes";
$resultado_clientes = $conexion->query($sql_clientes);
$total_clientes = $resultado_clientes->fetch_assoc()['total'];


// Cantidad de servicios
$sql_servicios = "SELECT COUNT(*) AS total FROM servicios";
$resultado_servicios = $conexion->query($sql_servicios);
$total_servicios = $resultado_servicios->fetch_assoc()['total'];


// Cantidad de citas
$sql_citas = "SELECT COUNT(*) AS total FROM citas";
$resultado_citas = $conexion->query($sql_citas);
$total_citas = $resultado_citas->fetch_assoc()['total'];

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Panel Administrador - FilaCeroCR</title>

</head>

<body>

    <h1>Panel Administrativo - FilaCeroCR</h1>

    <h2>
        Bienvenido,
        <?php echo htmlspecialchars($_SESSION['nombre']); ?>
    </h2>

    <p>
        <a href="../cerrar_sesion.php">Cerrar Sesión</a>
    </p>


    <hr>


    <h2>Resumen General</h2>

    <p>
        Clientes registrados:
        <?php echo $total_clientes; ?>
    </p>

    <p>
        Servicios registrados:
        <?php echo $total_servicios; ?>
    </p>

    <p>
        Citas registradas:
        <?php echo $total_citas; ?>
    </p>


    <hr>


    <h2>Administración</h2>

    <ul>

        <li>
            <a href="servicios.php">
                Gestión de Servicios
            </a>
        </li>

        <li>
            <a href="clientes.php">
                Gestión de Clientes
            </a>
        </li>

        <li>
            <a href="citas.php">
                Gestión de Citas
            </a>
        </li>

        <li>
            <a href="horarios.php">
                Gestión de Horarios
            </a>
        </li>

    </ul>

</body>

</html>