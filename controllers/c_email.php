<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class ControladorEmail {

    static public function ctrRestablecerClaveEmail($datos) {
        require '../plugin/phpMailer/SMTP.php';
        require '../plugin/phpMailer/PHPMailer.php';
        require '../plugin/phpMailer/Exception.php';
        $titulo = utf8_decode('Restablecer Contraseña');
        $cuerpo = utf8_decode('Hola '. $datos["valor3"].' el sistema te ha asignado una nueva contraseña '.$datos["valor1"].' asegurate de cambiarla una vez entres a tu perfil. ' .
                'Tu nombre de usuario es ' .$datos["valor3"]);
        $mail = new PHPMailer(true);
        try {
            //Para localhost
            $mail->SMTPOptions = array(
                'ssl' =>array(
                'verify_peer' => false,
                'verify_peer_name' =>false,
                'allow_self_signed' => true
              )  
            );
            //
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ecusoft716@gmail.com';
            $mail->Password = 'Cemlad123';
            $mail->SMTPSecure = 'ssl';//\PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->setFrom('informacion.cemlad172021@gmail.com', 'CEMLAD');
            $mail->addAddress($datos["valor4"]);   
            $mail->isHTML(true);                                
            $mail->Subject = $titulo;
            $mail->Body = $cuerpo;
            $mail->send();
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    }

}
