<?php
include('conexion.php');
?>
<?php include 'includes/header.php'; ?>
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
  .sidebar h4 {
    margin-bottom: 15px;
  }
  .sidebar ul {
    list-style: none;
    padding-left: 0;
  }
  .sidebar ul li {
    margin-bottom: 10px;
  }
  .sidebar ul li a {
    text-decoration: none;
    color: #2c3e50;
  }

  .content {
    width: 80%;
  }

  .producto-card {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  .producto-card h2 {
    margin-top: 0;
  }
  .producto-card img {
    width: 100%;
    max-width: 600px;
    height: auto;
    margin-bottom: 15px;
    border-radius: 8px;
  }
  .relacionados {
    margin-top: 40px;
  }
  .relacionados h3 {
    margin-bottom: 20px;
  }
  .card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
  }
  .card {
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 8px;
    transition: all 0.3s;
    background: #f9f9f9;
  }
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
  }
  .card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    margin-bottom: 10px;
    border-radius: 6px;
  }
  .card h5 {
    margin: 0 0 10px 0;
    font-size: 1rem;
  }
  .card p {
    font-size: 0.9rem;
    color: #555;
  }
  .card a {
    display: inline-block;
    margin-top: 10px;
    font-weight: bold;
    color: #007bff;
    text-decoration: none;
  }
</style>

<div class="main-container">
  <!-- Sidebar -->
  <?php
    include('includes/sidebar.php');
    ?>
<?php
$sql= mysqli_query($conn, "select * from productos where id='$_GET[id]'");
?>
  <!-- Contenido principal -->
  <section class="content">
    <div class="producto-card">
      <h2>Sistema de Gestión Personalizada</h2>
      <p><strong>Fecha:</strong> Agosto 2024</p>
      <?php
      while($row=mysqli_fetch_array($sql))
      {
      ?>
      <img src="images/<?php echo $row['imagen_url'] ?>" alt="Imagen del producto">
      <h2><?php echo $row['nombre'] ?></h2>
      <p>
      <?php echo $row['descripcion'] ?>.
      </p>
    </div>
    <?php
  }
  ?>
    <!-- Temas relacionados -->
    <div class="relacionados">
      <h3>Temas Relacionados</h3>
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
              <a href="detalle_producto.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>
        <?php
        }
        ?>

  </section>
</div>

<?php include 'includes/footer.php'; ?>
