<?php
$remitente = $_POST['email'];
$destinatario = 'pdasfal@hotmail.com';
$asunto = 'Asunto de ejemplo';
if (!$_POST){

?>

<?php
}else{
    $cuerpo = "Nombre" . $_POST["nombre"] . "\r\n";
    $cuerpo = "Email" . $_POST["email"] . "\r\n";
    $cuerpo = "Mensaje" . $_POST["mensaje"] . "\r\n";
    
$headers = "MIME-Version: 1.0\n";
$headers = "Content-type: text\plain; charset=utf-8\n";
$headers = "X-Priority: 3\n";
$headers = "X-MSMail-Priority: Normal\n";
$headers = "X-Mailer: php\n";
$headers = "From: \"".$_POST['nombre']. "\" <".$remitente.">\n";

mail($destinatario, $asunto, $cuerpo, $headers);

include 'alertForm.html';
}
?>