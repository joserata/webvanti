<?php
include("../../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $sql = "INSERT INTO definiciones (nombre, descripcion) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $descripcion);
    $stmt->execute();
}

if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];
    $conn->query("DELETE FROM definiciones WHERE id = $id");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Definiciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Definiciones</h2>

    <form method="POST" class="mb-4">
        <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
        <textarea name="descripcion" class="form-control mb-2" placeholder="Descripción" required></textarea>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Acciones</th></tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM definiciones");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['descripcion']}</td>
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
