<?php
    ob_start();
    include('C:\wamp64\www\Proyecto-Formulario-I12\phpqrcode\/qrlib.php');
    require('C:\wamp64\www\Proyecto-Formulario-I12\fpdf\fpdf.php');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario_db";

    $conn = new mysqli("localhost", "root", "", "formulario_db");   

    // Verificar conexion 
    if ($conn->connect_error) {
        die("conexion fallida :" . $conn->connect_error);
    }

    $dni = $_GET['dni'];
    $apellido = $_GET['apellido'];
    $nombre = $_GET['nombre'];
    $año = $_GET['año'];
    $observaciones = $_GET['observaciones'];

    $sql = "INSERT INTO asistencia_alumnos (dni, nombre, apellido, año, observaciones) VALUES ('$dni', '$nombre', '$apellido', '$año', '$observaciones')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Nuevo registro creado exitosamente');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $qr_data = "http://192.168.1.36/Proyecto-Formulario-I12/Datos_Alumnos_$dni.pdf";
    $qr_filename = "codigo_qr_$dni.png";
    QRcode::png($qr_data, $qr_filename, QR_ECLEVEL_L, 4);

    $pdf = new FPDF();
    $pdf-> AddPage();
    $pdf->SetFont('Arial','',12);

    $pdf->Cell(40, 10, 'Datos del Alumno');
    $pdf->ln();
    $pdf->Cell(40, 10, 'DNI: ' . $dni);
    $pdf->ln();
    $pdf->Cell(40, 10, 'Apellido: ' . $apellido);
    $pdf->ln();
    $pdf->Cell(40, 10, 'Nombre: ' . $nombre);
    $pdf->ln(); 
    $pdf->Cell(40, 10, 'Año: ' . $año);
    $pdf->ln();
    $pdf->Cell(40, 10, 'Observaciones: ' . $observaciones);
    $pdf->ln();

    $pdf->image($qr_filename, 10, 100, 50, 50);
    $pdf->ln();

    $pdf_filename = 'Datos_Alumnos_' . $dni . '.pdf';
    $pdf->Output('F', $pdf_filename);
    
    $conn->close();

    echo "<h3>Código QR generado: </h3>";
    echo "<img src='$qr_filename' alt='Código QR'>";
    echo "<br><a href='descargar.php?file=$pdf_filename&type=pdf'><button>Descargar PDF</button></a>";
    echo "<br><a href='descargar.php?file=$qr_filename&type=img'><button>Descargar QR</button></a>";

?>
