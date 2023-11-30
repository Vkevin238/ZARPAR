<?php
date_default_timezone_set('America/Bogota');
// Conexión a la base de datos (reemplaza con tus propios datos)
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

// Obtener los datos del formulario (esto depende de tus nombres de campo)
$numeroCreditos = intval($_POST["numero_creditos_standby"]);
$_SERVER["REQUEST_METHOD"] == "POST";

for ($i = 1; $i <= $numeroCreditos; $i++) {
    $fecha_modificacion = date("Y-m-d H:i:s");
    $banco = $_POST["banco_" . $i];
    $tipoCredito = $_POST["tipo_credito_" . $i];
    $valorCredito = $_POST["valor_credito_" . $i];
    $cuota = $_POST["cuota_" . $i];
    $numeroCredito = $_POST["numero_credito_" . $i];
    $estado = $_POST["estado_" . $i];
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $fecha_expedicion = $_POST["fecha_expedicion"];
    $correo = $_POST["correo"];
    $telefono_marcado = $_POST["telefono_marcado"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $ocupacion = $_POST["ocupacion"];
    $estado_civil = $_POST["estado_civil"];
    $peso = $_POST["peso"];
    $estatura = $_POST["estatura"];
    $enfermedades = $_POST["enfermedades"];
    $beneficiario_1_nombre = $_POST["beneficiario_1_nombre"];
    $beneficiario_1_tipo_doc = $_POST["beneficiario_1_tipo_doc"];
    $beneficiario_1_numero_doc = $_POST["beneficiario_1_numero_doc"];
    $beneficiario_1_parentesco = $_POST["beneficiario_1_parentesco"];
    $porcentaje_1_parentesco = $_POST["porcentaje_1_parentesco"];
    $beneficiario_2_nombre = $_POST["beneficiario_2_nombre"];
    $beneficiario_2_tipo_doc = $_POST["beneficiario_2_tipo_doc"];
    $beneficiario_2_numero_doc = $_POST["beneficiario_2_numero_doc"];
    $beneficiario_2_parentesco = $_POST["beneficiario_2_parentesco"];
    $porcentaje_2_parentesco = $_POST["porcentaje_2_parentesco"];
    $beneficiario_3_nombre = $_POST["beneficiario_3_nombre"];
    $beneficiario_3_tipo_doc = $_POST["beneficiario_3_tipo_doc"];
    $beneficiario_3_numero_doc = $_POST["beneficiario_3_numero_doc"];
    $beneficiario_3_parentesco = $_POST["beneficiario_3_parentesco"];
    $porcentaje_3_parentesco = $_POST["porcentaje_3_parentesco"];

    // Construir la consulta UPDATE
    $sql = "UPDATE Ventas SET 
        nombre = '$nombre',
        fecha_nacimiento = '$fecha_nacimiento',
        correo = '$correo',
        telefono_marcado = '$telefono_marcado',
        direccion = '$direccion',
        ciudad = '$ciudad',
        ocupacion = '$ocupacion',
        estado_civil = '$estado_civil',
        peso = '$peso',
        estatura = '$estatura',
        enfermedades = '$enfermedades',
        beneficiario_1_nombre = '$beneficiario_1_nombre',
        beneficiario_1_tipo_doc = '$beneficiario_1_tipo_doc',
        beneficiario_1_numero_doc = '$beneficiario_1_numero_doc',
        beneficiario_1_parentesco = '$beneficiario_1_parentesco',
        beneficiario_1_porcentaje = '$porcentaje_1_parentesco',
        beneficiario_2_nombre = '$beneficiario_2_nombre',
        beneficiario_2_tipo_doc = '$beneficiario_2_tipo_doc',
        beneficiario_2_numero_doc = '$beneficiario_2_numero_doc',
        beneficiario_2_parentesco = '$beneficiario_2_parentesco',
        beneficiario_2_porcentaje = '$porcentaje_2_parentesco',
        beneficiario_3_nombre = '$beneficiario_3_nombre',
        beneficiario_3_tipo_doc = '$beneficiario_3_tipo_doc',
        beneficiario_3_numero_doc = '$beneficiario_3_numero_doc',
        beneficiario_3_parentesco = '$beneficiario_3_parentesco',
        beneficiario_3_porcentaje = '$porcentaje_3_parentesco',
        banco = '$banco',
        tipo_credito = '$tipoCredito',
        valor_credito = '$valorCredito',
        cuota = '$cuota',
        numero_credito = '$numeroCredito',
        Estado = '$estado'
    WHERE cedula = '$cedula'"; // Actualiza el registro con la cédula específica

    // Ejecutar la consulta UPDATE
    if ($conn->query($sql) !== TRUE) {
        echo "Error al actualizar datos: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redirigir a una página de confirmación o mostrar un mensaje de éxito
echo "Datos actualizados con éxito";
?>
