<?php
$conexion = mysqli_connect("localhost", "veloz", "veloz123", "proyecto_interfaz");
if (mysqli_connect_errno()) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$query_clientes = "SELECT A.id,nombre,b.descripcion FROM clientes A inner join servicios B on A.servicio=b.id";
$resultado_clientes = mysqli_query($conexion, $query_clientes);

$query_servicios = "SELECT * FROM servicios";
$resultado_servicios = mysqli_query($conexion, $query_servicios);

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de Clientes</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Clientes</h2>

    <table class="clientes-table">
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre Cliente</th>
                <th>Servicio</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila_cliente = mysqli_fetch_assoc($resultado_clientes)) : ?>
                <tr>
                    <td><?php echo $fila_cliente['id']; ?></td>
                    <td><?php echo $fila_cliente['nombre']; ?></td>
                    <td><?php echo $fila_cliente['descripcion']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <br>

    <h3>Agregar Nuevo Cliente</h3>
    <form method="post" action="agregar_cliente.php">
        <label for="nombre_cliente">Nombre Cliente:</label>
        <input type="text" name="nombre_cliente" required>
        <br>

        <label for="servicio">Servicio:</label>
        <select name="servicio" required>
            <?php while ($fila_servicio = mysqli_fetch_assoc($resultado_servicios)) : ?>
                <option value="<?php echo $fila_servicio['id']; ?>"><?php echo $fila_servicio['descripcion']; ?></option>
            <?php endwhile; ?>
        </select>
        <br>

        <input type="submit" value="Agregar Cliente">
    </form>
</body>
</html>