<?php

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != "administrador") {
    header("Location: ../iniciar_sesion.php");
    exit();
}

include("../conexion.php");


// ACTUALIZAR ESTADO DE LA CITA
if (isset($_POST['actualizar_estado'])) {

    $id_cita = $_POST['id_cita'];
    $estado = $_POST['estado'];

    $sql = "UPDATE citas
            SET estado = ?
            WHERE id_cita = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $estado, $id_cita);
    $stmt->execute();

    header("Location: citas.php");
    exit();
}


// CONSULTAR TODAS LAS CITAS
$sql = "SELECT c.id_cita,
               cl.nombre AS cliente,
               s.nombre_servicio,
               u.nombre AS profesional,
               c.fecha,
               c.hora,
               c.estado
        FROM citas c
        JOIN clientes cl
            ON c.id_cliente = cl.id_cliente
        JOIN servicios s
            ON c.id_servicio = s.id_servicio
        JOIN usuarios u
            ON c.id_profesional = u.id_usuario
        ORDER BY c.fecha ASC, c.hora ASC";

$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestión de Citas - FilaCeroCR</title>

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

            <h1>Gestión de Citas</h1>

            <p>
                Consulta y actualiza el estado
                de las reservaciones registradas.
            </p>

        </div>


        <a href="panel_admin.php"
           class="btn btn-outline">

            Volver al panel

        </a>

    </div>


    <div class="tarjeta"
         style="margin-bottom: 30px;">

        <h3>Reservaciones</h3>

        <p>
            Desde esta sección puedes consultar
            las citas programadas y actualizar
            su estado de atención.
        </p>

    </div>


    <div class="tabla-contenedor">

        <table>

            <tr>

                <th>ID</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Profesional</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado actual</th>
                <th>Actualizar</th>

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
                         htmlspecialchars($row['profesional']) .
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

                    echo "<td>";

                    echo "<form method='POST'
                                style='padding:0;
                                       margin:0;
                                       border:none;
                                       box-shadow:none;
                                       display:flex;
                                       gap:8px;
                                       align-items:center;'>";

                    echo "<input type='hidden'
                                 name='id_cita'
                                 value='" .
                                 $row['id_cita'] .
                                 "'>";

                    echo "<select name='estado'
                                  style='margin:0;
                                         min-width:130px;'>";

                    $estados = [
                        "Pendiente",
                        "Confirmada",
                        "En atención",
                        "Finalizada",
                        "Cancelada"
                    ];

                    foreach ($estados as $estado) {

                        $seleccionado =
                            ($row['estado'] == $estado)
                            ? "selected"
                            : "";

                        echo "<option value='" .
                             $estado .
                             "' " .
                             $seleccionado .
                             ">" .
                             $estado .
                             "</option>";
                    }

                    echo "</select>";

                    echo "<button type='submit'
                                 name='actualizar_estado'
                                 class='btn btn-primary btn-small'>

                            Cambiar

                          </button>";

                    echo "</form>";

                    echo "</td>";

                    echo "</tr>";
                }

            } else {

                echo "<tr>

                        <td colspan='8'>
                            No hay citas registradas.
                        </td>

                      </tr>";
            }

            ?>

        </table>

    </div>


</div>


</body>

</html>