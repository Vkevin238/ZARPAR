<?php
// Tu conexión a la base de datos y otras configuraciones aquí
$servername = "15.235.14.40";
$username = "zarparseguros";
$password = "IngresoSeguro24*";
$dbname = "zarparseguros_zarparseguros";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Variables para la consulta
$Agent = "valor_agente"; // Reemplaza "valor_agente" con el valor adecuado
$tipificacion = "valor_tipificacion"; // Reemplaza "valor_tipificacion" con el valor adecuado

$sql = "SELECT Identificacion, Nombre, Fecha_VL FROM zarparseguros_zarparseguros.registros";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            "Identificacion" => $row["Identificacion"],
            "Nombre" => $row["Nombre"]
        );
    }
    echo json_encode($data); // Devuelve los datos en formato JSON
} else {
    echo json_encode(array()); // Devuelve un arreglo vacío si no hay resultados
}

// Cerrar la conexión a la base de datos
$conn->close();
?>