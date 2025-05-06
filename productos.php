<?php
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Productos - Portal Web Tech</title>
  <?php include('includes/header.php'); ?>
  <style>
    .product-card { height: 100%; }
  </style>
</head>
<body>

<div class="main-container">
    <!-- SIDEBAR -->
    <?php include('includes/sidebar.php'); ?>

    <div class="col-md-9">
      <h3 class="mb-4">Desarrollamos en:</h3>
      <div class="row" id="productosContainer"></div>

      <div class="text-center mt-3">
        <button id="verMasBtn" class="btn btn-secondary">Ver más</button>
      </div>
    </div>
</div>

<script>
  let offset = 0;
  const limit = 8;

  // Obtener el ID de categoría de la URL si existe
  const urlParams = new URLSearchParams(window.location.search);
  const categoria = urlParams.get("categoria");

  function cargarProductos() {
    let url = `cargar_productos.php?offset=${offset}&limit=${limit}`;
    if (categoria) {
      url += `&categoria=${categoria}`;
    }

    fetch(url)
      .then(response => response.text())
      .then(html => {
        const contenedor = document.getElementById("productosContainer");
        contenedor.insertAdjacentHTML('beforeend', html);
        offset += limit;

        if (!html.trim()) {
          document.getElementById("verMasBtn").style.display = "none";
        }
      })
      .catch(error => {
        console.error("Error al cargar productos:", error);
      });
  }

  document.getElementById("verMasBtn").addEventListener("click", cargarProductos);
  window.addEventListener("DOMContentLoaded", cargarProductos);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include('includes/footer.php'); ?>
