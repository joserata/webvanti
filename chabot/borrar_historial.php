<?php
// Borrar el archivo historial.txt cuando se termine el chat
if (file_exists('historial.txt')) {
    unlink('historial.txt'); // Eliminar el archivo de historial
}

// Redirigir al usuario a la página principal (index.php)
header('Location: index.php');
exit();
?>
