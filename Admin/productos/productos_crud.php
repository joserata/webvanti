<?php
include("../../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $imagen = $_POST["imagen"];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $imagen);
    $stmt->execute();
}

if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];
    $conn->query("DELETE FROM productos WHERE id = $id");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Productos</h2>

    <form method="POST" class="mb-4">
        <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
        <textarea name="descripcion" class="form-control mb-2" placeholder="Descripción" required></textarea>
        <input type="number" name="precio" step="0.01" class="form-control mb-2" placeholder="Precio" required>
        <input type="text" name="imagen" class="form-control mb-2" placeholder="URL de Imagen" required>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Imagen</th><th>Acciones</th></tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM productos");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['descripcion']}</td>
                <td>{$row['precio']}</td>
                <td><img src='{$row['imagen']}' width='60'></td>
                <td>
                    <a href='?eliminar={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                </td>
              </tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
