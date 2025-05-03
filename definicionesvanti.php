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

  .hero-section {
    background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
    color: white;
    padding: 40px 20px;
    border-radius: 8px;
    margin-bottom: 30px;
    text-align: center;
  }

  .section-title {
    font-size: 1.5rem;
    margin-bottom: 15px;
    position: relative;
  }

  .section-title::after {
    content: '';
    width: 60px;
    height: 4px;
    background: #00bcd4;
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
  }

  .card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
  }

  .card {
    border: 1px solid #ccc;
    background: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    transition: all 0.3s;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
  }

  .info-panel {
    background-color: #f8f9fa;
    padding: 40px 20px;
    border-radius: 8px;
  }

  .info-panel img {
    max-width: 100%;
    border-radius: 8px;
  }

  ul {
    padding-left: 20px;
  }

  @media(max-width: 768px) {
    .main-container {
      flex-direction: column;
    }
    .sidebar,
    .content {
      width: 100%;
    }
  }
</style>

<div class="main-container">
  
  <!-- Sidebar -->
  <?php
    include('includes/sidebar.php');
    ?>

  <!-- Contenido -->
  <section class="content">
    <div class="hero-section">
      <h1 class="display-6">¿Quiénes Somos?</h1>
      <p class="lead">Impulsamos el futuro a través de la tecnología, la innovación y la formación digital.</p>
    </div>

    <div class="card-grid">
      <div class="card">
        <h2 class="section-title">Misión</h2>
        <p>Proveer soluciones tecnológicas personalizadas, capacitación profesional y servicios de formación y transformación digital para fortalecer a las organizaciones y optimizar sus procesos a través de la innovación.</p>
      </div>
      <div class="card">
        <h2 class="section-title">Visión</h2>
        <p>Ser una empresa referente en el desarrollo de software a la medida, consultoría tecnológica, formación en procesos y análisis avanzado de datos, generando impacto sostenible en nuestros clientes.</p>
      </div>
      <div class="card">
        <h2 class="section-title">Objetivos</h2>
        <ul>
          <li>Desarrollar software personalizado con altos estándares de calidad.</li>
          <li>Capacitar al talento humano en herramientas y sistemas digitales.</li>
          <li>Optimizar procesos empresariales mediante transformación tecnológica.</li>
          <li>Implementar estrategias de tratamiento y análisis de datos.</li>
          <li>Fomentar una cultura digital en las organizaciones.</li>
        </ul>
      </div>
    </div>

    <div class="info-panel">
      <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
          <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=80" alt="Tecnología y sostenibilidad">
        </div>
        <div class="col-md-6">
          <h2 class="section-title">Nuestro Compromiso</h2>
          <p><strong>Misión:</strong> Transformamos ideas en soluciones tecnológicas efectivas para nuestros clientes, fortaleciendo su crecimiento y competitividad.</p>
          <p><strong>Visión:</strong> Liderar la transformación digital en Latinoamérica con responsabilidad, innovación y excelencia.</p>
          <p><strong>Sostenibilidad:</strong> Adoptamos prácticas responsables con el medio ambiente mediante el uso de tecnología verde, minimización de residuos y compromiso con procesos digitales sostenibles.</p>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
