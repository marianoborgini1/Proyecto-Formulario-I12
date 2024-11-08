<?php 
$file = $_GET['file']; $type = $_GET['type']; if ($type === 'pdf') 
{ 
    header('Content-Type: application/pdf'); header('Content-Disposition: attachment; filename="' . basename($file) . '"'); } else if ($type === 'img') { 
        header('Content-Type: image/png'); header('Content-Disposition: attachment; filename="' . basename($file) . '"'); 
        } readfile($file); unlink($file); // Eliminar el archivo después de la descarga exit(); ?>