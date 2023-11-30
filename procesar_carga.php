<?php
// Establece la zona horaria a Colombia
date_default_timezone_set('America/Bogota');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == 0) {
        $archivo = $_FILES["archivo"]["tmp_name"];

        session_start(); // Iniciar sesión

// Conectar a la base de datos (reemplaza con tus credenciales)
$servername = "15.235.14.40";
$username = "zarparseguros";
$password = "IngresoSeguro24*";
$dbname = "zarparseguros_zarparseguros";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

              // Leer y procesar el archivo CSV delimitado por ;
        $registros_cargados = 0;
        $registros_no_cargados = 0;
        $fecha_actual = date("Y-m-d H:i:s");

        $file = fopen($archivo, 'r');
        if ($file) {
            // Omitir la fila de encabezados si existen
            fgetcsv($file, 0, ';');

            while (($line = fgetcsv($file, 0, ';')) !== false) {
                // Asegurarse de que haya suficientes columnas en la fila
                if (count($line) >= 2) {
                    $cedula = $line[0];
                    $nombre = $line[1];
                    $modelo = $line[2];
                    $anio = $line[3];
                    $placa = $line[4];
                    $telefono = $line[5];
                    $correo = $line[6];
                    $ciudad = $line[7];
                    $n_base = $line[8];
                    // Otras columnas...

                    // Verificar si la cédula ya existe en la base de datos
                    $sql = "SELECT * FROM registros WHERE Identificacion = '$cedula'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) == 0) {
                        // La cédula no existe, puedes insertar el registro
                        $sql = "INSERT INTO registros (Identificacion, Nombre, Modelo, Anio_Modelo, Placa, Telefono, Correo, Ciudad, n_base, Estado, Ult_Modificacion) VALUES ('$cedula', '$nombre', '$modelo', '$anio', '$placa', '$telefono', '$correo', '$ciudad', '$n_base', 'nuevo', '$fecha_actual')";
                        if (mysqli_query($conn, $sql)) {
                            $registros_cargados++;
                        } else {
                            // Manejar error en la inserción
                            $registros_no_cargados++;
                        }
                    } else {
                        // La cédula ya existe, cuenta como registro no cargado debido a duplicado
                        $registros_no_cargados++;
                    }
                } else {
                    // La fila no tiene suficientes columnas, cuenta como registro no cargado
                    $registros_no_cargados++;
                }
            }
            fclose($file);
        }

        echo "Registros cargados: " . $registros_cargados . "<br>";
        echo "Registros no cargados debido a duplicados o datos insuficientes: " . $registros_no_cargados;

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    } else {
        echo "Error al cargar el archivo.";
    }
}
?>