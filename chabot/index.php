<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asistente Virtual</title>
    <link rel="stylesheet" href="chatbot.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Iconos Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Importar jQuery -->
</head>
<body>

<!-- Botón flotante -->
<div id="bot-toggle" onclick="toggleChatbot()">
    💬
</div>

<!-- Chatbot -->
<div class="chat-container" id="chatbot" style="display: none;">
    <div class="chat-header">
        <strong><i class="fas fa-robot"></i> Asistente Virtual</strong>
        <span onclick="toggleChatbot()">✖</span>
    </div>
    <div class="chat-box" id="chat-box">
        <?php
        if (file_exists('historial.txt')) {
            echo nl2br(file_get_contents('historial.txt'));
        } else {
            echo "<div class='bot'><img src='bot-image.png' alt='Bot' class='bot-img' /><b>Bot:</b> ¡Hola! ¿En qué puedo ayudarte?<br>
                <button onclick=\"enviarTexto('ver categorias')\"><i class='fas fa-list'></i> Categorías</button>
                <button onclick=\"enviarTexto('ver productos')\"><i class='fas fa-box'></i> Productos</button>
                <button onclick=\"enviarTexto('ver modulos')\"><i class='fas fa-puzzle-piece'></i> Módulos</button>
                </div>";
        }
        ?>
    </div>
    <form id="chat-form" method="POST" onsubmit="return enviarTexto();">
        <input type="text" name="mensaje" id="mensaje" placeholder="Escribe tu mensaje..." autocomplete="off" required>
        <button type="submit"><i class="fas fa-paper-plane"></i></button>
    </form>
    <button id="end-chat" onclick="terminarChat()">Terminar Chat</button>
</div>

<script>
    // Función para abrir y cerrar el chat
    function toggleChatbot() {
        var bot = document.getElementById("chatbot");
        bot.style.display = (bot.style.display === "none") ? "block" : "none";
    }

    // Función para enviar texto al chat sin cerrar el chat
    function enviarTexto(mensaje) {
        if (!mensaje) mensaje = document.getElementById("mensaje").value;
        
        if (mensaje.trim() === "") return false; // No enviar si está vacío

        // Enviar el mensaje utilizando AJAX
        $.ajax({
            type: 'POST',
            url: 'procesar_mensaje.php', // Cambia esto a tu archivo PHP que procesa el mensaje
            data: { mensaje: mensaje },
            success: function(response) {
                // Agregar la respuesta al chat
                $('#chat-box').append('<div class="user"><img src="user-image.png" alt="Usuario" class="user-img" /><b>Tú:</b> ' + mensaje + '</div>');
                $('#chat-box').append('<div class="bot"><img src="bot-image.png" alt="Bot" class="bot-img" /><b>Bot:</b> ' + response + '</div>');
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight); // Mantener scroll hacia abajo

                // Limpiar el campo de texto
                $('#mensaje').val('');
            },
            error: function() {
                alert("Error al procesar el mensaje. Inténtalo nuevamente.");
            }
        });
        return false; // Evitar el envío del formulario
    }

    // Función para terminar el chat
    function terminarChat() {
        var bot = document.getElementById("chatbot");
        bot.style.display = "none"; // Ocultar el chat

        // Hacer una solicitud para borrar el historial
        window.location.href = "borrar_historial.php"; // Asegúrate de tener esta ruta de archivo
    }
</script>

</body>
</html>
