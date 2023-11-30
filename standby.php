<?php
// Configuración de la conexión a la base de datos
$servername = "15.235.14.40"; // Cambia esto al nombre de tu servidor de base de datos
$username = "zarparseguros";     // Cambia esto a tu nombre de usuario de base de datos
$password = "IngresoSeguro24*";           // Cambia esto a tu contraseña de base de datos
$database = "zarparseguros_zarparseguros"; // Cambia esto al nombre de tu base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para seleccionar datos en estado "standby"
$sql = "SELECT * FROM Ventas WHERE estado = 'Standby'";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iterar a través de los resultados
    while ($row = $result->fetch_assoc()) {
        // Aquí puedes acceder a los datos de cada fila, por ejemplo:
        echo "id: " . $row["id"] . " - Estado: " . $row["Estado"] . "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
