<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta charset="UTF-8">
    <title>Productos y Servicios</title>
</head>
<body>
    <h1>Productos y Servicios</h1>
    
    <div id="botones">
        <a href="index.php" class="boton">Proyectos</a>
        <a href="login.php" class="boton">Clientes</a>
    </div>

    <p>Aquí encontrarás los servicios y productos disponibles.</p>

    <div id="servicio1">
        <h2>Mantenimiento</h2>
        <p>Servicio de soporte y mantenimiento para sistemas tanto web como escritorio.</p>
    </div>

    <div id="servicio2">
        <h2>Desarrollo de código</h2>
        <p>Para iniciar un nuevo proyecto de desarrollo desde cero, o continuar con uno ya iniciado.</br>(Los tiempos dependen de la complejidad del desarrollo en cuestión)</p>
    </div>

    <h2>Contacto</h2>
    <p>Completa con tus datos para que pueda contactarme contigo por cualquier inquietud o consulta.</p>
    <form method="post" action="enviar_formulario.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>

        <textarea id="mensaje" name="mensaje" placeholder="Escribe tu consulta aquí..." required></textarea>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
