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

</head>

<body>

    <h1>Gestión de Citas</h1>

    <p>
        <a href="panel_admin.php">
            Volver al Panel Administrativo
        </a>
    </p>

    <hr>

    <h2>Citas Registradas</h2>

    <table border="1"
           cellpadding="8"
           cellspacing="0">

        <tr>

            <th>ID</th>
            <th>Cliente</th>
            <th>Servicio</th>
            <th>Profesional</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Acción</th>

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

                echo "<td>" .
                     $row['estado'] .
                     "</td>";

                echo "<td>";

                echo "<form method='POST'>";

                echo "<input type='hidden'
                             name='id_cita'
                             value='" .
                             $row['id_cita'] .
                             "'>";

                echo "<select name='estado'>";

                echo "<option value='Pendiente'>
                        Pendiente
                      </option>";

                echo "<option value='Confirmada'>
                        Confirmada
                      </option>";

                echo "<option value='En atención'>
                        En atención
                      </option>";

                echo "<option value='Finalizada'>
                        Finalizada
                      </option>";

                echo "<option value='Cancelada'>
                        Cancelada
                      </option>";

                echo "</select>";

                echo " ";

                echo "<button type='submit'
                             name='actualizar_estado'>
                        Cambiar Estado
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

</body>

</html>