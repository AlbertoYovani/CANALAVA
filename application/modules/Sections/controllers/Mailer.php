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
        $usuario= $this->config_mdl->sqlGetDataCondition('usuarios',array(
            'usuario'=> $this->input->get_post('usuario_nombre'),
            'usuario_mail'=> $this->input->get_post('usuario_correo')
        ))[0];
        if(!empty($usuario)){
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
            $mail->Subject = 'Cámara Nacional de la Industria de Lavanderías';
            $Msj= $this->plantillaMail(array(
                'usuario_nombre'=>'Alberto Yovani',
                'usuario'=>'admin',
                'usuario_id'=>'1'
            ));
            $mail->Body=$Msj;
            $mail->AltBody = 'CANALAVA';
            if(!$mail->Send()){
                $this->setOutput(array('accion'=>'3'));
            }else{
                $this->setOutput(array('accion'=>'1'));
            }
        }else{
            $this->setOutput(array('accion'=>'2'));
        }
    }
    
    public function plantillaMail($data){
        $Content='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
                            <meta content="telephone=no" name="format-detection">
                            <meta content="width=mobile-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" name="viewport">
                            <meta content="IE=9; IE=8; IE=7; IE=EDGE;" http-equiv="X-UA-Compatible">
                            <link href="http://fonts.googleapis.com/css?family=Lato:400,300,700,400italic,300italic" rel="stylesheet" type="text/css">
                            <title>Notificación de CANALAVA</title>
                            <!-- Inline Styles and Media Queries Begins -->
                            <style type="text/css">
                                table {border-collapse:separate;}a, a:link, a:visited {text-decoration: none; color: #00788a}
                                h2,h2 a,h2 a:visited,h3,h3 a,h3 a:visited,h4,h5,h6,.t_cht {color:#000 !important}p {margin-bottom: 0}.ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%}							
                                .ExternalClass {width: 100%;}/**This is to center your email in Outlook.com************/
                                #outlook a {padding:0;}body, #body-table {height:100% !important; width:100% !important; margin:0 auto; padding:0; line-height:100% !important; font-family: Lato, sans-serif;}
                                img, a img {border:0; outline:none; text-decoration:none;}.image-fix {display:block;}
                                table, td {border-collapse:collapse;}
                                .ReadMsgBody {width:100%;} .ExternalClass{width:100%;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100% !important;}
                                .ExternalClass * {line-height: 100% !important;}table, td {mso-table-lspace:0pt; mso-table-rspace:0pt;}
                                img {outline: none; border: none; text-decoration: none; -ms-interpolation-mode: bicubic;}body, table, td, p, a, li, blockquote {-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;}body.outlook img {width: auto !important;max-width: none !important;}
                                body{ -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
                                body, #body-table { margin:0 auto !important; margin:0 auto !important; text-align:center !important;}
                                p {padding:0; margin: 0; line-height: 24px; font-family: Lato, sans-serif;}
                                a, a:link {color: #1c344d;text-decoration: none !important;}
                                .footer-link a, .nav-link a {color: #fff6e5;}
                                /* Yahoo Mail */
                                .thread-item.expanded .thread-body{background-color: #000000 !important;}
                                .thread-item.expanded .thread-body .body, .msg-body{display:block !important;}
                                #body-table .undoreset table {display: table !important;table-layout: fixed !important;}
                                /* Start Media Queries */
                                @media only screen and (max-width: 800px) {
                                    a[href^="tel"], a[href^="sms"] {text-decoration: none;pointer-events: none;	cursor: default;}
                                    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration: default;	pointer-events: auto;cursor: default;}	
                                }
                                @media only screen and (max-width: 700px) {
                                    *[class].full-width {width: 100%!important;}
                                    *[class].content-width {width: 510px!important;}
                                    *[class].center {text-align:center !important; height:auto !important;}
                                }
                                @media only screen and (max-width: 640px) {
                                    *[class].mobile-width {width: 100%!important; padding: 0 4px;}
                                    *[class].content-width {width: 480px!important;}
                                }
                                @media only screen and (max-width: 480px) {
                                    *[class].content-width {width: 360px!important;}
                                    *[class].center {text-align:center !important; height:auto !important;}
                                }
                                @media only screen and (max-width: 360px) {
                                    *[class].content-width {width: 100% !important;}
                                    *[class].inner-width {width: 280px!important;}
                                    *[class].center {text-align:center !important; height:auto !important;}
                                }
                            </style>
                            <!-- Inline Styles and Media Queries Ends -->
                        </head>
                        <body>
                            <div style="text-align:center !important">
                                <h3>RECUPERACIÓN DE CONTRASEÑA</h3>
                                <h4><strong>ALBERTO YOVANI PÉREZ PÉREZ</strong></h4>
                                <h5>HAZ CLICK SOBRE EL SIGUIENTE ENLACE PARA CAMBIAR TU CONTRASEÑA : <a href="http://localhost/Canalava/Sections/Usuarios/NewPassword?U='.base64_encode($data['usuario']).'&RecoveryPass='.base64_encode('nueva').'&i='.base64_encode(base64_encode($data['usuario_id'])).'">http://localhost/Canalava/Sections/Usuarios/NewPassword?U='.base64_encode($data['usuario']).'&RecoveryPass='.base64_encode('nueva').'&i='.base64_encode(base64_encode($data['usuario_id'])).'</a></h5>
                            </div>
                        </body>
                    </html>';
        return $Content;
    }
    public function ConfirmacionCambio() {
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
        $mail->Subject = 'Cámara Nacional de la Industria de Lavanderías';
        $mail->Body='<h3 style="text-align:center;">TU CONTRASEÑA HA SIDO MODIFICADA EXITOSAMENTE</h3>';
        $mail->AltBody = 'CANALAVA';
        if(!$mail->Send()){
            $this->setOutput(array('accion'=>'3'));
        }else{
            $this->setOutput(array('accion'=>'1'));
        }
    }
}
