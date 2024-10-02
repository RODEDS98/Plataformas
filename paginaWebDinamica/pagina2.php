<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-size: 18px; 
            margin: 0;  
            background-color: #8e8a8a; 
        }

        .cv-container {
            width: 210mm; 
            height: 297mm; 
            background-color: #fff; 
            padding: 20mm; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            box-sizing: border-box; 
            overflow: hidden; 
            position: relative; 
        }

        .cv-header {
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            background-color: #b0b0b0;
            padding: 10mm; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 1; 
        }

        .cv-header img {
            width: 50mm;
            height: 50mm;
            border-radius: 50%;
            object-fit: cover;
            float: left; 
            margin-right: 10mm;
        }

        .cv-header .info {
            overflow: hidden;
        }

        .cv-header h1, .cv-header h2 {
            margin: 0;
            color: #333;
            font-weight: bold;
        }

        .content {
            display: grid;
            grid-template-columns: 2fr 3fr; 
            grid-gap: 20px; 
            margin-top: 60mm;
            position: relative; 
            z-index: 0; 
        }

        .left-column, .right-column {
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1); 
            border-radius: 5px; 
        }

        .left-column div, .right-column div {
            margin-bottom: 10px;
            font-size: 0.9em;
            font-weight: bold;
        }

        h3.with-underline::after {
            content: '';
            display: block;
            width: 100%;
            height: 2px; 
            background: #333; 
            position: absolute;
            bottom: -5px; 
            left: 0;
        }

        p {
            font-size: 0.8em;
            line-height: 1.2;
        }

        li {
            font-size: 0.8em;
            line-height: 1.2;
        }

        h5 {
            margin-top: 10px;
            font-size: 1.0em;
            font-weight: bold;
        }

        h1 {
            margin-top: 10px;
            font-size: 0.9em;
            font-weight: bold;
        }

        .year {
            font-weight: normal; 
            color: #7f8c8d; 
            font-size: 0.9em; 
        }
    </style>
</head>
<body>

    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root"; // Cambia esto si es necesario
    $password = ""; // Cambia esto si tienes una contraseña
    $dbname = "nombre_de_tu_base_de_datos"; // Cambia esto por el nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario usando POST
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
    $ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '';
    $nivel_ingles = isset($_POST['nivel_ingles']) ? $_POST['nivel_ingles'] : '';
    $aptitudes = isset($_POST['aptitudes']) ? $_POST['aptitudes'] : [];
    $habilidades = isset($_POST['habilidades']) ? $_POST['habilidades'] : [];
    
    // Insertar usuario en la base de datos
    $sql_usuario = "INSERT INTO usuario (nombre, fecha_nacimiento, ocupacion, telefono, email, nacionalidad, nivel_ingles) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_usuario);
    $stmt->bind_param("sssssss", $nombre, $fecha_nacimiento, $ocupacion, $telefono, $email, $nacionalidad, $nivel_ingles);
    $stmt->execute();
    $usuario_id = $stmt->insert_id; // Obtener el ID del usuario insertado
    $stmt->close();

    // Insertar aptitudes
    foreach ($aptitudes as $aptitud) {
        // Verificar si la aptitud ya existe
        $sql_aptitud = "INSERT IGNORE INTO aptitudes (aptitud) VALUES (?)";
        $stmt = $conn->prepare($sql_aptitud);
        $stmt->bind_param("s", $aptitud);
        $stmt->execute();
        $stmt->close();

        // Obtener el ID de la aptitud
        $sql_get_aptitud_id = "SELECT id FROM aptitudes WHERE aptitud = ?";
        $stmt = $conn->prepare($sql_get_aptitud_id);
        $stmt->bind_param("s", $aptitud);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $aptitud_id = $row['id'];

            // Insertar relación usuario-apto
            $sql_usuario_apto = "INSERT INTO usuario_apto (usuario_id, aptitud_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql_usuario_apto);
            $stmt->bind_param("ii", $usuario_id, $aptitud_id);
            $stmt->execute();
        }
        $stmt->close();
    }

    // Insertar habilidades
    foreach ($habilidades as $habilidad) {
        // Verificar si la habilidad ya existe
        $sql_habilidad = "INSERT IGNORE INTO habilidades (habilidad) VALUES (?)";
        $stmt = $conn->prepare($sql_habilidad);
        $stmt->bind_param("s", $habilidad);
        $stmt->execute();
        $stmt->close();

        // Obtener el ID de la habilidad
        $sql_get_habilidad_id = "SELECT id FROM habilidades WHERE habilidad = ?";
        $stmt = $conn->prepare($sql_get_habilidad_id);
        $stmt->bind_param("s", $habilidad);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $habilidad_id = $row['id'];

            // Insertar relación usuario-habilidad
            $sql_usuario_habilidad = "INSERT INTO usuario_habilidad (usuario_id, habilidad_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql_usuario_habilidad);
            $stmt->bind_param("ii", $usuario_id, $habilidad_id);
            $stmt->execute();
        }
        $stmt->close();
    }

    $conn->close(); // Cerrar la conexión a la base de datos
    ?>

    <div class="cv-container">
        <div class="cv-header">
            <img src="foto" alt="Foto Persona">
            <div class="info">
                <h1><?php echo htmlspecialchars($nombre); ?></h1>
                <h2><?php echo htmlspecialchars($ocupacion); ?></h2>
            </div>
        </div>

        <div class="content">
            <div class="left-column">
                <div>
                    <h3 class="with-underline">CONTACTO</h3>
                    <p><?php echo htmlspecialchars($email); ?></p>
                    <p><?php echo htmlspecialchars($telefono); ?></p>
                    <p>linkedin.com/jose.martinez</p>
                    <p><?php echo htmlspecialchars($nacionalidad); ?></p>
                    <p><?php echo htmlspecialchars($fecha_nacimiento); ?></p>
                </div>

                <div>
                    <h3 class="with-underline">APTITUDES</h3>
                    <ul>
                        <?php foreach ($aptitudes as $aptitud): ?>
                            <li><?php echo htmlspecialchars($aptitud); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div>
                    <h3 class="with-underline">HABILIDADES</h3>
                    <ul>
                        <?php foreach ($habilidades as $habilidad): ?>
                            <li><?php echo htmlspecialchars($habilidad); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="right-column">
                <div>
                    <h3 class="with-underline">EDUCACIÓN</h3>
                    <h5 class="year">2015 - 2019</h5>
                    <p>Licenciatura en Ingeniería de Sistemas</p>
                    <h5 class="year">2012 - 2015</h5>
                    <p>Técnico en Computación</p>
                </div>

                <div>
                    <h3 class="with-underline">EXPERIENCIA</h3>
                    <h5 class="year">2019 - 2021</h5>
                    <p>Desarrollador Web en XYZ Company</p>
                    <h5 class="year">2021 - presente</h5>
                    <p>Ingeniero de Software en ABC Corporation</p>
                </div>

                <div>
                    <h3 class="with-underline">IDIOMAS</h3>
                    <p>Español (nativo)</p>
                    <p>Inglés (intermedio)</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
