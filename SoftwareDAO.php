<?php

class SoftwareDAO {
    private $conn;

    // Constructor que recibe una conexión a la base de datos
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para insertar un registro de software
    public function insertSoftware($nombre, $licencia, $fechaVencimiento, $noSerie, $id_bien) {
        $sql = "INSERT INTO software (nombre, licencia, fecha_vencimiento, no_serie,id_bien) 
                VALUES ('$nombre', '$licencia', '$fechaVencimiento', '$noSerie', '$id_bien')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
