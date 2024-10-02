<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        /* Estilos para el formulario */
        #cv-form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        select,
        input[list] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 8px; /* Espacio entre checkbox/radio y la etiqueta */
        }

        .checkbox-group {
            display: flex;
            flex-direction: column; /* Alinea los elementos en columna */
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form action="pagina2.php" method="post" id="cv-form">
    <label for="nombre">Nombre y Apellidos:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha-nacimiento" name="fecha_nacimiento" required>

    <label for="ocupacion">Ocupación:</label>
    <input type="text" id="ocupacion" name="ocupacion" required>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="nacionalidad">Nacionalidad:</label>
    <select id="nacionalidad" name="nacionalidad" required>
        <option value="mexicana">Mexicana</option>
        <option value="española">Española</option>
        <option value="otro">Otro</option>
    </select>

    <label>Nivel de Inglés:</label>
    <div>
        <input type="radio" id="ingles-basico" name="nivel_ingles" value="básico" required>
        <label for="ingles-basico">Básico</label>
        <input type="radio" id="ingles-intermedio" name="nivel_ingles" value="intermedio">
        <label for="ingles-intermedio">Intermedio</label>
        <input type="radio" id="ingles-avanzado" name="nivel_ingles" value="avanzado">
        <label for="ingles-avanzado">Avanzado</label>
        <input type="radio" id="ingles-fluido" name="nivel_ingles" value="fluido">
        <label for="ingles-fluido">Fluido</label>
    </div>

    <label for="lenguajes">Lenguajes de Programación:</label>
    <select id="lenguajes" name="lenguajes[]" multiple>
        <option value="html">HTML</option>
        <option value="css">CSS</option>
        <option value="javascript">JavaScript</option>
        <option value="php">PHP</option>
    </select>

    <label for="aptitudes">Aptitudes:</label>
    <input list="aptitudes-list" id="aptitudes" name="aptitudes" placeholder="Selecciona aptitudes">
    <datalist id="aptitudes-list">
        <option value="Inteligencia emocional">
        <option value="Espíritu crítico">
        <option value="Trabajo en equipo">
        <option value="Capacidad analítica">
        <option value="Habilidades físicas">
    </datalist>

    <label for="habilidades">Habilidades:</label>
    <div class="checkbox-group">
        <input type="checkbox" id="habilidad1" name="habilidades[]" value="Acondicionamiento físico">
        <label for="habilidad1">Acondicionamiento físico</label>
        <input type="checkbox" id="habilidad2" name="habilidades[]" value="Creación de videos deportivos">
        <label for="habilidad2">Creación de videos deportivos</label>
        <input type="checkbox" id="habilidad3" name="habilidades[]" value="Pack office">
        <label for="habilidad3">Pack office</label>
        <input type="checkbox" id="habilidad4" name="habilidades[]" value="Tenis">
        <label for="habilidad4">Tenis</label>
    </div>

    <input type="submit" value="Enviar">
</form>

</body>
</html>
