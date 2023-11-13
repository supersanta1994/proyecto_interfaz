<?php
session_start();

    $conexion = mysqli_connect('localhost', 'veloz', 'veloz123', 'proyecto_interfaz');
    mysqli_set_charset($conexion, "utf8");

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $nombre_cliente = mysqli_real_escape_string($conexion, $_POST['nombre_cliente']);
    $id_servicio = mysqli_real_escape_string($conexion, $_POST['servicio']);
    $fecha_registro = date("Y-m-d");

    $query_insertar_cliente = "INSERT INTO clientes (nombre, fecha_carga, servicio) 
                               VALUES ('$nombre_cliente', '$fecha_registro', '$id_servicio')";

    if (mysqli_query($conexion, $query_insertar_cliente)) {
        echo "Cliente agregado exitosamente.";
        header("Location: clientes.php");
    } else {
        echo "Error al agregar cliente: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);

?>
