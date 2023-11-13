<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: clientes.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $usuario_bd = "veloz";
    $contraseña_bd = "veloz123";
    $nombre_bd = "proyecto_interfaz";

    $conexion = mysqli_connect($servidor, $usuario_bd, $contraseña_bd, $nombre_bd);
    mysqli_set_charset($conexion, "utf8");

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);

    $query = "SELECT nombre_usuario, contraseña FROM usuarios WHERE nombre_usuario = '$usuario'";

    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $usuario_valido = $fila['nombre_usuario'];
        $contraseña_valida = $fila['contraseña'];

        if ($contraseña === $contraseña) {
            $_SESSION['usuario'] = $usuario;
                        
            header("Location: clientes.php");
            exit();
        } else {
            echo "Usuario ingresado: $usuario, Contraseña ingresada: $contraseña </br>";
            echo "Usuario obtenido: $usuario_valido, Contraseña obtenida: $contraseña_valida";
            $error = "Credenciales incorrectas";
        }
    } else {
        $error = "Error en la consulta: " . mysqli_error($conexion);
        echo $error;
    }

    mysqli_close($conexion);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Iniciar Sesión</h2>
    
    <div id="botones">
        <a href="index.php" class="boton">Volver</a>
    </div>

    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
