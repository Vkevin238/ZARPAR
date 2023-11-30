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

// Consulta SQL para obtener las tipificaciones
$sql = "SELECT * FROM zarparseguros_zarparseguros.Tipificaciones where id <> 1 and id <> 7";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $tipificaciones = array();
    while ($row = $result->fetch_assoc()) {
        $tipificaciones[] = $row["tipificacion"];
    }
    echo json_encode($tipificaciones); // Devuelve las tipificaciones en formato JSON
} else {
    echo json_encode(array()); // Devuelve un arreglo vacío si no hay tipificaciones
}

$conn->close();
?>
