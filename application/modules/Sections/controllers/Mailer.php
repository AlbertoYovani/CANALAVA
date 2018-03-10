<?php

/**
 * Description of Mailer
 *
 * @author Alberto Yovani <albertoyovanip@gmail.com>
 */
require_once APPPATH.'modules/config/controllers/Config.php';
include_once APPPATH.'third_party/PHPMailer/class.phpmailer.php';
class Mailer extends Config{
    public function SendMail() {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 1;
        $mail->isSMTP();       
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp.live.com;';
        $mail->SMTPAuth = true;
        //$mail->Host = 'http://vitermedicalproject.com.mx';
        $mail->Username = 'iti_fjpp@hotmail.com';
        $mail->Password = 'feliPE#$5293jesuShl';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('iti_fjpp@hotmail.com', 'Central de Monitoreo | Viter Médical');
        $mail->addAddress('albertoyovanip@gmail.com','Alberto');
        $mail->isHTML(true);
        $mail->Subject = 'Envío de Signos Vitales';
        $mail->Body='<b>Hola</b>';
        $mail->AltBody = 'ENVÍO DE SIGNOS VITALES AL PACIENTE';
        if(!$mail->Send()){
           echo "Message could not be sent. <p>";
           echo "Mailer Error: " . $mail->ErrorInfo;
           exit;
        }

        echo "Message has been sent";
    }
    
}
