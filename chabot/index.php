<?php
$respuesta = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mensaje'])) {
    $mensaje = trim($_POST['mensaje']);

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "123", "portal_web_tech");
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Buscar coincidencia en la pregunta
    $stmt = $conexion->prepare("SELECT respuesta FROM respuestas_chatbot WHERE pregunta LIKE ?");
    $param = "%" . $mensaje . "%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $stmt->bind_result($respuestaEncontrada);

    if ($stmt->fetch()) {
        $respuesta = $respuestaEncontrada;
    } else {
        $respuesta = "Lo siento, no tengo una respuesta para eso. Intenta con: 'Horario', 'Contacto' o 'Ubicación'.";
    }

    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ChatBot Simple</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f9f9f9; }
        .chat-box { background: #fff; padding: 20px; border-radius: 10px; width: 400px; margin: auto; box-shadow: 0 0 10px #ccc; }
        .bot, .user { margin: 10px 0; padding: 10px; border-radius: 5px; }
        .bot { background: #e6e6e6; }
        .user { background: #d1e7dd; text-align: right; }
    </style>
</head>
<body>
    <div class="chat-box">
        <h2>ChatBot</h2>

        <div class="bot">👋 Hola, ¿en qué puedo ayudarte?<br> Prueba con: <b>Horario</b>, <b>Contacto</b>, <b>Ubicación</b></div>

        <?php if (!empty($_POST['mensaje'])): ?>
            <div class="user"><?= htmlspecialchars($_POST['mensaje']) ?></div>
            <div class="bot"><?= htmlspecialchars($respuesta) ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="mensaje" placeholder="Escribe tu mensaje..." required style="width: 80%; padding: 10px;">
            <button type="submit" style="padding: 10px;">Enviar</button>
        </form>
    </div>
</body>
</html>
