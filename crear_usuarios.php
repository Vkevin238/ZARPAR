<?php
session_start();
// Establece la zona horaria a Colombia
date_default_timezone_set('America/Bogota');
// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php"); // Redirige a la página de inicio de sesión
    exit();
}

$servername = "15.235.14.40";
$username = "zarparseguros";
$password = "IngresoSeguro24*";
$dbname = "zarparseguros_zarparseguros";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Inicializar variables para los campos de usuario
$id = "";
$nombre_usuario = "";
$contrasena = "";
$rol = "";

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["rol"];

    // Insertar datos en la tabla de usuarios
    $sql = "INSERT INTO usuarios (nombre_usuario, contrasena, rol) VALUES ('$nombre_usuario', '$contrasena', '$rol')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Usuario creado exitosamente.";
    } else {
        $error = "Error al crear el usuario: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creador de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select[name="rol"] {
            width: 55%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="text"],
        input[type="password"] {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: #ff0000;
            text-align: center;
        }

        .success {
            color: #008000;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Creador de Usuarios</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" required><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required><br>

            <label for="rol">Rol:</label>
            <select name="rol">
                <option value="Administrador">Administrador</option>
                <option value="Agente">Agente</option>
            </select><br>

            <input type="submit" value="Crear Usuario">
        </form>
        <?php
        if (isset($mensaje)) {
            echo '<p class="success">' . $mensaje . '</p>';
        } elseif (isset($error)) {
            echo '<p class="error">' . $error . '</p>';
        }
        ?>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>