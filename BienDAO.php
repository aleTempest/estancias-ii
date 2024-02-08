<?php

class BienDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertBien($marca, $modelo, $no_serie, $no_inventario, $color, $fecha, $uuid, $rfc_emisor, $nombre_denominacion, $rfc_representante, $rfc_resguardante) {
        $marca = $this->conn->real_escape_string($marca);
        $modelo = $this->conn->real_escape_string($modelo);
        $no_serie = $this->conn->real_escape_string($no_serie);
        $no_inventario = $this->conn->real_escape_string($no_inventario);
        $color = $this->conn->real_escape_string($color);
        $fecha = $this->conn->real_escape_string($fecha);
        $uuid = $this->conn->real_escape_string($uuid);
        $rfc_emisor = $this->conn->real_escape_string($rfc_emisor);
        $nombre_denominacion = $this->conn->real_escape_string($nombre_denominacion);
        $rfc_representante = $this->conn->real_escape_string($rfc_representante);
        $rfc_resguardante = $this->conn->real_escape_string($rfc_resguardante);

        $sql = "INSERT INTO BIEN 
            (marca, modelo, no_serie, no_inventario, color, fecha, uuid, rfc_emisor, nombre_denominacion, rfc_representante, rfc_resguardante)
            VALUES ('$marca', '$modelo', '$no_serie', '$no_inventario', '$color', '$fecha', UUID(), '$rfc_emisor', '$nombre_denominacion', '$rfc_representante', '$rfc_resguardante')";
        return $this->conn->query($sql);
    }
    public function insertMueble($desc,$id_bien) {
      $sql = "INSERT INTO muebles (descripcion,id_bien) VALUES ('$desc','$id_bien')";
      return $this->conn->query($sql);
    }
    public function insertSoftware($nombre, $licencia, $fechaVencimiento, $noSerie, $id_bien) {
      $sql = "INSERT INTO software (nombre_software, licencia, fecha_vencimiento, no_serie,id_bien) 
        VALUES ('$nombre', '$licencia', '$fechaVencimiento', '$noSerie', '$id_bien')";

      if ($this->conn->query($sql) === TRUE) {
        return true;
      } else {
        return false;
      }
    }
    public function insertVehiculo($tipo,$marca,$descripcion,$modelo,$color,$no_serie,$no_motor,$tipo_interiores,$estado,$id_bien) {
      $sql = "INSERT INTO vehiculos (tipo,marca,descripcion,modelo,color,no_serie,no_motor,tipo_interiores,estado,id_bien)
				VALUES ('$tipo','$marca','$descripcion','$modelo','$color','$no_serie','$no_motor','$tipo_interiores','$estado','$id_bien')";
			echo $sql;
			if ($this->conn->query($sql) === TRUE) {
				return true;
			} else {
				return false;
			}
		}
		public function insertHardware($procesador, $sistemaOperativo, $nombreEquipo, $versionSistemaOperativo,$id_bien) {
			$sql = "INSERT INTO hardware (procesador, sistema_operativo, nombre_equipo, version_sistema_operativo, id_bien) 
				VALUES ('$procesador', '$sistemaOperativo', '$nombreEquipo', '$versionSistemaOperativo','$id_bien')";

			if ($this->conn->query($sql) === TRUE) {
				return true;
			} else {
				return false;
			}
		}
}
