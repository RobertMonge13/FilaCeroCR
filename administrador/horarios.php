<?php

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != "administrador") {
    header("Location: ../iniciar_sesion.php");
    exit();
}

include("../conexion.php");


// AGREGAR HORARIO
if (isset($_POST['agregar'])) {

    $id_profesional = $_POST['id_profesional'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $sql = "INSERT INTO horarios
            (id_profesional, fecha, hora, disponible)
            VALUES (?, ?, ?, 1)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iss", $id_profesional, $fecha, $hora);
    $stmt->execute();

    header("Location: horarios.php");
    exit();
}


// CAMBIAR DISPONIBILIDAD
if (isset($_GET['cambiar'])) {

    $id_horario = $_GET['cambiar'];

    $sql = "UPDATE horarios
            SET disponible = NOT disponible
            WHERE id_horario = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_horario);
    $stmt->execute();

    header("Location: horarios.php");
    exit();
}


// ELIMINAR HORARIO
if (isset($_GET['eliminar'])) {

    $id_horario = $_GET['eliminar'];

    $sql = "DELETE FROM horarios
            WHERE id_horario = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_horario);
    $stmt->execute();

    header("Location: horarios.php");
    exit();
}


// CONSULTAR PROFESIONALES
$sql_profesionales = "SELECT id_usuario, nombre
                      FROM usuarios
                      WHERE rol = 'profesional'
                      ORDER BY nombre ASC";

$profesionales = $conexion->query($sql_profesionales);


// CONSULTAR HORARIOS
$sql_horarios = "SELECT h.id_horario,
                        u.nombre AS profesional,
                        h.fecha,
                        h.hora,
                        h.disponible
                 FROM horarios h
                 JOIN usuarios u
                    ON h.id_profesional = u.id_usuario
                 ORDER BY h.fecha ASC, h.hora ASC";

$horarios = $conexion->query($sql_horarios);

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestión de Horarios - FilaCeroCR</title>

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

            <h1>Gestión de Horarios</h1>

            <p>
                Administra la disponibilidad
                de los profesionales de FilaCeroCR.
            </p>

        </div>


        <a href="panel_admin.php"
           class="btn btn-outline">

            Volver al panel

        </a>

    </div>



    <div class="form-card">

        <h2>Agregar nuevo horario</h2>


        <form method="POST"
              style="padding:0;
                     border:none;
                     box-shadow:none;
                     margin:0;">


            <label>
                Profesional
            </label>

            <select name="id_profesional"
                    required>

                <option value="">
                    Seleccione un profesional
                </option>


                <?php

                while ($row = $profesionales->fetch_assoc()) {

                    echo "<option value='" .
                         $row['id_usuario'] .
                         "'>";

                    echo htmlspecialchars($row['nombre']);

                    echo "</option>";
                }

                ?>

            </select>


            <label>
                Fecha
            </label>

            <input type="date"
                   name="fecha"
                   required>


            <label>
                Hora
            </label>

            <input type="time"
                   name="hora"
                   required>


            <button type="submit"
                    name="agregar"
                    class="btn btn-primary">

                Agregar horario

            </button>


        </form>

    </div>



    <div class="titulo-seccion">

        <h2>Horarios registrados</h2>

        <p>
            Consulta y controla la disponibilidad
            de los horarios registrados.
        </p>

    </div>



    <div class="tabla-contenedor">

        <table>


            <tr>

                <th>ID</th>
                <th>Profesional</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Disponibilidad</th>
                <th>Acciones</th>

            </tr>


            <?php

            if ($horarios->num_rows > 0) {

                while ($row = $horarios->fetch_assoc()) {

                    echo "<tr>";

                    echo "<td>" .
                         $row['id_horario'] .
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

                    if ($row['disponible'] == 1) {

                        echo "<strong>
                                Disponible
                              </strong>";

                    } else {

                        echo "No disponible";
                    }

                    echo "</td>";


                    echo "<td>";

                    echo "<div class='acciones-tabla'>";


                    echo "<a class='btn btn-outline btn-small'
                              href='horarios.php?cambiar=" .
                              $row['id_horario'] .
                              "'>

                              Cambiar disponibilidad

                          </a>";


                    echo "<a class='btn btn-danger btn-small'
                              href='horarios.php?eliminar=" .
                              $row['id_horario'] .
                              "'
                              onclick=\"return confirm('¿Deseas eliminar este horario?');\">

                              Eliminar

                          </a>";


                    echo "</div>";

                    echo "</td>";


                    echo "</tr>";
                }

            } else {

                echo "<tr>

                        <td colspan='6'>
                            No hay horarios registrados.
                        </td>

                      </tr>";
            }

            ?>


        </table>

    </div>


</div>


</body>

</html>