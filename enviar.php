<?php
$remitente = $_POST['email'];
$destinatario = 'pdasfal@hotmail.com';
$asunto = 'Asunto de ejemplo';

if (!$_POST) {
    // Manejar el caso en que no hay datos POST, podría ser redirigir o mostrar un error
    echo "No se recibieron datos.";
} else {
    $cuerpo = "Nombre: " . $_POST["nombre"] . "\r\n";
    $cuerpo .= "Email: " . $_POST["email"] . "\r\n";
    $cuerpo .= "Mensaje: " . $_POST["mensaje"] . "\r\n";
    
    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/plain; charset=utf-8\n";
    $headers .= "From: \"" . $_POST['nombre'] . "\" <" . $remitente . ">\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "X-MSMail-Priority: Normal\n";
    $headers .= "X-Mailer: php\n";

    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        // Redirigir después de enviar el correo
        header("Location: index.html");
        exit();
    } else {
        echo "Error al enviar el mensaje.";
    }

    // Incluir el archivo de alerta si es necesario
    include 'alertForm.html';
}
?>