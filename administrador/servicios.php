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
$sql = "SELECT *
        FROM servicios
        ORDER BY id_servicio ASC";

$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestión de Servicios - FilaCeroCR</title>

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

            <h1>Gestión de Servicios</h1>

            <p>
                Agrega, modifica y administra
                los servicios disponibles en FilaCeroCR.
            </p>

        </div>

        <a href="panel_admin.php"
           class="btn btn-outline">

            Volver al panel

        </a>

    </div>


    <div class="form-card">

        <h2>Agregar nuevo servicio</h2>


        <form method="POST"
              style="padding:0; border:none; box-shadow:none; margin:0;">


            <label>
                Nombre del servicio
            </label>

            <input type="text"
                   name="nombre"
                   placeholder="Ejemplo: Corte de cabello"
                   required>


            <label>
                Descripción
            </label>

            <textarea name="descripcion"
                      placeholder="Describe brevemente el servicio"></textarea>


            <label>
                Duración en minutos
            </label>

            <input type="number"
                   name="duracion"
                   min="1"
                   placeholder="Ejemplo: 30"
                   required>


            <button type="submit"
                    name="agregar"
                    class="btn btn-primary">

                Agregar servicio

            </button>

        </form>

    </div>



    <div class="titulo-seccion">

        <h2>Servicios registrados</h2>

        <p>
            Consulta y administra los servicios
            registrados actualmente.
        </p>

    </div>


    <div class="tabla-contenedor">

        <table>

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

                    echo "<td>" .
                         $row['id_servicio'] .
                         "</td>";

                    echo "<td>" .
                         htmlspecialchars($row['nombre_servicio']) .
                         "</td>";

                    echo "<td>" .
                         htmlspecialchars($row['descripcion']) .
                         "</td>";

                    echo "<td>" .
                         $row['duracion'] .
                         " min</td>";

                    echo "<td>";

                    echo "<div class='acciones-tabla'>";

                    echo "<a class='btn btn-outline btn-small'
                              href='editar_servicio.php?id=" .
                              $row['id_servicio'] .
                              "'>
                              Editar
                          </a>";

                    echo "<a class='btn btn-danger btn-small'
                              href='servicios.php?eliminar=" .
                              $row['id_servicio'] .
                              "'
                              onclick=\"return confirm('¿Deseas eliminar este servicio?');\">
                              Eliminar
                          </a>";

                    echo "</div>";

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

    </div>


</div>


</body>

</html>