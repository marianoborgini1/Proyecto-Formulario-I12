<?php

    $nombre = $_GET['nombre'];
    $dni = $_GET['dni'];
    $fecha = $_GET['fecha'];

    echo "<body style='background-color: #f1f1f1'>";

    
    echo "<h2 style='text-align: center; font-size: 30px; padding-top: 20px;'>Datos del formulario</h2>";

    echo "<div style='font-size: 18.5px; padding-left 600px; padding-top: 20px;'>";
    echo "<h3 style='display: inline; font-size: 19.5px; padding-left: 600px;'>Alumno </h3>";
    echo "<span style:'display: inline;'>" . $nombre . "</span> <br>";

    echo "<h3 style='display: inline; font-size: 19.5px; padding-left: 600px;'>DNI: </h3>";
    echo "<span style='display: inline;'>" . $dni . "</span><br>";

    echo "<h3 style='display: inline; font-size: 19.5px; padding-left: 600px;'>Fecha: </h3>";
    echo "<span style='display: inline;'>" . $fecha . "</span><br>";
    echo "</div>";
    echo "</body>"; 
?>