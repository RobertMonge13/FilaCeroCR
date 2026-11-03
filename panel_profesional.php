<?php

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != "profesional") {
    header("Location: iniciar_sesion.php");
    exit();
}

include("conexion.php");

$id_profesional = $_SESSION['id_usuario'];

$sql = "SELECT c.id_cita,
               cl.nombre AS cliente,
               s.nombre_servicio,
               c.fecha,
               c.hora,
               c.estado
        FROM citas c
        JOIN clientes cl
            ON c.id_cliente = cl.id_cliente
        JOIN servicios s
            ON c.id_servicio = s.id_servicio
        WHERE c.id_profesional = ?
        ORDER BY c.fecha ASC, c.hora ASC";

$stmt = $conexion->prepare($sql);

$stmt->bind_param(
    "i",
    $id_profesional
);

$stmt->execute();

$resultado = $stmt->get_result();

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Panel Profesional - FilaCeroCR</title>

    <link rel="stylesheet"
          href="css/estilos_generales.css">

</head>


<body>


<nav class="navbar">

    <a href="index.php"
       class="logo">

        FilaCeroCR

    </a>


    <div class="nav-links">

        <a href="panel_profesional.php">
            Mi agenda
        </a>

        <a href="index.php">
            Inicio
        </a>

        <a href="cerrar_sesion.php">
            Cerrar sesión
        </a>

    </div>

</nav>


<div class="contenedor">


    <div class="titulo-seccion">

        <h1>
            Panel Profesional
        </h1>

        <p>
            Bienvenido,
            <?php
                echo htmlspecialchars($_SESSION['nombre']);
            ?>.
            Consulta tus citas y agenda de atención.
        </p>

    </div>



    <div class="tarjetas"
         style="margin-bottom: 35px;">


        <div class="tarjeta">

            <h3>Mi agenda</h3>

            <p>
                Consulta las citas que tienes
                asignadas actualmente.
            </p>

        </div>


        <div class="tarjeta">

            <h3>Seguimiento</h3>

            <p>
                Revisa el estado de cada cita
                antes de iniciar la atención.
            </p>

        </div>


        <div class="tarjeta">

            <h3>FilaCeroCR</h3>

            <p>
                Mantén organizada tu agenda
                desde un solo lugar.
            </p>

        </div>


    </div>



    <div class="titulo-seccion">

        <h2>
            Agenda de citas asignadas
        </h2>

        <p>
            Estas son las reservaciones
            asociadas a tu perfil profesional.
        </p>

    </div>



    <div class="tabla-contenedor">

        <table>

            <tr>

                <th>ID Cita</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>

            </tr>


            <?php

            if ($resultado->num_rows > 0) {

                while ($row = $resultado->fetch_assoc()) {

                    echo "<tr>";


                    echo "<td>" .
                         $row['id_cita'] .
                         "</td>";


                    echo "<td>" .
                         htmlspecialchars($row['cliente']) .
                         "</td>";


                    echo "<td>" .
                         htmlspecialchars($row['nombre_servicio']) .
                         "</td>";


                    echo "<td>" .
                         $row['fecha'] .
                         "</td>";


                    echo "<td>" .
                         $row['hora'] .
                         "</td>";


                    echo "<td>";

                    echo "<strong>" .
                         htmlspecialchars($row['estado']) .
                         "</strong>";

                    echo "</td>";


                    echo "</tr>";
                }

            } else {

                echo "<tr>

                        <td colspan='6'>
                            No hay citas programadas actualmente.
                        </td>

                      </tr>";
            }

            ?>

        </table>

    </div>


</div>


</body>

</html>

<?php

$stmt->close();
$conexion->close();

?>