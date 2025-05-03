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

  <!-- Contenido principal -->
  <section class="content">
    <div class="producto-card">
      <h2>Sistema de Gestión Personalizada</h2>
      <p><strong>Fecha:</strong> Agosto 2024</p>
      <img src="https://via.placeholder.com/600x300" alt="Imagen del producto">
      <p>
        Este sistema permite gestionar procesos empresariales específicos, adaptándose a las necesidades del cliente. Cuenta con módulos escalables, integraciones API y una interfaz amigable para equipos administrativos y técnicos.
      </p>
    </div>

    <!-- Temas relacionados -->
    <div class="relacionados">
      <h3>Temas Relacionados</h3>
      <div class="card-grid">
        <div class="card">
          <img src="https://via.placeholder.com/300x160" alt="Tema 1">
          <h5>Automatización de Procesos</h5>
          <p>Optimiza tareas repetitivas con soluciones tecnológicas inteligentes.</p>
          <a href="#">Ver más</a>
        </div>
        <div class="card">
          <img src="https://via.placeholder.com/300x160" alt="Tema 2">
          <h5>Capacitación en TI</h5>
          <p>Forma a tu equipo en herramientas y lenguajes actuales.</p>
          <a href="#">Ver más</a>
        </div>
        <div class="card">
          <img src="https://via.placeholder.com/300x160" alt="Tema 3">
          <h5>Big Data y Analítica</h5>
          <p>Extrae valor de tus datos para tomar mejores decisiones.</p>
          <a href="#">Ver más</a>
        </div>
        <div class="card">
          <img src="https://via.placeholder.com/300x160" alt="Tema 4">
          <h5>Integraciones API</h5>
          <p>Conecta tus sistemas internos con plataformas externas.</p>
          <a href="#">Ver más</a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
