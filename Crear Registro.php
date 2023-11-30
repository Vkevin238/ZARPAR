<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Formulario de Registro</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Procesar el formulario cuando se envía
        $servername = "15.235.14.40";
        $username = "zarparseguros";
        $password = "IngresoSeguro24*";
        $dbname = "zarparseguros_zarparseguros";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $modelo = $_POST["modelo"];
        $placa = $_POST["placa"];
        $telefono = $_POST["telefono"];
        $n_base = $_POST["n_base"];
        $estado = "nuevo"; // Valor constante
        $fecha_actual = date("Y-m-d"); // Obtener la fecha actual en formato YYYY-MM-DD

        // Crear el SQL INSERT statement
        $sql = "INSERT INTO registros (Identificacion, Nombre, Modelo, Anio_Modelo, Placa, Telefono, Correo, Ciudad, n_base, Estado, Ult_Modificacion)
            VALUES ('$cedula', '$nombre', '$modelo', '$anio', '$placa', '$telefono', '$correo', '$ciudad', '$n_base', 'rnuevo', '$fecha_actual')";

        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "Registro guardado con éxito";
        } else {
            echo "Error al insertar el registro: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="cedula">Identificación:</label>
        <input type="text" name="cedula" id="cedula" required>
        <br></br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br></br>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" required>
        <br></br>
        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" required>
        <br></br>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" required>
        <br></br>
        
        <!-- Otros campos del formulario... -->
        
        <input type="submit" value="Crear Registro">
    </form>
</body>
</html>
