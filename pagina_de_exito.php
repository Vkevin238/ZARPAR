<?php
// Establece la conexión a la base de datos (reemplaza con tus propios detalles de conexión)
$servername = "15.235.14.40";
$username = "zarparseguros";
$password = "IngresoSeguro24*";
$dbname = "zarparseguros_zarparseguros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el número de créditos seleccionados
    $numeroCreditos = $_POST["numero_creditos"];
    
    // Inicializa un contador para recorrer los créditos
    $contadorCreditos = 1;
    
    // Prepara la consulta SQL
    $sql = "INSERT INTO Ventas (
        numero_creditos, nombre, cedula, fecha_nacimiento, correo, telefono_marcado, direccion, ciudad, 
        ocupacion, estado_civil, peso, estatura, enfermedades,
        beneficiario_1_nombre, beneficiario_1_tipo_doc, beneficiario_1_numero_doc, beneficiario_1_parentesco, beneficiario_1_porcentaje,
        beneficiario_2_nombre, beneficiario_2_tipo_doc, beneficiario_2_numero_doc, beneficiario_2_parentesco, beneficiario_2_porcentaje,
        beneficiario_3_nombre, beneficiario_3_tipo_doc, beneficiario_3_numero_doc, beneficiario_3_parentesco, beneficiario_3_porcentaje
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Utiliza una sentencia preparada para evitar la inyección de SQL
    $stmt = $conn->prepare($sql);

    // Loop para insertar registros según el número de créditos
    while ($contadorCreditos <= $numeroCreditos) {
        // Aquí, obtendrás los valores de todos los campos del formulario para cada crédito
        $nombre = $_POST["nombre_$contadorCreditos"];
        $cedula = $_POST["cedula_$contadorCreditos"];
        $fechaNacimiento = $_POST["fecha_nacimiento_$contadorCreditos"];
        $correo = $_POST["correo_$contadorCreditos"];
        $telefonoMarcado = $_POST["telefono_marcado_$contadorCreditos"];
        $direccion = $_POST["direccion_$contadorCreditos"];
        $ciudad = $_POST["ciudad_$contadorCreditos"];
        $ocupacion = $_POST["ocupacion_$contadorCreditos"];
        $estadoCivil = $_POST["estado_civil_$contadorCreditos"];
        $peso = $_POST["peso_$contadorCreditos"];
        $estatura = $_POST["estatura_$contadorCreditos"];
        $enfermedades = $_POST["enfermedades_$contadorCreditos"];

        // Datos del Beneficiario 1
        $beneficiario1Nombre = $_POST["beneficiario_1_nombre_$contadorCreditos"];
        $beneficiario1TipoDoc = $_POST["beneficiario_1_tipo_doc_$contadorCreditos"];
        $beneficiario1NumeroDoc = $_POST["beneficiario_1_numero_doc_$contadorCreditos"];
        $beneficiario1Parentesco = $_POST["beneficiario_1_parentesco_$contadorCreditos"];
        $beneficiario1Porcentaje = $_POST["beneficiario_1_porcentaje_$contadorCreditos"];

        // ... Repite el proceso para los Beneficiarios 2 y 3 si es necesario

        // Bind de los parámetros y ejecución de la consulta
        $stmt->bind_param("ssssssssssssssssssssssssssssssss", 
            $numeroCreditos, $nombre, $cedula, $fechaNacimiento, $correo, $telefonoMarcado, $direccion, $ciudad, 
            $ocupacion, $estadoCivil, $peso, $estatura, $enfermedades,
            $beneficiario1Nombre, $beneficiario1TipoDoc, $beneficiario1NumeroDoc, $beneficiario1Parentesco, $beneficiario1Porcentaje,
            // ... Repite para Beneficiarios 2 y 3
        );

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // Incrementa el contador de créditos
            $contadorCreditos++;
        } else {
            // Si hubo un error en la inserción, puedes mostrar un mensaje de error
            echo "Error al insertar datos: " . $stmt->error;
            break; // Sale del bucle si hay un error
        }
    }

    // Cierra la sentencia preparada
    $stmt->close();

    // Redirige a una página de éxito
    header("Location: pagina_de_exito.php");
    exit();
}

$conn->close();
?>
