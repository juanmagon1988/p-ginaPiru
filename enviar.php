<?php

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];



use Phpmailer\PHPMailer\PHPMailer;
use Phpmailer\PHPMailer\Exception;

require 'Phpmailer/Exception.php';
require 'Phpmailer/PHPMailer.php';
require 'Phpmailer/SMTP.php';



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contactomaricelcremaschi@gmail.com';                     // SMTP username
    $mail->Password   = 'Hilario2019';                               // SMTP password
    $mail->SMTPSecure = tls;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('contactomaricelcremaschi@gmail.com', $name);
    $mail->addAddress('maricelcremaschi@gmail.com');     // Add a recipient
    
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contacto desde la Página';
    $mail->Body    = "Has recibido un nuevo mensaje desde la la web.\n\n"."Estos son los detalles:\n\nNombre: $name\n\nTeléfono: $phone\n\nEmail: $email\n\nMensaje:\n$message";




    $mail->send();


    echo '<script>
    alert ("Mensaje enviado correctamente, gracias por contactarse.");
    window.history.go(-1);
    </script>';



} catch (Exception $e) {
    echo '<script>
    alert ("Error enviando el mensaje");
    window.history.go(-1);
    </script>';
    
}





?>



