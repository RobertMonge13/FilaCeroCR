<?php

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != "administrador") {
    header("Location: ../iniciar_sesion.php");
    exit();
}

include("../conexion.php");


// CONSULTAR CLIENTES
$sql = "SELECT *
        FROM clientes
        ORDER BY nombre ASC";

$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestión de Clientes - FilaCeroCR</title>

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


    <div class="encabezado-flex">

        <div class="titulo-seccion">

            <h1>Gestión de Clientes</h1>

            <p>
                Consulta la información de los clientes
                registrados en FilaCeroCR.
            </p>

        </div>


        <a href="panel_admin.php"
           class="btn btn-outline">

            Volver al panel

        </a>

    </div>


    <div class="tarjeta"
         style="margin-bottom: 30px;">

        <h3>Clientes registrados</h3>

        <p>
            Desde esta sección puedes consultar
            los datos de los clientes que utilizan la plataforma.
        </p>

    </div>


    <div class="tabla-contenedor">

        <table>

            <tr>

                <th>ID</th>
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <th>Teléfono</th>

            </tr>


            <?php

            if ($resultado->num_rows > 0) {

                while ($row = $resultado->fetch_assoc()) {

                    echo "<tr>";

                    echo "<td>" .
                         $row['id_cliente'] .
                         "</td>";

                    echo "<td>" .
                         htmlspecialchars($row['nombre']) .
                         "</td>";

                    echo "<td>" .
                         htmlspecialchars($row['correo']) .
                         "</td>";

                    echo "<td>" .
                         htmlspecialchars($row['telefono']) .
                         "</td>";

                    echo "</tr>";
                }

            } else {

                echo "<tr>

                        <td colspan='4'>
                            No hay clientes registrados.
                        </td>

                      </tr>";
            }

            ?>

        </table>

    </div>


</div>


</body>

</html>