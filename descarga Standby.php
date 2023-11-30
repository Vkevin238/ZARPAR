<?php
// Credenciales de la base de datos
$servername = "15.235.14.40";
$username = "zarparseguros";
$password = "IngresoSeguro24*";
$dbname = "zarparseguros_zarparseguros";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT id, banco, tipo_credito, valor_credito, cuota, numero_credito, nombre, cedula, fecha_nacimiento, correo, telefono_marcado, direccion, ciudad, ocupacion, estado_civil, peso, estatura, enfermedades, 
    beneficiario_1_nombre, beneficiario_1_tipo_doc, beneficiario_1_numero_doc, beneficiario_1_parentesco, beneficiario_1_porcentaje, 
    beneficiario_2_nombre, beneficiario_2_tipo_doc, beneficiario_2_numero_doc, beneficiario_2_parentesco, beneficiario_2_porcentaje, 
    beneficiario_3_nombre, beneficiario_3_tipo_doc, beneficiario_3_numero_doc, beneficiario_3_parentesco, beneficiario_3_porcentaje, 
    Fecha, Estado, Usuario 
    FROM Ventas WHERE Estado = 'Standby'";

// Ejecutar la consulta
$result = $conn->query($sql);


// Ejecutar la consulta
$result = $conn->query($sql);

// Configurar las cabeceras HTTP para la descarga del archivo CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="datos.csv"');

// Crear un recurso de flujo para el archivo CSV
$salida = fopen('php://output', 'w');

// Obtener los nombres de las columnas para el encabezado del CSV
$columnas = array(
    'ID', 'Banco', 'Tipo de Crédito', 'Valor del Crédito', 'Cuota', 'Número de Crédito', 'Nombre', 'Cédula', 'Fecha de Nacimiento',
    'Correo', 'Teléfono Marcado', 'Dirección', 'Ciudad', 'Ocupación', 'Estado Civil', 'Peso', 'Estatura', 'Enfermedades',
    'Beneficiario 1 Nombre', 'Beneficiario 1 Tipo de Doc', 'Beneficiario 1 Número de Doc', 'Beneficiario 1 Parentesco', 'Beneficiario 1 Porcentaje',
    'Beneficiario 2 Nombre', 'Beneficiario 2 Tipo de Doc', 'Beneficiario 2 Número de Doc', 'Beneficiario 2 Parentesco', 'Beneficiario 2 Porcentaje',
    'Beneficiario 3 Nombre', 'Beneficiario 3 Tipo de Doc', 'Beneficiario 3 Número de Doc', 'Beneficiario 3 Parentesco', 'Beneficiario 3 Porcentaje',
    'Fecha', 'Estado', 'Usuario'
);

// Escribir el encabezado en el archivo CSV
fputcsv($salida, $columnas);

// Iterar sobre los resultados y agregarlos al CSV
while ($fila = $result->fetch_assoc()) {
    fputcsv($salida, $fila);
}

// Cerrar la conexión a la base de datos
$conn->close();
exit();
?>