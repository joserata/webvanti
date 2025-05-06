<?php include_once 'includes/header.php'; ?>
<?php include_once 'conexion.php'; ?>

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
  <?php include('includes/sidebar.php'); ?>

  <section class="content">
    <h2>Todos los Servicios</h2>
    <div class="card-grid mt-4">
      <?php
        $query = "SELECT id, titulo, descripcion, imagen_url FROM servicios ORDER BY fecha_creacion DESC";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $imagen = !empty($row['imagen_url']) ? $row['imagen_url'] : 'https://via.placeholder.com/300x160';
            echo '<div class="card">';
            echo '<img src="' . htmlspecialchars($imagen) . '" alt="' . htmlspecialchars($row['titulo']) . '">';
            echo '<h5>' . htmlspecialchars($row['titulo']) . '</h5>';
            echo '<p>' . htmlspecialchars($row['descripcion']) . '</p>';
            echo '<a href="detalle_servicio.php?id=' . $row['id'] . '">Ver más</a>';
            echo '</div>';
          }
        } else {
          echo '<p>No se encontraron servicios.</p>';
        }
      ?>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
