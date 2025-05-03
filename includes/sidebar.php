<?php
include('conexion.php');
?>
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
</style>

<?php
$result = mysqli_query($conn, "SELECT * FROM categorias");
?>

<aside class="sidebar">
  <h4>Categorías</h4>
  <ul>
    <?php while ($row = mysqli_fetch_array($result)) : ?>
      <li>
        <a href="productos.php?categoria=<?php echo htmlspecialchars($row['id']); ?>">
          <?php echo htmlspecialchars($row['nombre']); ?>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
</aside>
