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
    // Obtenemos la informacion del formulario:
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'José Martínez';
    $puesto = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : 'PUESTO / BUSCADO';
    $email = isset($_POST['email']) ? $_POST['email'] : 'jose.martinez@gnail.com';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : 'Mexico DF';
    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : 'Mexicana';
    $ingles = isset($_POST['nivel_ingles']) ? $_POST['nivel_ingles'] : 'Bilingue(TOEIC 950)';
    $aptitudes = isset($_POST['aptitudes']) ? $_POST['aptitudes'] : 'Varias';
    ?>



    <div class="cv-container">
        <div class="cv-header">
            <img src="foto.png" alt="Foto Persona">
            <div class="info">
                <h1><?php echo htmlspecialchars($nombre); ?></h1>
                <h2><?php echo htmlspecialchars($puesto); ?></h2>
            </div>
        </div>

        <div class="content">
            <div class="left-column">
                <div>
                    <h3 class="with-underline">CONTACTO</h3>
                    <p><?php echo htmlspecialchars($email); ?></p>
                    <p><?php echo htmlspecialchars($telefono); ?></p>
                    <p>linkedin.com/jose-martinez</p>
                </div>
                <div>
                    <h3 class="with-underline">IDIOMAS</h3>
                    <p>Español: Nativo</p>
                    <p>Inglés: <?php echo htmlspecialchars($ingles); ?>  </p>
                    <p>Francés: Intermedio</p>
                </div>
                <div>
                    <h3 class="with-underline">APTITUDES</h3>
                        <?php
                        if (isset($_POST['habilidades'])) {
                            $habilidadesSeleccionadas = $_POST['habilidades'];                            
                            // Solo mostramos la lista si hay habilidades seleccionadas
                            if (!empty($habilidadesSeleccionadas)) {
                                //echo "<ul>";
                                foreach ($habilidadesSeleccionadas as $habilidad) {
                                    echo "<li>" . htmlspecialchars($habilidad) . "</li>";
                                }
                                //echo "</ul>";
                            }
                        } else {
                            echo "No se seleccionó ninguna habilidad.";
                        }
                        ?>
                </div>
                <div>
                    <h3 class="with-underline">HABILIDADES</h3>
                    <li>Acondicionamiento físico</li>
                    <li>Creación videos deportivos</li>
                    <li>Pack office</li>
                    <li>Tenis</li>
                </div>
                <div>
                    <h3 class="with-underline">OTROS INTERESES</h3>
                    
                        <li>Creador de yincanas</li>
                        <li>Paseos ecológicos</li>
                        <li>Lectura grupal en inglés</li>
                              
                </div>
            </div>

            <div class="right-column">
                <div>
                    <h3 class="with-underline">PERFIL</h3>
                    <p>Trabajador Social con 4 años de experiencia en proyectos colectivos. 
                    Mi objetivo es lograr que los jóvenes tengan acceso a la educación superior 
                    mediante logros deportivos.</p>
                </div>
                <div>
                    <h3 class="with-underline">EXPERIENCIA LABORAL</h3>
                    <h5>Trabajador Social</h5>
                    <h1><em>Mexico DF</em> <span class="year">| 2022 - actualmente</span></h1>
                    <li>Coordinador y mediador en ayuda psicológica a jóvenes.</li>
                    <li>Velar por la salud mental del equipo.</li>
                    <li>Mapeo de necesidades estratégicas.</li>
                    <li>Monitor de ejercicios físicos para adolescentes.</li>
                    <h5>Trabajador Social</h5>
                    <h1><em>Mexico DF</em> <span class="year">| 2020 - 2022</span></h1>
                    <li>Seguimiento de casos para jóvenes con adicciones.</li>
                    <li>Capacitación en medidas preventivas.</li>
                    <li>Recopilación de evidencias para auditorías.</li>
                </div>
                <div>
                    <h3 class="with-underline">FORMACIÓN</h3>
                    <h1>Grado de Trabajo Social</h1>
                    <h1><em>ESMA</em> <span class="year">| 2012 - 2015</span></h1>
                    <h1>Licenciatura Profesional</h1>
                    <h1><em>Universidad de la Frontera</em> <span class="year">| 2011 - 2012</span></h1>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
