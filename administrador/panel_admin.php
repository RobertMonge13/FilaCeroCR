<?php

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != "administrador") {
    header("Location: ../iniciar_sesion.php");
    exit();
}

include("../conexion.php");


// TOTAL DE CLIENTES
$sql_clientes = "SELECT COUNT(*) AS total FROM clientes";
$resultado_clientes = $conexion->query($sql_clientes);
$total_clientes = $resultado_clientes->fetch_assoc()['total'];


// TOTAL DE SERVICIOS
$sql_servicios = "SELECT COUNT(*) AS total FROM servicios";
$resultado_servicios = $conexion->query($sql_servicios);
$total_servicios = $resultado_servicios->fetch_assoc()['total'];


// TOTAL DE CITAS
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

    <title>Panel Administrativo - FilaCeroCR</title>

    <link rel="stylesheet"
          href="../css/estilos_generales.css">

</head>


<body>


<nav class="navbar">

    <a href="../index.php"
       class="logo">

        FilaCeroCR

    </a>


    <div class="nav-links">

        <a href="panel_admin.php">
            Inicio
        </a>

        <a href="servicios.php">
            Servicios
        </a>

        <a href="clientes.php">
            Clientes
        </a>

        <a href="citas.php">
            Citas
        </a>

        <a href="horarios.php">
            Horarios
        </a>

        <a href="../cerrar_sesion.php">
            Cerrar sesión
        </a>

    </div>

</nav>


<div class="contenedor">


    <div class="titulo-seccion">

        <h1>
            Panel Administrativo
        </h1>

        <p>
            Bienvenido,
            <?php
            echo htmlspecialchars($_SESSION['nombre']);
            ?>.
            Administra FilaCeroCR desde un solo lugar.
        </p>

    </div>


    <div class="tarjetas">


        <div class="tarjeta">

            <h3>Clientes</h3>

            <div class="numero">
                <?php echo $total_clientes; ?>
            </div>

            <p>
                Clientes registrados en la plataforma.
            </p>

            <a href="clientes.php"
               class="btn btn-outline">

                Ver clientes

            </a>

        </div>


        <div class="tarjeta">

            <h3>Servicios</h3>

            <div class="numero">
                <?php echo $total_servicios; ?>
            </div>

            <p>
                Servicios disponibles actualmente.
            </p>

            <a href="servicios.php"
               class="btn btn-outline">

                Gestionar servicios

            </a>

        </div>


        <div class="tarjeta">

            <h3>Citas</h3>

            <div class="numero">
                <?php echo $total_citas; ?>
            </div>

            <p>
                Citas registradas en el sistema.
            </p>

            <a href="citas.php"
               class="btn btn-outline">

                Gestionar citas

            </a>

        </div>


        <div class="tarjeta">

            <h3>Horarios</h3>

            <p>
                Configura la disponibilidad
                de los profesionales.
            </p>

            <a href="horarios.php"
               class="btn btn-outline">

                Gestionar horarios

            </a>

        </div>


    </div>


    <div style="margin-top: 40px;">

        <div class="tarjeta">

            <h3>Administración de FilaCeroCR</h3>

            <p>
                Desde este panel puedes administrar servicios,
                consultar clientes, controlar las citas registradas
                y gestionar la disponibilidad de horarios.
            </p>

        </div>

    </div>


</div>


</body>

</html>