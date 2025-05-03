<?php
include('conexion.php');

// Obtener parámetros de paginación y categoría
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 8;
$categoria_id = isset($_GET['categoria']) ? intval($_GET['categoria']) : 0;

// Construir la consulta
$query = "SELECT * FROM productos";
if ($categoria_id > 0) {
  $query .= " WHERE categoria = $categoria_id";
}
$query .= " LIMIT $offset, $limit";

// Ejecutar la consulta
$result = mysqli_query($conn, $query);

// Verificar si hay resultados
if (mysqli_num_rows($result) > 0) {
  while ($producto = mysqli_fetch_assoc($result)) {
    echo '<div class="col-md-3 mb-4">';
    echo '  <div class="card product-card">';
    echo '    <img src="images/' . htmlspecialchars($producto['imagen_url']) . '" class="card-img-top" alt="' . htmlspecialchars($producto['nombre']) . '">';
    echo '    <div class="card-body">';
    echo '      <h5 class="card-title">' . htmlspecialchars($producto['nombre']) . '</h5>';
    echo '      <p class="card-text">' . htmlspecialchars($producto['descripcion']) . '</p>';
    echo '      <a href="detalle_producto.php?id=' . $producto['id'] . '" class="btn btn-primary">Ver más</a>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';
  }
} else {
  // No hay productos
  echo '';
}
?>
