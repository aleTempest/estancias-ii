<?php

class BienView {
    private $conn;

    public function __construct($host, $usuario, $contrasena, $nombreBaseDatos) {
        $this->conn = new mysqli($host, $usuario, $contrasena, $nombreBaseDatos);
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function eliminarBien($uuidToDelete) {
        $consultaDelete = "DELETE FROM bien WHERE uuid = '$uuidToDelete'";
        $resultadoDelete = $this->conn->query($consultaDelete);

        return $resultadoDelete;
    }

    public function obtenerBienView() {
        $consulta = "SELECT uuid, nombre_denominacion, marca, color FROM bien";
        $resultado = $this->conn->query($consulta);

        if ($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function cerrarConexion() {
        $this->conn->close();
    }
}

$host = "localhost";
$usuario = "root";
$contrasena = "";
$nombreBaseDatos = "main";

$bienView = new BienView($host, $usuario, $contrasena, $nombreBaseDatos);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uuidToDelete = $_POST['uuidToDelete'];

    if (!empty($uuidToDelete)) {
        $resultadoDelete = $bienView->eliminarBien($uuidToDelete);
        if ($resultadoDelete) {
            echo '<p>Bien eliminado correctamente.</p>';
        } else {
            echo '<p>Error al eliminar el bien.</p>';
        }
    } else {
        echo '<p>Selecciona un bien antes de intentar eliminarlo.</p>';
    }
}

$resultadoBienView = $bienView->obtenerBienView();

$bienView->cerrarConexion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Bien</title>
    <!-- Incluir Bootstrap desde CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="./dashboard_root.html">
                <img src="./img/Logo COTACYT.png" alt="Logo" width="200" height="50" class="d-inline-block align-top" />
            </a>
            <!-- Título de la página -->
            <span class="navbar-text">
                Root
            </span>
        </div>
    </nav>

    <div class="container mt-5">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-3">
            <div class="mb-3">
                <label for="bienes" class="form-label">Selecciona un bien:</label>
                <select id="bienes" name="uuidToDelete" class="form-select">
                    <?php
                    if ($resultadoBienView) {
                        foreach ($resultadoBienView as $bien) {
                            $optionText = $bien['uuid'] . ', ' . $bien['nombre_denominacion'] . ', ' . $bien['marca'] . ', ' . $bien['color'];
                            echo '<option value="' . $bien['uuid'] . '">' . $optionText . '</option>';
                        }
                    } else {
                        echo '<option value="" disabled>No hay bienes disponibles</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger" style="background-color: #ab0033;>Eliminar Bien</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
