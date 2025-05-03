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
      <img src="images/consultoria.jpg" class="card-img-top" alt="Consultoría de Negocio">
      <div class="card-body">
        <h3 class="card-title">Consultoría de Negocio</h3>
        <p class="card-text">
          Nuestra Consultoría de Negocio ofrece soluciones estratégicas para mejorar la eficiencia, productividad y sostenibilidad de tu empresa. Nos enfocamos en diagnosticar, planear e implementar procesos que agregan valor real a tu organización.
        </p>
      </div>
    </div>

    <!-- Submódulos como cards -->
    <h4 class="submodule-title">Nuestros Submódulos</h4>
    <div class="row">
      <?php
        $submodulos = [
          ['nombre' => 'Educación', 'descripcion' => 'Programas de capacitación y formación empresarial.', 'imagen' => 'educacion.jpg'],
          ['nombre' => 'Comunicación', 'descripcion' => 'Estrategias de comunicación interna y externa.', 'imagen' => 'comunicacion.jpg'],
          ['nombre' => 'Bienestar', 'descripcion' => 'Iniciativas para el bienestar organizacional.', 'imagen' => 'bienestar.jpg'],
          ['nombre' => 'Consejería', 'descripcion' => 'Asesoramiento profesional y empresarial.', 'imagen' => 'consejeria.jpg']
        ];

        foreach ($submodulos as $sub) {
          echo '<div class="col-md-3 mb-4">';
          echo '  <div class="card">';
          echo '    <img src="images/' . htmlspecialchars($sub['imagen']) . '" class="card-img-top" alt="' . htmlspecialchars($sub['nombre']) . '">';
          echo '    <div class="card-body">';
          echo '      <h5 class="card-title">' . htmlspecialchars($sub['nombre']) . '</h5>';
          echo '      <p class="card-text">' . htmlspecialchars($sub['descripcion']) . '</p>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
        }
      ?>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>