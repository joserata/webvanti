<?php
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Portal Web Tech</title>
  <link rel="stylesheet" href="/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .section-title {
      font-size: 1.5rem;
      margin-bottom: 20px;
      position: relative;
      text-align: center;
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
    
    .fade-in {
      animation: fadeIn 1.5s ease-in-out;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(30px);}
      to {opacity: 1; transform: translateY(0);}
    }
    .parallax {
      background-image: url('images/paraxall.jpg');
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      height: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 2rem;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
    }
    .carousel-img {
      height: 200px;
      object-fit: cover;
    }
    .sidebar h5 {
      font-weight: bold;
    }

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

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TechPortal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="definicionesvanti.php">Quienes Somos</a></li>
        <li class="nav-item"><a class="nav-link" href="catalogo_servicios.php">Servicios</a></li>
        <li class="nav-item"><a class="nav-link" href="catalogo_servicios.php">Capacitaciones</a></li>
        <li class="nav-item"><a class="nav-link" href="productos.php">Productos</a></li>
        <li class="nav-item"><a class="nav-link" href="contactos.php">Contacto</a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
  function toggleMenu() {
    const menu = document.getElementById('nav-menu');
    menu.classList.toggle('active');
  }
</script>
