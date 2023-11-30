<?php
session_start();
// Establece la zona horaria a Colombia
date_default_timezone_set('America/Bogota');
// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php"); // Redirige a la página de inicio de sesión
    exit();
}
$usuario = $_SESSION["nombre_usuario"];

?>

<!DOCTYPE html>
<html>
<head>
<div class="contenedor">
    <title>Dashboard</title>
    <!-- Estilos CSS y otros elementos -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Agrega jQuery -->
    <script>
        // Función para cargar las tipificaciones desde la base de datos
        function loadTipificaciones() {
            $.ajax({
                type: "GET",
                url: "get_tipificaciones.php", // Archivo PHP para obtener las tipificaciones
                dataType: "json",
                success: function (data) {
                    var tipificacionSelect = document.getElementById("tipificacion");

                    // Limpia las opciones actuales de tipificaciones
                    tipificacionSelect.innerHTML = "";

                    // Agrega las nuevas opciones de tipificaciones desde los datos obtenidos
                    for (var i = 0; i < data.length; i++) {
                        var option = document.createElement("option");
                        option.text = data[i];
                        tipificacionSelect.add(option);
                    }
                },
                error: function () {
                    console.log("Error al obtener las tipificaciones.");
                }
            });
        }

        // Función para cargar las cédulas en función de la tipificación seleccionada
        function loadCedulas() {
            var tipificacion = document.getElementById("tipificacion").value;
            var cedulaSelect = document.getElementById("cedula");

            // Limpia las opciones actuales de cédulas
            cedulaSelect.innerHTML = "";

            // Llama a un archivo PHP (por ejemplo, get_cedulas.php) para cargar las cédulas
            // Aquí puedes utilizar AJAX para obtener las cédulas relacionadas con la tipificación seleccionada
            $.ajax({
                type: "POST",
                url: "get_cedulas.php", // Archivo PHP para obtener las cédulas
                data: {tipificacion: tipificacion}, // Envía la tipificación seleccionada
                dataType: "json",
                success: function (data) {
                    // Agrega las nuevas opciones de cédulas desde los datos obtenidos
                    for (var i = 0; i < data.length; i++) {
                        var option = document.createElement("option");
                        option.text = data[i];
                        cedulaSelect.add(option);
                    }
                },
                error: function () {
                    console.log("Error al obtener las cédulas.");
                }
            });
        }

        // Carga las tipificaciones al cargar la página
        $(document).ready(function () {
            loadTipificaciones();
        });
    </script>
    <style> 
    .contenedor {
        width: 80%; /* El 80% del viewport será el ancho del contenedor */
        font-size: 12px;
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
        /* Estilo general para el cuerpo del formulario */
       /* Estilo general para el cuerpo del formulario */
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
            margin-bottom: 20px;
        }

        /* Etiquetas de los campos */
        .campo label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Campos de entrada de texto y select */
        input[type="text"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            width: 20%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            
        }

        /* Contenedor de los campos de crédito generados dinámicamente */
        #campos_credito {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Estilo para los campos de crédito individuales */
        .campo-credito {
            flex: 1;
            padding: 10px;
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

        /* Estilos para los títulos de los beneficiarios */
        h3 {
            font-size: 18px;
            margin-top: 20px;
        }

        /* Estilo para los campos de porcentaje */
        .campo-porcentaje {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Estilos para los selectores de porcentaje */
        .campo-porcentaje select {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    
    <!-- Formulario con la lista desplegable de tipificaciones -->
    <form method="post" action="procesar_formulario.php">
        <label for="tipificacion">Seleccione una tipificación:</label>
        <select id="tipificacion" name="tipificacion" onchange="loadCedulas()">
        <input type="text" id="usuario" name="usuario" style="display: none;" value="<?php echo $usuario; ?>"><br><br>
            <option value="">Selecciona una tipificación</option>
        </select><br><br>

        <!-- Lista desplegable para mostrar las cédulas (se cargarán dinámicamente) -->
        <label for="cedula">Seleccione una cédula:</label>
        <select name="cedula" id="cedula">
            <!-- Las opciones se cargarán dinámicamente con JavaScript -->
        </select><br><br>

        <input type="submit" value="Mostrar Datos" class="button">
        
    </form>
    <br><br>
    <form method="post" action="procesar_formulario.php">

    <label for="cedula">Buscar por cédula:</label>
    <input type="text" id="usuario" name="usuario" style="display: none;" value="<?php echo $usuario; ?>"> <br><br>
    <input type="text" id="tipificacion" name="tipificacion" style="display: none;" ><br><br>
    <input type="text" id="cedula" name="cedula" placeholder="Ingrese una cédula" style="width: 12%;"><br><br>

    <input type="submit" value="Buscar" class="button">
        
        
    </form>
    <br><br>
    <a href="logout.php">Cerrar sesión</a> <!-- Agregar un enlace para cerrar sesión -->
    </div>
</body>
</html>
