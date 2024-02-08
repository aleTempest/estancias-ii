<?php
require_once('BienDAO.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$bienDAO = new BienDAO($conn);

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$no_serie = $_POST['no_serie'];
$no_inventario = '';
$color = $_POST['color'];
$fecha = $_POST['fecha'];
$uuid = '';
$rfc_emisor = $_POST['rfc_emisor'];
$nombre_denominacion = $_POST['nombre_denominacion'];
$rfc_representante = $_POST['rfc_representante'];
$rfc_resguardante = $_POST['rfc_resguardante'];
$type = $_POST['tipo'];


if ($bienDAO->insertBien($marca, $modelo, $no_serie, $no_inventario, $color, $fecha, $uuid, $rfc_emisor, $nombre_denominacion, $rfc_representante, $rfc_resguardante)) {
    $lastInserted = $conn->insert_id;
    switch ($type) {
    case "muebles":
      $desc = $_POST['mueble_desc'];
      $bienDAO->insertMueble($desc,$lastInserted);
      break;
    case "vehiculos":
      $tipo_v = $_POST['tipo_v'];
      $marca_v = $_POST['marca_v'];
      $descripcion_v = $_POST['descripcion_v'];
      $modelo_v = $_POST['modelo_v'];
      $color_v = $_POST['color'];
      $no_motor = $_POST['no_motor'];
      $tipo_interiores = $_POST['tipo_interiores'];
      $estado = $_POST['estado'];
			$no_serie_v = $_POST['no_serie_v'];
      $bienDAO->insertVehiculo($tipo_v,$marca_v,$descripcion_v,$modelo_v,$color_v,$no_serie_v,$no_motor,$tipo_interiores,$estado,$lastInserted);
      break;
    case "software":
      $nombre_s = $_POST['nombre_software'];
      $licencia = $_POST['licencia'];
      $fechaVencimiento = $_POST['fecha_vencimiento'];
      $noSerie = $_POST['no_serie_software'];
      $bienDAO->insertSoftware($nombre_s, $licencia, $fechaVencimiento, $noSerie, $lastInserted);
      break;
    case "hardware":
      $procesador = $_POST['procesador'];
      $sistemaOperativo = $_POST['sis_operativo'];
      $nombreEquipo = $_POST['nombre_equipo'];
      $versionSistemaOperativo = $_POST['version_hardware'];
      $bienDAO->insertHardware($procesador, $sistemaOperativo, $nombreEquipo, $versionSistemaOperativo,$lastInserted);
      break;
    default:
      break;
    }

} else {
  echo json_encode(["success" => false, "message" => "Error al insertar el bien"]);
}
header('Location: consultar.php');
$conn->close();
