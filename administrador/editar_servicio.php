<?php

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != "administrador") {
    header("Location: ../iniciar_sesion.php");
    exit();
}

include("../conexion.php");


// Obtener el servicio que se quiere editar
if (isset($_GET['id'])) {

    $id_servicio = $_GET['id'];

    $sql = "SELECT * FROM servicios WHERE id_servicio = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_servicio);
    $stmt->execute();

    $resultado = $stmt->get_result();

    $servicio = $resultado->fetch_assoc();

}


// Actualizar servicio
if (isset($_POST['actualizar'])) {

    $id_servicio = $_POST['id_servicio'];
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $duracion = $_POST['duracion'];

    $sql = "UPDATE servicios
            SET nombre_servicio = ?,
                descripcion = ?,
                duracion = ?
            WHERE id_servicio = ?";

    $stmt = $conexion->prepare($sql);

    $stmt->bind_param(
        "ssii",
        $nombre,
        $descripcion,
        $duracion,
        $id_servicio
    );

    $stmt->execute();

    header("Location: servicios.php");
    exit();
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Editar Servicio - FilaCeroCR</title>

</head>

<body>

    <h1>Editar Servicio</h1>

    <form method="POST">

        <input type="hidden"
               name="id_servicio"
               value="<?php echo $servicio['id_servicio']; ?>">


        <label>Nombre del servicio:</label>
        <br>

        <input type="text"
               name="nombre"
               value="<?php echo htmlspecialchars($servicio['nombre_servicio']); ?>"
               required>

        <br><br>


        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"><?php
            echo htmlspecialchars($servicio['descripcion']);
        ?></textarea>

        <br><br>


        <label>Duración en minutos:</label>
        <br>

        <input type="number"
               name="duracion"
               value="<?php echo $servicio['duracion']; ?>"
               min="1"
               required>

        <br><br>


        <button type="submit"
                name="actualizar">

            Guardar Cambios

        </button>

    </form>


    <br>

    <a href="servicios.php">
        Cancelar y volver
    </a>

</body>

</html>