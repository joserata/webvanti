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
<?php
    include('includes/sidebar.php');
    ?>

  <!-- Contenido principal -->
  <section class="content">
    <h2>Catálogo de Servicios</h2>
    <div class="card-grid mt-4">
      <div class="card">
        <img src="https://via.placeholder.com/300x160" alt="Servicio 1">
        <h5>Software a Medida</h5>
        <p>Soluciones personalizadas adaptadas a tus necesidades empresariales.</p>
        <a href="detalle_servicio.php">Ver más</a>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/300x160" alt="Servicio 2">
        <h5>Capacitación Empresarial</h5>
        <p>Formación técnica y estratégica para equipos de alto rendimiento.</p>
        <a href="detalle_servicio.php">Ver más</a>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/300x160" alt="Servicio 3">
        <h5>Consultoría en Transformación Digital</h5>
        <p>Diagnóstico, planificación y ejecución de planes digitales.</p>
        <a href="detalle_servicio.php">Ver más</a>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/300x160" alt="Servicio 4">
        <h5>Analítica de Datos</h5>
        <p>Visualización, minería y análisis predictivo con tus datos.</p>
        <a href="detalle_servicio.php">Ver más</a>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/300x160" alt="Servicio 5">
        <h5>Automatización de Procesos</h5>
        <p>Reduce errores y gana eficiencia con tecnologías de automatización.</p>
        <a href="detalle_servicio.php">Ver más</a>
      </div>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
