<?php
include('conexion.php');

if (isset($_GET['modulo_id'])) {
  $modulo_id = intval($_GET['modulo_id']);

  $query = "SELECT nombre, descripcion, imagen FROM submodulos WHERE modulo = $modulo_id";
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-md-3 mb-4">';
    echo '  <div class="card">';
    echo '    <img src="images/' . htmlspecialchars($row['imagen']) . '" class="card-img-top" alt="' . htmlspecialchars($row['nombre']) . '">';
    echo '    <div class="card-body">';
    echo '      <h5 class="card-title">' . htmlspecialchars($row['nombre']) . '</h5>';
    echo '      <p class="card-text">' . htmlspecialchars($row['descripcion']) . '</p>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';
  }
}
?>
