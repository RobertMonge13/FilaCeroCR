<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: iniciar_sesion.php");
    exit();
}

include("conexion.php");
$id_profesional = $_SESSION['id_usuario'];

$sql = "SELECT c.id_cita, cl.nombre AS cliente, s.nombre_servicio, c.fecha, c.hora, c.estado 
        FROM citas c 
        JOIN clientes cl ON c.id_cliente = cl.id_cliente 
        JOIN servicios s ON c.id_servicio = s.id_servicio 
        WHERE c.id_profesional = ? 
        ORDER BY c.fecha ASC, c.hora ASC";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_profesional);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Citas - Profesional</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
    <p><a href="cerrar_sesion.php">Cerrar Sesión</a></p>

    <h2>Agenda de Citas Asignadas</h2>
    <table border="1" cellpadding="8" cellspacing="0">
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
                echo "<td>" . $row['id_cita'] . "</td>";
                echo "<td>" . htmlspecialchars($row['cliente']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nombre_servicio']) . "</td>";
                echo "<td>" . $row['fecha'] . "</td>";
                echo "<td>" . $row['hora'] . "</td>";
                echo "<td>" . $row['estado'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay citas programadas actualmente.</td></tr>";
        }
        $stmt->close();
        $conexion->close();
        ?>
    </table>
</body>
</html>