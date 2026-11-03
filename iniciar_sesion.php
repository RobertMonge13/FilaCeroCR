<?php

session_start();

include("conexion.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    $sql = "SELECT id_usuario, nombre, contrasena, rol
            FROM usuarios
            WHERE correo = ?";

    $stmt = $conexion->prepare($sql);

    $stmt->bind_param("s", $correo);

    $stmt->execute();

    $resultado = $stmt->get_result();


    if ($resultado->num_rows === 1) {

        $row = $resultado->fetch_assoc();

        if ($contrasena === $row['contrasena']) {

            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['rol'] = $row['rol'];


            if ($row['rol'] == "administrador") {

                header("Location: administrador/panel_admin.php");
                exit();

            } elseif ($row['rol'] == "profesional") {

                header("Location: panel_profesional.php");
                exit();

            } elseif ($row['rol'] == "cliente") {

                header("Location: cliente/");
                exit();
            }

        } else {

            $error = "Contraseña incorrecta.";
        }

    } else {

        $error = "El usuario no existe.";
    }
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión - FilaCeroCR</title>

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

        <a href="index.php">
            Inicio
        </a>

        <a href="cliente/">
            Clientes
        </a>

    </div>

</nav>


<div class="login-contenedor">


    <div class="login-card">


        <h1>Iniciar sesión</h1>

        <p class="subtitulo">
            Accede a tu cuenta de FilaCeroCR.
        </p>


        <?php

        if (!empty($error)) {

            echo "<div class='error'>" .
                 htmlspecialchars($error) .
                 "</div>";
        }

        ?>


        <form method="POST"
              action="iniciar_sesion.php">


            <label>
                Correo electrónico
            </label>

            <input type="email"
                   name="correo"
                   placeholder="correo@ejemplo.com"
                   required>


            <label>
                Contraseña
            </label>

            <input type="password"
                   name="contrasena"
                   placeholder="Ingresa tu contraseña"
                   required>


            <button type="submit"
                    class="btn btn-primary">

                Ingresar

            </button>


        </form>


    </div>


</div>


</body>

</html>