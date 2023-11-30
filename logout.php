<?php
session_start();

// Cerrar la sesión actual
session_unset();
session_destroy();

// Redireccionar de vuelta a la página de inicio de sesión (index.php)
header("Location: index.php");
exit();
?>