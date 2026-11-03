<?php

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != "administrador") {
    header("Location: ../iniciar_sesion.php");
    exit();
}

include("../conexion.php");


// AGREGAR SERVICIO
if (isset($_POST['agregar'])) {

    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $duracion = $_POST['duracion'];

    $sql = "INSERT INTO servicios
            (nombre_servicio, descripcion, duracion)
            VALUES (?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $descripcion, $duracion);
    $stmt->execute();

    header("Location: servicios.php");
    exit();
}


// ELIMINAR SERVICIO
if (isset($_GET['eliminar'])) {

    $id_servicio = $_GET['eliminar'];

    $sql = "DELETE FROM servicios
            WHERE id_servicio = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_servicio);
    $stmt->execute();

    header("Location: servicios.php");
    exit();
}


// CONSULTAR SERVICIOS
$sql = "SELECT * FROM servicios ORDER BY id_servicio ASC";

$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestión de Servicios - FilaCeroCR</title>

</head>

<body>

    <h1>Gestión de Servicios</h1>

    <p>
        <a href="panel_admin.php">
            Volver al Panel Administrativo
        </a>
    </p>

    <hr>

    <h2>Agregar Servicio</h2>

    <form method="POST">

        <label>Nombre del servicio:</label>
        <br>

        <input type="text"
               name="nombre"
               required>

        <br><br>


        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"></textarea>

        <br><br>


        <label>Duración en minutos:</label>
        <br>

        <input type="number"
               name="duracion"
               min="1"
               required>

        <br><br>

        <button type="submit"
                name="agregar">

            Agregar Servicio

        </button>

    </form>


    <hr>


    <h2>Servicios Registrados</h2>

    <table border="1"
           cellpadding="8"
           cellspacing="0">

        <tr>

            <th>ID</th>
            <th>Servicio</th>
            <th>Descripción</th>
            <th>Duración</th>
            <th>Acciones</th>

        </tr>

        <?php

        if ($resultado->num_rows > 0) {

            while ($row = $resultado->fetch_assoc()) {

                echo "<tr>";

                echo "<td>" . $row['id_servicio'] . "</td>";

                echo "<td>" .
                     htmlspecialchars($row['nombre_servicio']) .
                     "</td>";

                echo "<td>" .
                     htmlspecialchars($row['descripcion']) .
                     "</td>";

                echo "<td>" .
                     $row['duracion'] .
                     " minutos</td>";

                echo "<td>";

                echo "<a href='editar_servicio.php?id=" .
                     $row['id_servicio'] .
                     "'>Editar</a>";

                echo " | ";

                echo "<a href='servicios.php?eliminar=" .
                     $row['id_servicio'] .
                     "'>Eliminar</a>";

                echo "</td>";

                echo "</tr>";
            }

        } else {

            echo "<tr>
                    <td colspan='5'>
                        No hay servicios registrados.
                    </td>
                  </tr>";
        }

        ?>

    </table>

</body>

</html>