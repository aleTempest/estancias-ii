<?php
require_once('SoftwareDAO.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$softwareDAO = new SoftwareDAO($conn);
$nombre = $_POST['nombre_software'];
$licencia = $_POST['licencia'];
$fechaVencimiento = $_POST['fecha_vencimiento'];
$noSerie = $_POST['no_serie_software'];

if ($softwareDAO->insertSoftware($nombre, $licencia, $fechaVencimiento, $noSerie)) {
    echo json_encode(["success" => true, "message" => "Software insertado exitosamente"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al insertar el software"]);
}

$conn->close();
