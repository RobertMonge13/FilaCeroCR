<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>FilaCeroCR</title>

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

            <a href="cliente/">
                Clientes
            </a>

            <a href="iniciar_sesion.php">
                Iniciar sesión
            </a>

        </div>

    </nav>


    <div class="contenedor">

        <section class="hero">

            <h1>
                Tus citas, sin filas.
            </h1>

            <p>
                Reserva servicios, consulta horarios
                y administra tus citas desde un solo lugar.
            </p>


            <div class="acciones">

                <a href="cliente/"
                   class="btn btn-primary">

                    Reservar una cita

                </a>


                <a href="iniciar_sesion.php"
                   class="btn btn-outline">

                    Iniciar sesión

                </a>

            </div>

        </section>


        <div class="tarjetas">

            <div class="tarjeta">

                <h3>
                    Reserva fácilmente
                </h3>

                <p>
                    Consulta servicios y selecciona
                    el horario que mejor se adapte a ti.
                </p>

            </div>


            <div class="tarjeta">

                <h3>
                    Gestiona tus citas
                </h3>

                <p>
                    Consulta el estado de tus reservaciones
                    de forma rápida y sencilla.
                </p>

            </div>


            <div class="tarjeta">

                <h3>
                    Todo en un solo lugar
                </h3>

                <p>
                    Clientes, profesionales y negocios
                    conectados mediante FilaCeroCR.
                </p>

            </div>

        </div>

    </div>

</body>

</html>