<?php
session_start();
// Establece la zona horaria a Colombia
date_default_timezone_set('America/Bogota');
// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php"); // Redirige a la página de inicio de sesión
    exit();
}
$Agent = $_SESSION["nombre_usuario"]
?>
<?php
// Establece la zona horaria a Colombia
date_default_timezone_set('America/Bogota');
// Conecta a la base de datos (reemplaza con tus propios detalles de conexión)
$servername = "15.235.14.40";
$username = "zarparseguros";
$password = "IngresoSeguro24*";
$dbname = "zarparseguros_zarparseguros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Función para escapar y limpiar los datos enviados por el usuario
function limpiarDatos($dato) {
    // Implementa aquí la lógica de limpieza de datos que necesites
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    
    return $dato;
}

// Resto del código para manejar la actualización de tipificación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene la tipificación seleccionada desde el formulario
    $tipificacion = $_POST["tipificacion"];
    $fecha_hora = $_POST["fecha_hora"];
    $fecha_modificacion = date("Y-m-d H:i:s");
    // Realiza una consulta SQL para actualizar el estado de acuerdo a la tipificación seleccionada
    $identificacion = limpiarDatos($_POST["cedula"]); // Asegúrate de que tengas la identificación disponible

    // Ejemplo de consulta de actualización (reemplaza con tu consulta real)
    if ($tipificacion === "volver a llamar") {

        $sql = "UPDATE registros SET Agente = '$Agent', Ult_Modificacion = '$fecha_modificacion', Estado = '$tipificacion', Fecha_VL = '$fecha_hora' WHERE Identificacion = '$identificacion'";

        if ($conn->query($sql) === TRUE) {
            header("Location: inicio.php");
        } else {
            echo "Error al actualizar la tipificación: " . $conn->error;
        }

    } else {
        $sql = "UPDATE registros SET Agente = '$Agent', Ult_Modificacion = '$fecha_modificacion', Estado = '$tipificacion' WHERE Identificacion = '$identificacion'";

    if ($conn->query($sql) === TRUE) {
        header("Location: inicio.php");
    } else {
        echo "Error al actualizar la tipificación: " . $conn->error;
    }
}
}
$conn->close();
?>
