<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalle Submódulo</title>
  <?php include('includes/header.php'); ?>
  <style>
    .main-container {
      display: flex;
      padding: 20px;
      gap: 20px;
    }
    .sidebar {
      width: 20%;
      background: #f4f4f4;
      padding: 15px;
      border-radius: 8px;
      height: fit-content;
    }
    .content {
      width: 80%;
    }
    .submodulo-card {
      margin-bottom: 20px;
    }
    .submodulo-card img {
      width: 100%;
      height: auto;
      border-radius: 8px;
    }
  </style>
</head>
<body>

<div class="main-container">
  <!-- Sidebar -->
  <?php include('includes/sidebar.php'); ?>

  <!-- Contenido principal -->
  <div class="content">
    <?php
      $submodulo = isset($_GET['submodulo']) ? strtolower($_GET['submodulo']) : '';

      // Información estática para demostración
      $submodulos = [
        'educacion' => [
          'titulo' => 'Educación',
          'descripcion' => 'Ofrecemos programas educativos personalizados para fortalecer las capacidades organizacionales.',
          'imagen' => 'educacion.jpg'
        ],
        'comunicacion' => [
          'titulo' => 'Comunicación',
          'descripcion' => 'Mejoramos la comunicación interna y externa de tu empresa mediante estrategias efectivas.',
          'imagen' => 'comunicacion.jpg'
        ],
        'bienestar' => [
          'titulo' => 'Bienestar',
          'descripcion' => 'Impulsamos iniciativas de bienestar laboral para mejorar el ambiente de trabajo.',
          'imagen' => 'bienestar.jpg'
        ],
        'consejeria' => [
          'titulo' => 'Consejería',
          'descripcion' => 'Brindamos consejería empresarial para la toma de decisiones y resolución de conflictos.',
          'imagen' => 'consejeria.jpg'
        ]
      ];

      if (array_key_exists($submodulo, $submodulos)) {
        $item = $submodulos[$submodulo];
        echo '<div class="submodulo-card card">';
        echo '  <img src="images/' . htmlspecialchars($item['imagen']) . '" class="card-img-top" alt="' . htmlspecialchars($item['titulo']) . '">';
        echo '  <div class="card-body">';
        echo '    <h3 class="card-title">' . htmlspecialchars($item['titulo']) . '</h3>';
        echo '    <p class="card-text">' . htmlspecialchars($item['descripcion']) . '</p>';
        echo '  </div>';
        echo '</div>';
      } else {
        echo '<div class="alert alert-warning">El submódulo no fue encontrado.</div>';
      }
    ?>
  </div>
</div>

<?php include('includes/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
