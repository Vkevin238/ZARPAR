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

// Obtiene la tipificación seleccionada desde la solicitud POST
$tipificacion = $_POST["tipificacion"];

if ($tipificacion === "nuevo" || $tipificacion === "rnuevo") {
$sql = "SELECT DISTINCT Identificacion FROM registros WHERE Estado='$tipificacion' ORDER BY RAND() LIMIT 3";
}
elseif ($tipificacion === "standby") {
    $sql = "SELECT DISTINCT cedula as Identificacion FROM Ventas WHERE Estado='standby' ORDER BY RAND() LIMIT 3";
    }
else {
// Consulta SQL para obtener las cédulas según la tipificación seleccionada
$sql = "SELECT DISTINCT Identificacion, Nombre FROM registros WHERE Agente='$Agent' and Estado='$tipificacion' ORDER BY RAND() LIMIT 3";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cedulas = array();
    while ($row = $result->fetch_assoc()) {
        $cedulas[] = $row["Identificacion"];
    }
    echo json_encode($cedulas); // Devuelve las cédulas en formato JSON
} else {
    echo json_encode(array()); // Devuelve un arreglo vacío si no hay cédulas
}

$conn->close();
?>
