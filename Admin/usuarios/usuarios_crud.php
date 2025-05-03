<?php
include("../../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $rol = $_POST["rol"];
    $clave = password_hash($_POST["clave"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, rol, clave) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $email, $rol, $clave);
    $stmt->execute();
}

if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];
    $conn->query("DELETE FROM usuarios WHERE id = $id");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Usuarios</h2>

    <form method="POST" class="mb-4">
        <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <select name="rol" class="form-control mb-2" required>
            <option value="">Seleccione rol</option>
            <option value="admin">Admin</option>
            <option value="cliente">Cliente</option>
        </select>
        <input type="password" name="clave" class="form-control mb-2" placeholder="Contraseña" required>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Acciones</th></tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM usuarios");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['email']}</td>
                <td>{$row['rol']}</td>
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
