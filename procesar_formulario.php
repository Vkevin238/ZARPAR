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
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

// Verifica si se ha enviado el formulario de ingreso de nuevos datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene la identificación desde el formulario
    $usuario = $_POST["usuario"];
    $tipificacion = $_POST["tipificacion"];
    $identificacion = limpiarDatos($_POST["cedula"]);

    if ($tipificacion === 'standby') {
        $sql = "SELECT * FROM Ventas WHERE estado = 'Standby'";

        // Ejecutar la consulta
        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Iterar a través de los resultados
            while ($row = $result->fetch_assoc()) {
                // Aquí puedes acceder a los datos de cada fila, por ejemplo:
                $estado = $row["Estado"];
                $nombre = $row["nombre"];
                $cedula = $row["cedula"];
                $fecha_nacimiento = $row["fecha_nacimiento"];
                $fecha_expedicion = $row["fecha_expedicion"];
                $correo = $row["correo"];
                $tel_marca = $row["telefono_marcado"];
                $direccion = $row["direccion"];
                $ciudad = $row["ciudad"];
                $ocupacion = $row["ocupacion"];
                $estado_civil = $row["estado_civil"];
                $peso = $row["peso"];
                $estatura = $row["estatura"];
                $enfermedades = $row["enfermedades"];
                $beneficiario_one = $row["beneficiario_1_nombre"];
                $beneficiario_one_tipo = $row["beneficiario_1_tipo_doc"];
                $beneficiario_one_iden = $row["beneficiario_1_numero_doc"];
                $beneficiario_one_parent = $row["beneficiario_1_parentesco"];
                $beneficiario_one_porcentaje = $row["beneficiario_1_porcentaje"];
                $beneficiario_two = $row["beneficiario_2_nombre"];
                $beneficiario_two_tipo = $row["beneficiario_2_tipo_doc"];
                $beneficiario_two_iden = $row["beneficiario_2_numero_doc"];
                $beneficiario_two_parent = $row["beneficiario_2_parentesco"];
                $beneficiario_two_porcentaje = $row["beneficiario_2_porcentaje"];
                $beneficiario_three = $row["beneficiario_3_nombre"];
                $beneficiario_three_tipo = $row["beneficiario_3_tipo_doc"];
                $beneficiario_three_iden = $row["beneficiario_3_numero_doc"];
                $beneficiario_three_parent = $row["beneficiario_3_parentesco"];
                $beneficiario_three_porcentaje = $row["beneficiario_3_porcentaje"];
                $banco = $row["banco"];
                $tipo_credito = $row["tipo_credito"];
                $valor_c = $row["valor_credito"];
                $cuota = $row["cuota"];
                $numero_credito = $row["numero_credito"];




        
                echo '<div class="contenedor_2">';
                echo '<form method="post" action="guardar_standby.php">';
                echo '<div class="campo">';
                echo '<div id="campos_credito" class="campos-horizontal">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="nombre">NOMBRE CLIENTE:</label>';
                echo '<input type="text" name="nombre" id="nombre" value="' . $nombre . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="cedula">CEDULA:</label>';
                echo '<input type="text" name="cedula" id="cedula" value="' . $cedula . '">';
                echo '</div>';
                echo '<br>';
                echo '</div>';
                echo '<br>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_3_nombre">Banco:</label>';
                echo '<input type="text" name="banco" id="banco" value="' . $banco . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="Tipo de credito">Tipo de credito:</label>';
                echo '<input type="text" name="Tipo de credito" id="tipo de credito" value="' . $tipo_credito . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="valor_credito">valor del credito:</label>';
                echo '<input type="text" name="cuota" id="cuota" value="' . $valor_c . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="numero_credito:</label>';
                echo '<input type="text" name="numero_credito" id="numero_credito" value="' . $numero_credito . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="cuota"> Cuota:</label>';
                echo '<input type="text" name="cuota" id="cuota" value="' . $cuota . '">';
                echo '</div>';
                echo '<br>';
                echo '<div class="campo">';
                echo '<label for="fecha_nacimiento">FECHA DE NACIMIENTO:</label>';
                echo '<input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="' . $fecha_nacimiento . '">';
                echo '</div>';
                echo '<br>';
                echo '<div class="campo">';
                echo '<label for="fecha_expedicion">FECHA DE EXPEDICION:</label>';
                echo '<input type="text" name="fecha_expedicion" id="fecha_expedicion" value="' . $fecha_expedicion . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="correo">CORREO:</label>';
                echo '<input type="text" name="correo" id="correo" value="' . $correo . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="telefono_marcado">TELEFONO:</label>';
                echo '<input type="text" name="telefono_marcado" id="telefono_marcado" value="' . $tel_marca . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="direccion">DIRECCION:</label>';
                echo '<input type="text" name="direccion" id="direccion" value="' . $direccion . '">';
                echo '</div>';
                echo '<br>';
                echo '<div class="campo">';
                echo '<label for="ciudad">CIUDAD:</label>';
                echo '<input type="text" name="ciudad" id="ciudad" value="' . $ciudad . '">';
                echo '</div>';

                echo '<div class="campo">';
                echo '<label for="ocupacion">OCUPACION:</label>';
                echo '<input type="text" name="ocupacion" id="ocupacion" value="' . $ocupacion . '">';
                echo  '</div>';
                echo '<div class="campo">';
                echo '<label for="estado_civil">ESTADO CIVIL:</label>';
                echo '<input type="text" name="estado_civil" id="estado_civil" value="' . $estado_civil . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="peso">PESO:</label>';
                echo '<input type="text" name="peso" id="peso" value="' . $peso . '">';
                echo '</div>';
                echo '<br>';
                echo '<div class="campo">';
                echo '<label for="estatura">ESTATURA:</label>';
                echo '<input type="text" name="estatura" id="estatura" value="' . $estatura . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="enfermedades">ENFERMEDADES:</label>';
                echo '<input type="text" name="enfermedades" id="enfermedades" value="' . $enfermedades . '">';
                echo '</div>';

                

                echo '<h3>BENEFICIARIOS :</h3>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_1_nombre">Nombre:</label>';
                echo '<input type="text" name="beneficiario_1_nombre" id="beneficiario_1_nombre" value="' . $beneficiario_one . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_1_nombre">beneficiario_1_tipo_doc:</label>';
                echo '<input type="text" name="beneficiario_1_tipo_doc" id="beneficiario_1_tipo_doc" value="' . $beneficiario_one_tipo . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_1_nombre">beneficiario_1_numero_doc:</label>';
                echo '<input type="text" name="beneficiario_1_numero_doc" id="beneficiario_1_numero_doc" value="' . $beneficiario_one_iden . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_1_nombre">beneficiario_1_parentesco:</label>';
                echo '<input type="text" name="beneficiario_1_parentesco" id="beneficiario_1_parentesco" value="' . $beneficiario_one_parent . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_1_nombre">beneficiario_1_porcentaje:</label>';
                echo '<input type="text" name="beneficiario_1_porcentaje" id="beneficiario_1_porcentaje" value="' . $beneficiario_one_porcentaje . '">';
                echo '</div>';
                echo '<br>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_2_nombre">Nombre:</label>';
                echo '<input type="text" name="beneficiario_2_nombre" id="beneficiario_2_nombre" value="' . $beneficiario_two . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_2_nombre">beneficiario_2_tipo_doc:</label>';
                echo '<input type="text" name="beneficiario_2_tipo_doc" id="beneficiario_2_tipo_doc" value="' . $beneficiario_two_tipo . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_2_nombre">beneficiario_2_numero_doc:</label>';
                echo '<input type="text" name="beneficiario_2_numero_doc" id="beneficiario_2_numero_doc" value="' . $beneficiario_two_iden . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_2_nombre">beneficiario_2_parentesco:</label>';
                echo '<input type="text" name="beneficiario_2_parentesco" id="beneficiario_2_parentesco" value="' . $beneficiario_two_parent . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_2_nombre">beneficiario_2_porcentaje:</label>';
                echo '<input type="text" name="beneficiario_2_porcentaje" id="beneficiario_2_porcentaje" value="' . $beneficiario_two_porcentaje . '">';
                echo '</div>';
                echo '<br>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_3_nombre">Nombre:</label>';
                echo '<input type="text" name="beneficiario_3_nombre" id="beneficiario_3_nombre" value="' . $beneficiario_three . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_3_nombre">beneficiario_3_tipo_doc:</label>';
                echo '<input type="text" name="beneficiario_3_tipo_doc" id="beneficiario_3_tipo_doc" value="' . $beneficiario_three_tipo . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_3_nombre">beneficiario_3_numero_doc:</label>';
                echo '<input type="text" name="beneficiario_3_numero_doc" id="beneficiario_3_numero_doc" value="' . $beneficiario_three_iden . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_3_nombre">beneficiario_3_parentesco:</label>';
                echo '<input type="text" name="beneficiario_3_parentesco" id="beneficiario_3_parentesco" value="' . $beneficiario_three_parent . '">';
                echo '</div>';
                echo '<div class="campo">';
                echo '<label for="beneficiario_3_nombre">beneficiario_3_porcentaje:</label>';
                echo '<input type="text" name="beneficiario_3_porcentaje" id="beneficiario_3_porcentaje" value="' . $beneficiario_three_porcentaje . '">';
                echo '</div>';
                echo '<input type="text" id="usuario" name="usuario" style="display: none;" ><br><br>';
                echo '<button type="submit">Guardar</button>';
                echo '<input type="hidden" name="numero_creditos_standby" id="numero_creditos_standby">';
                echo '</form>';
                echo '</div>';

                
            }

            
        } else {
            echo "No se encontraron resultados.";
        }
    }else {
        // Consulta SQL para obtener los datos según la identificación proporcionada
        $sql = "SELECT Identificacion, Nombre, Modelo, Anio_Modelo, Placa, Telefono, Correo, Ciudad FROM registros WHERE Identificacion = '$identificacion'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Imprime los datos en una tabla HTML
            echo "<table class='tabla1' border='1'>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Modelo</th>
                        <th>Año Modelo</th>
                        <th>Placa</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Ciudad</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["Identificacion"] . "</td>
                        <td>" . $row["Nombre"] . "</td>
                        <td>" . $row["Modelo"] . "</td>
                        <td>" . $row["Anio_Modelo"] . "</td>
                        <td>" . $row["Placa"] . "</td>
                        <td>" . $row["Telefono"] . "</td>
                        <td>" . $row["Correo"] . "</td>
                        <td>" . $row["Ciudad"] . "</td>
                    </tr>";
            }

            echo "</table>";

            // Agrega aquí la lista de tipificaciones seleccionable
            echo "<h3>Seleccione una Tipificación:</h3>";

            // Conecta a la base de datos para obtener las tipificaciones
            $consulta_tipificaciones = "SELECT * FROM Tipificaciones WHERE id <> 1 AND id <> 8 AND id <> 7 AND id <> 9";
            $result_tipificaciones = $conn->query($consulta_tipificaciones);

            if ($result_tipificaciones->num_rows > 0) {
                    echo '<form class="formnew1" method="post" action="guardar_tipificacion.php">';
                    echo '<input type="hidden" name="cedula" value="' . htmlspecialchars($identificacion) . '">';
                    echo '<select name="tipificacion">';
                    while ($fila_tipificacion = $result_tipificaciones->fetch_assoc()) {
                        $id_tipificacion = $fila_tipificacion['tipificacion'];
                        $nombre_tipificacion = $fila_tipificacion['tipificacion'];
                        echo "<option value='$id_tipificacion'>$nombre_tipificacion</option>";
                        
                    }

                    echo '</select>';
                    echo '<input type="text" id="fecha_hora" name="fecha_hora" placeholder="Seleccione fecha y hora">';
                    echo "<label> <h3>  Observación:</h3></label>";
                    echo '<input type="text" id="observacion" name="observacion">';
                    echo '<br>';
                    echo '<br>';
                    echo '<input type="submit" value="Guardar Tipificación" class="button">';
                    echo '</form>';
                    echo '<br>';
                    echo '<input type="button" value="Venta" class="button" onclick="mostrarElementoOculto()">';
                    
                } else {
                    echo "No se encontraron tipificaciones.";
                }
            }

        // A continuación, puedes agregar el formulario de ingreso de datos de créditos.
       
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.0/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.0/jquery.timepicker.min.css">
    
    <title>Formulario</title>
    <style>
    .contenedor_2 {
        width: 80%; /* El 80% del viewport será el ancho del contenedor */
        padding: 50px;
        font-size: 12px;
        border-radius: 10px;
        margin: 0 auto; /* Centra el contenedor horizontalmente */
        border-collapse: collapse;
        background-color: #f2f2f2; /* Color de fondo para visualización */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }
    .contenedor {
        width: 80%; /* El 80% del viewport será el ancho del contenedor */
        padding: 50px;
        font-size: 12px;
        border-radius: 10px;
        margin: 0 auto; /* Centra el contenedor horizontalmente */
        border-collapse: collapse;
        background-color: #f2f2f2; /* Color de fondo para visualización */
        display: none;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    .formnew1{
        font-size: 12px;
    }

        
        /* Estilos para la tabla */
    .tabla1 {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    /* Estilos para las celdas del encabezado */
    .tabla1 th {
        background-color: #f2f2f2;
        font-size: 12px;
        font-weight: bold;
        text-align: left;
        padding: 10px;
        border: 1px solid #ddd;
    }

    /* Estilos para las celdas de datos */
    .tabla1 td {
        text-align: left;
        padding: 10px;
        border: 1px solid #ddd;
    }

    /* Estilo para filas impares */
    .tabla1 tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .tabla1 {
    user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    }

    /* Estilo para filas al pasar el ratón por encima */
    .tabla1 tr:hover {
        background-color: #e0e0e0;
    }

        .campos-horizontal {
            display: flex;
            flex-direction: column;
        }

        .campos-horizontal div {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
        }

        .campos-horizontal label {
            margin-right: 10px;
        }

        /* Estilo para los campos individuales */
        .campo {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 10px;
        }

        .campo label {
            margin-right: 5px;
        }

        /* Estilo general para el cuerpo del formulario */
    
    body {
        font-family: Arial, sans-serif;
        margin: 10px; /* Margen general de 3px para todo el cuerpo */
        padding: 0;
        background-color: #f2f2f2;
    }

        /* Contenedor principal */
        .container {
            max-width: 80%; /* Establece el ancho al 80% de la ventana del navegador */
            margin: 20px auto; /* Agrega margen vertical y centraliza el formulario */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        /* Encabezado del formulario */
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Campos de entrada */
        .campo {
            margin-bottom: 5px;
            margin: 1px;
        }

        /* Etiquetas de los campos */
        .campo label {
            display: block;
            font-weight: bold;
            margin-right: 10px;
            margin-bottom: 5px;
            
        }

        /* Campos de entrada de texto y select */
        input[type="text"] {
            padding: 5px;
            border: 0.5px solid #ccc;
            border-radius: 5px;
            margin-right: 5px;
        }

        select {
            width: 15%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            
        }

        /* Contenedor de los campos de crédito generados dinámicamente */
        #campos_credito {
            display: 15%;
            flex-wrap: 15%;
            gap: 20px;
        }

        /* Estilo para los campos de crédito individuales */
        .campo-credito {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Botón de enviar */
        .button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: block;
            
        }

        /* Botón de enviar */
        .button2 {
            background-color: #03a680;
            color: #fff;
            border: none;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: block;
            
        }

        /* Estilos para los títulos de los beneficiarios */
        h3 {
            font-size: 12px;
            margin-top: 20px;
        }

        /* Estilos para los selectores de porcentaje */
        .campo-porcentaje select {
            width: 15px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #porcentaje {
        width: 100px; /* Ajusta el ancho según tus necesidades */
        }

        #porcentaje_1_parentesco {
        width: 100px; /* Ajusta el ancho según tus necesidades */
        }

        #porcentaje_2_parentesco {
        width: 100px; /* Ajusta el ancho según tus necesidades */
        }

        #porcentaje_3_parentesco {
        width: 100px; /* Ajusta el ancho según tus necesidades */
        }
        



    </style>
</head>
<body>
<div id="elemento_oculto" class="contenedor">
<form method="post" action="guardar_datos.php">
    <h1>Venta</h1>

    <!-- Agrega una lista desplegable para seleccionar el número de créditos -->
    <label for="numero_creditos">Número de Créditos:</label>
    <select id="numero_creditos" onchange="mostrarCamposCredito()">
        <option value="1">1 Crédito</option>
        <option value="2">2 Créditos</option>
        <option value="3">3 Créditos</option>
        <option value="4">4 Créditos</option>
        <option value="5">5 Créditos</option>
    </select>

    <!-- Contenedor para los campos de créditos generados dinámicamente -->
    <div id="campos_credito" class="campos-horizontal"></div>

    <!-- Campos adicionales que no se duplican -->
    <h2>Datos Adicionales:</h2>
    <div class="campo">
        <label for="nombre">NOMBRE CLIENTE:</label>
        <input type="text" name="nombre" id="nombre">
    </div>
    <div class="campo">
        <label for="cedula">CEDULA:</label>
        <input type="text" name="cedula" id="cedula">
    </div>
    <div class="campo">
        <label for="fecha_nacimiento">FECHA DE NACIMIENTO:</label>
        <input type='text' name='fecha_nacimiento' id='fecha_nacimiento'>
    </div>
    <div class="campo">
        <label for="fecha_nacimiento">FECHA DE EXPEDICION:</label>
        <input type='text' name='fecha_expedicion' id='fecha_expedicion'>
    </div>
    <div class="campo">
        <label for='correo'>CORREO:</label>
        <input type='text' name='correo' id='correo'>
    </div>
    <div class="campo">
        <label for='telefono_marcado'>TELEFONO AL QUE SE LE MARCO:</label>
        <input type='text' name='telefono_marcado' id='telefono_marcado'>
    </div>
    <div class="campo">
        <label for='direccion'>DIRECCION:</label>
        <input type='text' name='direccion' id='direccion'>
    </div>
    <div class="campo">
        <label for='ciudad'>CIUDAD:</label>
        <input type='text' name='ciudad' id='ciudad'>
    </div>
    <div class="campo">
        <label for='ocupacion'>OCUPACION:</label>
        <input type='text' name='ocupacion' id='ocupacion'>
    </div>
    <div class="campo">
        <label for='estado_civil'>ESTADO CIVIL:</label>
        <input type='text' name='estado_civil' id='estado_civil'>
    </div>
    <div class="campo">
        <label for='peso'>PESO:</label>
        <input type='text' name='peso' id='peso'>
    </div>
    <div class="campo">
        <label for='estatura'>ESTATURA:</label>
        <input type='text' name='estatura' id='estatura'>
    </div>
    <div class="campo">
        <label for='enfermedades'>ENFERMEDADES:</label>
        <input type='text' name='enfermedades' id='enfermedades'>
    </div>
    <h3>BENEFICIARIOS :</h3>
    <div class="campo">
        <label for='beneficiario_1_nombre'>Nombre:</label>
        <input type='text' name='beneficiario_1_nombre' id='beneficiario_1_nombre'>
    </div>
    <div class="campo">
        <label for='beneficiario_1_tipo_doc'>Tipo Doc:</label>
        <input type='text' name='beneficiario_1_tipo_doc' id='beneficiario_1_tipo_doc'>
    </div>
    <div class="campo">
        <label for='beneficiario_1_numero_doc'>Número Doc:</label>
        <input type='text' name='beneficiario_1_numero_doc' id='beneficiario_1_numero_doc'>
    </div>
    <div class="campo">
        <label for='beneficiario_1_parentesco'>Parentesco:</label>
        <input type='text' name='beneficiario_1_parentesco' id='beneficiario_1_parentesco'>
    </div>
    <div class="campo">
    <label for='porcentaje'>%:</label>
    <select name='porcentaje_1_parentesco' id='porcentaje_1_parentesco'>
        <?php
        for ($i = 0; $i <= 100; $i++) {
            echo "<option value='$i'>$i%</option>";
        }
        ?>
    </select>
</div>
<br>
    <div class="campo">
        <label for='beneficiario_2_nombre'>Nombre:</label>
        <input type='text' name='beneficiario_2_nombre' id='beneficiario_2_nombre'>
    </div>
    <div class="campo">
        <label for='beneficiario_2_tipo_doc'>Tipo Doc:</label>
        <input type='text' name='beneficiario_2_tipo_doc' id='beneficiario_2_tipo_doc'>
    </div>
    <div class="campo">
        <label for='beneficiario_2_numero_doc'>Número Doc:</label>
        <input type='text' name='beneficiario_2_numero_doc' id='beneficiario_2_numero_doc'>
    </div>
    <div class="campo">
        <label for='beneficiario_2_parentesco'>Parentesco:</label>
        <input type='text' name='beneficiario_2_parentesco' id='beneficiario_2_parentesco'>
    </div>
    <div class="campo">
    <label for='porcentaje'>%:</label>
    <select name='porcentaje_2_parentesco' id='porcentaje_2_parentesco'>
        <?php
        for ($i = 0; $i <= 100; $i++) {
            echo "<option value='$i'>$i%</option>";
        }
        ?>
    </select>
</div>
<br>
    <div class="campo">
        <label for='beneficiario_3_nombre'>Nombre:</label>
        <input type='text' name='beneficiario_3_nombre' id='beneficiario_3_nombre'>
    </div>
    <div class="campo">
        <label for='beneficiario_3_tipo_doc'>Tipo Doc:</label>
        <input type='text' name='beneficiario_3_tipo_doc' id='beneficiario_3_tipo_doc'>
    </div>
    <div class="campo">
        <label for='beneficiario_3_numero_doc'>Número Doc:</label>
        <input type='text' name='beneficiario_3_numero_doc' id='beneficiario_3_numero_doc'>
    </div>
    <div class="campo">
        <label for='beneficiario_3_parentesco'>Parentesco:</label>
        <input type='text' name='beneficiario_3_parentesco' id='beneficiario_3_parentesco'>
    </div>
    <div class="campo">
    <label for='porcentaje'>%:</label>
    <select name='porcentaje_3_parentesco' id='porcentaje_3_parentesco'>
        <?php
        for ($i = 0; $i <= 100; $i++) {
            echo "<option value='$i'>$i%</option>";
        }
        ?>
    </select>
    
    <!-- ... tus campos de formulario ... -->
    <input type="hidden" name="numero_creditos_hidden" id="numero_creditos_hidden">
    <input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>" style="display: none;" > <br><br>
    <button type="submit">Guardar</button>
    </form>

</div>

    <!-- Agrega más campos de datos adicionales aquí -->

    <script>
        function mostrarCamposCredito() {
            // Obtén el valor seleccionado en la lista desplegable
            var numeroCreditos = document.getElementById("numero_creditos").value;
            document.getElementById("numero_creditos_hidden").value = numeroCreditos;
            // Contenedor de campos de crédito
            var camposCreditoContainer = document.getElementById("campos_credito");
            
            // Limpia cualquier contenido anterior en el contenedor
            camposCreditoContainer.innerHTML = "";
            
            // Genera campos de crédito según la selección
            for (var i = 1; i <= numeroCreditos; i++) {
                camposCreditoContainer.innerHTML += `
                    <div class="campo">
                        <h3>Crédito ${i}:</h3>
                        <div>
                            <label for="aseguradoras_${i}">Aseguradoras:</label>
                            <input type="text" name="aseguradoras_${i}" id="aseguradoras_${i}">
                        </div>
                        <div>
                            <label for="banco_${i}">Banco:</label>
                            <input type="text" name="banco_${i}" id="banco_${i}">
                        </div>
                        <div>
                            <label for="tipo_credito_${i}">Tipo de Crédito:</label>
                            <input type="text" name="tipo_credito_${i}" id="tipo_credito_${i}">
                        </div>
                        <div>
                            <label for="valor_credito_${i}">Valor Crédito:</label>
                            <input type="text" name="valor_credito_${i}" id="valor_credito_${i}">
                        </div>
                        <div>
                            <label for="cuota_${i}">Cuota Anual:</label>
                            <input type="text" name="cuota_${i}" id="cuota_${i}">
                        </div>
                        <div>
                            <label for="numero_credito_${i}">Número de Crédito:</label>
                            <input type="text" name="numero_credito_${i}" id="numero_credito_${i}">
                        </div>
                        <div>
                            <label for="estado_${i}">Estado:</label>
                            <select name="estado_${i}" id='porcentaje'>
                                <option value="Venta">Venta</option>
                                <option value="Standby">Standby</option>
                            </select>
                        </div>
                        
                        <!-- Agrega más campos de crédito según tus necesidades -->
                    </div>
                `;
            }
        }
    </script>

<script>
    function mostrarElementoOculto() {
        // Obtén el elemento oculto por su ID
        var elementoOculto = document.getElementById("elemento_oculto");

        // Cambia su estilo para mostrarlo
        elementoOculto.style.display = "block";
    }
    function guardarventa(indice) {
        // Obtén los valores de los campos de crédito correspondientes al índice
        var banco = document.getElementById("banco_" + indice).value;
        var tipoCredito = document.getElementById("tipo_credito_" + indice).value;
        var valorCredito = document.getElementById("valor_credito_" + indice).value;
        var cuota = document.getElementById("cuota_" + indice).value;
        var numeroCredito = document.getElementById("numero_credito_" + indice).value;
        var aseguradoras = document.getElementById("aseguradoras_" + indice).value;

        // Aquí puedes hacer lo que necesites con los valores obtenidos, por ejemplo, guardarlos en una base de datos o realizar alguna acción específica para ese conjunto de campos de crédito.
        // Por ejemplo, podrías imprimirlos en la consola para depuración:
        console.log("Datos del Crédito " + indice + ":");
        console.log("Banco: " + banco);
        console.log("Tipo de Crédito: " + tipoCredito);
        console.log("Valor Crédito: " + valorCredito);
        console.log("Cuota Anual: " + cuota);
        console.log("Número de Crédito: " + numeroCredito);
        console.log("Aseguradoras: " + aseguradoras);
    }
</script>

    </div>


    <script>
$(document).ready(function() {
    // Ocultar el campo de fecha y hora inicialmente
    $("#fecha_hora").hide();

    // Mostrar el campo de fecha y hora cuando se selecciona una tipificación
    $("select[name='tipificacion']").on('change', function() {
        if ($(this).val() !== '') {
            $("#fecha_hora").show();
            // Inicializar el Datepicker
            $("#fecha_hora").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0, // Evitar fechas pasadas
                // Otras opciones de configuración según tus necesidades
            });
        } else {
            // Ocultar el campo de fecha y hora si no se selecciona ninguna tipificación
            $("#fecha_hora").hide();
        }
    });
});
</script>

</body>
</html>