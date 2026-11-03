<?php

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != "administrador") {
    header("Location: ../iniciar_sesion.php");
    exit();
}

include("../conexion.php");


// Consultar clientes registrados
$sql = "SELECT * FROM clientes ORDER BY nombre ASC";

$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestión de Clientes - FilaCeroCR</title>
</head>

<body>

    <h1>Gestión de Clientes</h1>

    <p>
        <a href="panel_admin.php">
            Volver al Panel Administrativo
        </a>
    </p>

    <hr>

    <h2>Clientes Registrados</h2>

    <table border="1"
           cellpadding="8"
           cellspacing="0">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
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

</body>

</html>