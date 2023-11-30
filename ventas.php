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
$sql = "SELECT id, banco, tipo_credito, valor_credito, cuota, numero_credito, nombre, cedula, fecha_nacimiento, fecha_expedicion, correo, telefono_marcado, direccion, ciudad, ocupacion, estado_civil, peso, estatura, enfermedades, 
    beneficiario_1_nombre, beneficiario_1_tipo_doc, beneficiario_1_numero_doc, beneficiario_1_parentesco, beneficiario_1_porcentaje, 
    beneficiario_2_nombre, beneficiario_2_tipo_doc, beneficiario_2_numero_doc, beneficiario_2_parentesco, beneficiario_2_porcentaje, 
    beneficiario_3_nombre, beneficiario_3_tipo_doc, beneficiario_3_numero_doc, beneficiario_3_parentesco, beneficiario_3_porcentaje, 
    Fecha, Estado, Usuario 
    FROM Ventas WHERE Estado = 'venta'";

// Ejecutar la consulta
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Ventas</title>
    <style>
        /* Estilo para la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div id="descarga">
        <a href="descarga.php"><button> Click para descarga </button></a>
    </div>
    <h1>Tabla de Ventas </h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Banco</th>
            <th>Tipo de Crédito</th>
            <th>Valor del Crédito</th>
            <th>Cuota</th>
            <th>Número de Crédito</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Fecha de Nacimiento</th>
            <th>Fecha de Expedicion</th>
            <th>Correo</th>
            <th>Teléfono Marcado</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Ocupación</th>
            <th>Estado Civil</th>
            <th>Peso</th>
            <th>Estatura</th>
            <th>Enfermedades</th>
            <th>Beneficiario 1 Nombre</th>
            <th>Beneficiario 1 Tipo de Doc</th>
            <th>Beneficiario 1 Número de Doc</th>
            <th>Beneficiario 1 Parentesco</th>
            <th>Beneficiario 1 Porcentaje</th>
            <th>Beneficiario 2 Nombre</th>
            <th>Beneficiario 2 Tipo de Doc</th>
            <th>Beneficiario 2 Número de Doc</th>
            <th>Beneficiario 2 Parentesco</th>
            <th>Beneficiario 2 Porcentaje</th>
            <th>Beneficiario 3 Nombre</th>
            <th>Beneficiario 3 Tipo de Doc</th>
            <th>Beneficiario 3 Número de Doc</th>
            <th>Beneficiario 3 Parentesco</th>
            <th>Beneficiario 3 Porcentaje</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Usuario</th>
        </tr>
        <?php
        // Imprimir los datos en la tabla
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["banco"] . "</td>";
                echo "<td>" . $row["tipo_credito"] . "</td>";
                echo "<td>" . $row["valor_credito"] . "</td>";
                echo "<td>" . $row["cuota"] . "</td>";
                echo "<td>" . $row["numero_credito"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["cedula"] . "</td>";
                echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                echo "<td>" . $row["fecha_expedicion"] . "</td>";
                echo "<td>" . $row["correo"] . "</td>";
                echo "<td>" . $row["telefono_marcado"] . "</td>";
                echo "<td>" . $row["direccion"] . "</td>";
                echo "<td>" . $row["ciudad"] . "</td>";
                echo "<td>" . $row["ocupacion"] . "</td>";
                echo "<td>" . $row["estado_civil"] . "</td>";
                echo "<td>" . $row["peso"] . "</td>";
                echo "<td>" . $row["estatura"] . "</td>";
                echo "<td>" . $row["enfermedades"] . "</td>";
                echo "<td>" . $row["beneficiario_1_nombre"] . "</td>";
                echo "<td>" . $row["beneficiario_1_tipo_doc"] . "</td>";
                echo "<td>" . $row["beneficiario_1_numero_doc"] . "</td>";
                echo "<td>" . $row["beneficiario_1_parentesco"] . "</td>";
                echo "<td>" . $row["beneficiario_1_porcentaje"] . "</td>";
                echo "<td>" . $row["beneficiario_2_nombre"] . "</td>";
                echo "<td>" . $row["beneficiario_2_tipo_doc"] . "</td>";
                echo "<td>" . $row["beneficiario_2_numero_doc"] . "</td>";
                echo "<td>" . $row["beneficiario_2_parentesco"] . "</td>";
                echo "<td>" . $row["beneficiario_2_porcentaje"] . "</td>";
                echo "<td>" . $row["beneficiario_3_nombre"] . "</td>";
                echo "<td>" . $row["beneficiario_3_tipo_doc"] . "</td>";
                echo "<td>" . $row["beneficiario_3_numero_doc"] . "</td>";
                echo "<td>" . $row["beneficiario_3_parentesco"] . "</td>";
                echo "<td>" . $row["beneficiario_3_porcentaje"] . "</td>";
                echo "<td>" . $row["Fecha"] . "</td>";
                echo "<td>" . $row["Estado"] . "</td>";
                echo "<td>" . $row["Usuario"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='34'>No se encontraron ventas en estado standby.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>