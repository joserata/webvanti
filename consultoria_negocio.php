<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Consultoría de Negocio - Portal Web Tech</title>
  <?php include('includes/header.php'); ?>
</head>
<body>

<div class="main-container">
  <!-- SIDEBAR -->
  <?php include('includes/sidebar.php'); ?>

  <!-- CONTENIDO PRINCIPAL -->
  <div class="content">
    <!-- Módulo Principal -->
    <div class="card mb-4">
      <img src="images/imagen4.jpg" class="card-img-top" alt="Consultoría de Negocio">
      <div class="card-body">
        <h3 class="card-title">Consultoría de Negocio</h3>
        <p class="card-text">
          Nuestra Consultoría de Negocio ofrece soluciones estratégicas para mejorar la eficiencia, productividad y sostenibilidad de tu empresa. Nos enfocamos en diagnosticar, planear e implementar procesos que agregan valor real a tu organización.
        </p>
      </div>
    </div>

    <!-- Módulos -->
    <h4 class="submodule-title">Módulos</h4>
    <div class="mb-4">
      <?php
        $primer_modulo_id = null;
        $query_modulos = "SELECT id, nombre FROM modulos";
        $result_modulos = mysqli_query($conn, $query_modulos);

        while ($modulo = mysqli_fetch_assoc($result_modulos)) {
          if (is_null($primer_modulo_id)) {
            $primer_modulo_id = $modulo['id'];
          }
          echo '<button class="btn btn-secondary me-2 mb-2 modulo-btn" data-id="' . $modulo['id'] . '">' . htmlspecialchars($modulo['nombre']) . '</button>';
        }
      ?>
    </div>

    <!-- Submódulos -->
    <h4 class="submodule-title">Nuestros Submódulos</h4>
    <div id="submodulos-container" class="row">
      <?php
        // Mostrar submódulos del primer módulo por defecto
        if (!is_null($primer_modulo_id)) {
          $query_sub = "SELECT nombre, descripcion, imagen FROM submodulos WHERE modulo = $primer_modulo_id";
          $result_sub = mysqli_query($conn, $query_sub);
          while ($row = mysqli_fetch_assoc($result_sub)) {
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
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.querySelectorAll('.modulo-btn').forEach(button => {
    button.addEventListener('click', () => {
      const moduloId = button.getAttribute('data-id');
      fetch(`get_submodulos.php?modulo_id=${moduloId}`)
        .then(response => response.text())
        .then(html => {
          document.getElementById('submodulos-container').innerHTML = html;
        });
    });
  });
</script>

</body>
</html>
<?php include 'includes/footer.php'; ?>
