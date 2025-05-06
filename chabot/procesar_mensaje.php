<?php
include 'db.php';

// Función para buscar en la base de datos
function buscar_en_tabla($conexion, $tabla, $url_base) {
    $stmt = $conexion->prepare("SELECT id, nombre, descripcion FROM $tabla");
    $stmt->execute();
    $resultado = $stmt->get_result();
    $items = [];

    while ($row = $resultado->fetch_assoc()) {
        $id = $row['id'];
        $nombre = htmlspecialchars($row['nombre']);
        $descripcion = htmlspecialchars($row['descripcion']);
        $enlace = "$url_base?id=$id";
        $icon = $tabla === 'productos' ? 'fas fa-box' : ($tabla === 'modulos' ? 'fas fa-puzzle-piece' : 'fas fa-list');
        $items[] = "<i class='$icon'></i> <b>$nombre</b>: $descripcion<br><a href='$enlace' target='_blank'>Ver más</a>";
    }

    return $items;
}

if (isset($_POST['mensaje'])) {
    $mensaje = strtolower(trim($_POST['mensaje']));
    $respuesta = "";

    if (strpos($mensaje, 'categoría') !== false || strpos($mensaje, 'categorias') !== false || strpos($mensaje, 'ver categorias') !== false) {
        $items = buscar_en_tabla($conexion, 'categorias', 'categorias.php');
        $respuesta = !empty($items) ? implode("<hr>", $items) : "No se encontraron categorías.";
    } elseif (strpos($mensaje, 'módulo') !== false || strpos($mensaje, 'modulos') !== false || strpos($mensaje, 'ver modulos') !== false) {
        $items = buscar_en_tabla($conexion, 'modulos', 'modulos.php');
        $respuesta = !empty($items) ? implode("<hr>", $items) : "No se encontraron módulos.";
    } elseif (strpos($mensaje, 'producto') !== false || strpos($mensaje, 'productos') !== false || strpos($mensaje, 'ver productos') !== false) {
        $items = buscar_en_tabla($conexion, 'productos', 'productos.php');
        $respuesta = !empty($items) ? implode("<hr>", $items) : "No se encontraron productos.";
    } else {
        $respuesta = "Lo siento, no entendí tu mensaje. Usa los botones o escribe: <b>ver categorías</b>, <b>ver módulos</b>, <b>ver productos</b>.";
    }

    // Guardar en historial
    $registro = "<div class='user'><b>Tú:</b> " . htmlspecialchars($mensaje) . "</div>\n";
    $registro .= "<div class='bot'><b>Bot:</b> " . $respuesta . "</div>\n\n";
    file_put_contents("historial.txt", $registro, FILE_APPEND);

    // Devolver la respuesta al frontend (se mostrará en el chat)
    echo $respuesta;
}
?>
