<?php
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Vanti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 
<?php include('includes/header.php'); ?>
</head>
<style>
#mainCarousel {
  max-height: 400px;
  overflow: hidden;
}

#mainCarousel .carousel-item img {
  width: 100%;
  height: 400px;
  object-fit: cover; /* Asegura que llenen todo el contenedor sin deformarse */
  object-position: center; /* Centra la parte visible */
}
@keyframes fadeZoomIn {
  0% {
    opacity: 0;
    transform: scale(0.95);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

.animate-text {
  animation: fadeZoomIn 1.2s ease-out both;
}


</style>
<body>

<!-- CARRUSEL -->
<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slider1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/slider2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/slider3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- CONTENIDO PRINCIPAL -->

<div class="main-container">
    <!-- SIDEBAR -->
    <?php
    include('includes/sidebar.php');
    ?>
<?php
$sql=mysqli_query($conn, "select * from productos LIMIT 4");
?>
    <!-- CARDS DE PRODUCTOS -->
    <div class="col-md-9">
      <h2 class="section-title">Nuestros Servicios</h2>
      <div class="row">
        <?php
        while($row=mysqli_fetch_array($sql))
        {
        ?>
        <div class="col-md-3 mb-4 fade-in">
          <div class="card product-card h-100">
            <img src="images/<?php echo $row['imagen_url'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nombre'] ?></h5>
              <p class="card-text">Solución software personalizada para empresas.</p>
              <a href="detalle_producto.php" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>
        <?php
        }
        ?>

      </div>

      <!-- PARALLAX -->
      <div class="parallax mb-4">
  <div class="parallax-content animate-text">Innovación que transforma</div>
</div>



      <!-- SLIDER INFERIOR -->
      <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/1600x300/?tech" class="d-block w-100 carousel-img" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1600x300/?it" class="d-block w-100 carousel-img" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1600x300/?digital" class="d-block w-100 carousel-img" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
<?php
include('includes/footer.php');
?>