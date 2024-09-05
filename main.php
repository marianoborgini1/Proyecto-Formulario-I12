<?php

    //conexion//

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario_db";

    $conn = new mysqli("localhost", "root", "", "formulario_db");   

    // Verificar conexion //
    if ($conn->connect_error) {
        die("conexion fallida :" . $conn->connect_error);
    }
    
    // Obtener datos del formulario //
    
    $dni = $_GET['dni'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $año = $_GET['año'];
    $observaciones = $_GET['observaciones'];

    $sql = "INSERT INTO asistencia_alumnos (dni, nombre, apellido, año, observaciones) VALUES ('$dni', '$nombre', '$apellido', '$año', '$observaciones')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Nuevo registro creado exitosamente');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexion //

    $conn->close();

?>