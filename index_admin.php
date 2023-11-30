<?php
session_start();

$servername = "15.235.14.40";
$username = "zarparseguros";
$password = "IngresoSeguro24*";
$dbname = "zarparseguros_zarparseguros";

// Conectarse a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta SQL segura utilizando sentencias preparadas
    $stmt = $conn->prepare("SELECT id, nombre_usuario FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Las credenciales son correctas, inicia sesión y guarda la información del usuario
        $stmt->bind_result($usuario_id, $nombre_usuario);
        $stmt->fetch();

        $_SESSION["usuario_id"] = $usuario_id;
        $_SESSION["nombre_usuario"] = $nombre_usuario;

        $stmt->close();

        // Redirecciona a la página de inicio o a la página deseada
        header("Location: inicio.php");
        exit();
    } else {
        $error_message = "Credenciales incorrectas. Por favor, intenta de nuevo.";
    }
    $stmt->close();
    // Las credenciales son correctas, inicia sesión y guarda la información del usuario
$stmt->bind_result($usuario_id, $nombre_usuario);
$stmt->fetch();

$_SESSION["usuario_id"] = $usuario_id;
$_SESSION["nombre_usuario"] = $nombre_usuario;

$stmt->close();

// Redirecciona al usuario a la página de inicio
header("Location: guardar_tipificacion.php");
exit(); // Asegúrate de salir del script después de redireccionar
$stmt->close();
    // Las credenciales son correctas, inicia sesión y guarda la información del usuario
$stmt->bind_result($usuario_id, $nombre_usuario);
$stmt->fetch();

$_SESSION["usuario_id"] = $usuario_id;
$_SESSION["nombre_usuario"] = $nombre_usuario;

$stmt->close();

// Redirecciona al usuario a la página de inicio
header("Location: get_cedula.php");
exit(); // Asegúrate de salir del script después de redireccionar
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="login-container">
        <div class="logo-and-form-container">
            <div class="logo-container">
                <img src="logo.jpg" alt="Logo de la empresa" class="logo">
            </div>
            <div class="form-container">
                <form method="post" action="index.php">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required><br><br>

                    <input type="submit" value="Iniciar Sesión" class="button">
                </form>
                <?php
                if (isset($error_message)) {
                    echo '<p class="error">' . $error_message . '</p>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>