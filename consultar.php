<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartas de Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos adicionales */
        .container {
            margin-top: 50px; /* Puedes ajustar el valor según tu preferencia */
				}
		</style>
</head>
<body>
		<!-- Barra de navegación -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
						<!-- Logo -->
						<a class="navbar-brand" href="index.html">
								<img src="./img/Logo COTACYT.png" alt="Logo" width="200" height="50" class="d-inline-block align-top" />
						</a>
						<!-- Título de la página -->
						<span class="navbar-text">
								Root
						</span>
				</div>
		</nav>

    <div class="container">
        <div class="row">
            <?php
            // Conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "main";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Consulta SQL
            $sql = "SELECT * FROM bien_view";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Generar cartas para cada fila de la consulta
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["nombre_denominacion"] . '</h5>';
                    echo '<p class="card-text">Marca: ' . $row["marca"] . '</p>';
                    echo '<p class="card-text">Color: ' . $row["color"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No se encontraron resultados.";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
