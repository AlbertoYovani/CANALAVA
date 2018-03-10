<?php

/**
 * Description of Login
 *
 * @author Alberto Yovani <albertoyovanip@gmail.com>
 */
require_once APPPATH.'modules/config/controllers/Config.php';
class Login extends Config{
    public function index() {
        $this->load->view('Login/index');
    }
    
    public function ValidarUsuario() {
        $select1 = $this->config_mdl->sqlQuery("SELECT *FROM usuarios 
                                                WHERE usuario = '".$_POST['login_usuario']."'");
        
        if(empty($select1)) {
            $this->setOutput(array('accion'=>'2'));
        }else {
            $select2 = $this->config_mdl->sqlQuery("SELECT *FROM usuarios 
                    WHERE usuario_password = '".$_POST['login_password']."'");
            if(empty($select2)){
                $this->setOutput(array('accion'=>'3'));
            }else{
                $select3 = $this->config_mdl->sqlQuery("SELECT *FROM usuarios, roles, menus
                                                        WHERE roles.rol_id = usuarios.rol_id
                                                        AND usuarios.usuario_id = menus.usuario_id 
                                                        AND usuarios.usuario = '".$_POST['login_usuario']."'
                                                        AND usuarios.usuario_password = '".$_POST['login_password']."'");
                if(!empty($select3)){
                    $_SESSION['usuario_id'] = $select3[0]['usuario_id'];
                    $_SESSION['usuario_tipo'] = $select3[0]['rol_nombre'];
                    $_SESSION['usuario_nombre'] = $select3[0]['usuario_nombre'];
                    $this->setOutput(array('accion'=>'1'));
                }else {
                    $this->setOutput(array('accion'=>'4'));
                }
            }
        }
    }
    public function LogOut() {
        session_destroy();
        session_unset();
        redirect('/Sections/Login', 'refresh');
    }
    
    public function ChecarSesion() {
        if(!isset($_SESSION['usuario_id'])) {
            $this->setOutput(array('accion'=>'1'));
        }else {
            $this->setOutput(array('accion'=>'2'));
        }
    }
    
    public function RecoveryPassword() {
        $this->load->view("Login/RecoveryPassword");
    }
    
    public function AjaxCheckEmail2() {
        $sql= $this->config_mdl->sqlGetDataCondition('usuarios',array(
            'usuario'=> $this->input->get_post('usuario_nombre'),
            'usuario_mail'=> $this->input->get_post('usuario_correo')
        ));
        if(!empty($sql)){
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 2;
                $mail->isSMTP();       
                $mail->CharSet = 'UTF-8';
                $mail->Host = 'smtp.gmail.com;';
                $mail->SMTPAuth = true;
                $mail->Username = 'albertoyovanip@gmail.com';
                $mail->Password = 'alberTO12#/';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('proyectos.bientics@gmail.com', 'Concanaco Servytur Médico');
                $mail->addAddress('albertoyovanip@gmail.com');
                //$mail->isHTML(true);
                $mail->Subject = 'ENLACE DE RECUPERACIÓN DE CONTRASEÑA';
                $Msj='POR FAVOR HAGA CLIC EN EL SIGUIENTE ENLACE PARA PODER RECUPERAR SU CONTRASEÑA';
                //$Msj.'<a href="'. base_url().'Sections/Login/ChangePassword?u='. md5($sql[0]['usuario_id']).'&m='. base64_encode($sql[0]['usuario_correo']).'">CLIC AQUÍ</a>';
                $mail->Body=$Msj;
                $mail->AltBody = 'ENLACE DE RECUPERACIÓN DE CONTRASEÑA';

                $mail->send();
                $this->setOutput(array('accion'=>'1'));
            } catch (Exception $e) {
                $this->setOutput(array('accion'=>'3','mailError'=>$mail->ErrorInfo));
            }
        }else{
            $this->setOutput(array('accion'=>'2'));
        }
    }
    public function Email() {
        $mail = new PHPMailer();
        $mail->isSMTP();       
        $mail->CharSet = 'UTF-8';                                   // set mailer to use SMTP
        $mail->Host = "smtp.gmail.com";  // specify main and backup server
        $mail->SMTPAuth = true;     // turn on SMTP authentication
        $mail->Username = "albertoyovanip@gmail.com";  // SMTP username
        $mail->Password = "alberTO12#/"; // SMTP password
        $mail->Port = 587;  
        $mail->From = "albertoyovanip@gmail.com";
        $mail->FromName = "Mailer";
        $mail->AddAddress("albertoyovanip@gmail.com", "Josh Adams");
        $mail->AddAddress("proyectos.bientics@gmail.com");                  // name is optional
        $mail->AddReplyTo("info@example.com", "Information");

        //$mail->WordWrap = 50;                                 // set word wrap to 50 characters
        $mail->IsHTML(true);                                  // set email format to HTML

        $mail->Subject = "Here is the subject";
        $mail->Body    = "This is the HTML message body <b>in bold!</b>";
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

        if(!$mail->Send())
        {
           echo "Message could not be sent. <p>";
           echo "Mailer Error: " . $mail->ErrorInfo;
           exit;
        }
        echo "Message has been sent";
    }
    
    public function AjaxCheckEmail() {
        //error_reporting(1);
        $usuario= $this->config_mdl->sqlGetDataCondition('usuarios',array(
            'usuario'=> $this->input->get_post('usuario_nombre'),
            'usuario_mail'=> $this->input->get_post('usuario_correo')
        ))[0];
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 1;
            $mail->isSMTP();       
            $mail->CharSet = 'UTF-8';
            $mail->Host = 'smtp.gmail.com;';
            $mail->SMTPAuth = true;
            //$mail->Host = 'http://vitermedicalproject.com.mx';
            $mail->Username = 'albertoyovanip@gamil.com';
            $mail->Password = 'alberTO12#/';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('albertoyovanip@gamil.com', 'Central de Monitoreo | Viter Médical');
            $mail->addAddress($usuario['usuario_mail'],$usuario['usuario_nombre'].' '.$usuario['usuario_ap'].' '.$usuario['usuario_am']);
            $mail->isHTML(true);
            $mail->Subject = 'Envío de Correo de Prueba';
            $Msj= $this->plantillaMail(array(
                'paciente_nombre'=>$usuario['usuario_nombre'].' '.$usuario['usuario_ap'].' '.$usuario['usuario_am'],
                'sv_ta'=>'Todo es prueba',
                'sv_fc'=>'Todo es prueba',
                'sv_oximetria'=>'Todo es prueba',
                'sv_temp'=>'Todo es prueba',
                'area_nombre'=>'Todo es prueba',
                'hospital_nombre'=>'Todo es prueba',
                'hospital_direccion'=>'Todo es prueba'
            ));
            $mail->Body=$Msj;
            $mail->AltBody = 'RECUPERACIÓN DE CONTRASEÑA';

            $mail->send();
            $this->setOutput(array('accion'=>'1'));
        } catch (Exception $e) {
            $this->setOutput(array('accion'=>'2','mailError'=>$mail->ErrorInfo));
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
                            <title>Notificación de Signos Vitales</title>
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
                        <body style="background: url(http://vitermedicalproject.com.mx/assets/img/Not/bg1.jpg);background-position: center;background-size: cover">
                            <!-- Banner Begins -->
                            <table id="body-table" background="" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-position: center center;background-size: cover;">
                                <tbody>
                                    <tr>
                                        <td align="center" valign="top">
                                            <!-- Table Outer Begins -->
                                            <table width="510" border="0" cellspacing="0" cellpadding="0" class="mobile-width">
                                                <tbody>
                                                    <tr>
                                                       <td height="80"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <table bgcolor="#333333" width="100%" cellspacing="0" cellpadding="0" border="0" background="http://vitermedicalproject.com.mx/assets/img/Not/back.png" style="background-repeat: no-repeat !important; background-position: center center;background-size: cover;" class="content-width">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <table width="510" cellspacing="0" cellpadding="0" border="0" class="content-width">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <table width="100%" align="center" cellspacing="0" cellpadding="0" border="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                       <td height="20"></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                       <td align="center">
                                                                                                          <table width="100" align="center" cellspacing="0" cellpadding="0" border="0">
                                                                                                             <tbody>
                                                                                                                <tr>
                                                                                                                   <td align="center"></td>
                                                                                                                </tr>
                                                                                                             </tbody>
                                                                                                          </table>
                                                                                                       </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                       <td>
                                                                                                          <table width="100" align="center" cellspacing="0" cellpadding="0" border="0">
                                                                                                             <tbody>
                                                                                                                <tr>
                                                                                                                   <td>
                                                                                                                      <a href="#" style="border-style: none !important; border: 0 !important;" >
                                                                                                                      <img src="http://vitermedicalproject.com.mx/assets/img/Not/logo2.png" width="153" height="153" alt="" editable="true" mc:edit="n-logo-img2"/>
                                                                                                                      </a>
                                                                                                                   </td>
                                                                                                                </tr>
                                                                                                             </tbody>
                                                                                                          </table>
                                                                                                       </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                       <td height="39"></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table width="510" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" class="content-width">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <table width="450" cellspacing="0" cellpadding="0" border="0" class="content-width inner-width">
                                                                                <tbody>
                                                                                    <tr>
                                                                                       <td height="10" colspan="2"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center" class="center" colspan="2" style="font-family: Lato, sans-serif; font-size: 30px; mso-line-height-rule:exactly; line-height:35px; font-weight:300; color: #343a43;" mc:edit="section2-title">
                                                                                            <multiline label="section2-title1">
                                                                                                Información de Signos Vitales
                                                                                            </multiline>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="15" colspan="2"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="2" align="left" class="" style="font-family: Lato, sans-serif; font-size: 14px; mso-line-height-rule:exactly; line-height:20px; color: #343a43; font-weight:300;text-transform:uppercase!important"  mc:edit="section2-text">
                                                                                            <multiline label="section2-text1">
                                                                                            PACIENTE: '.$data['paciente_nombre'].'
                                                                                            </multiline>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="10" colspan="2"></td>
                                                                                    </tr>
                                                                                    <tr style="background: #010101">
                                                                                        <td style="padding: 10px;width: 50%">
                                                                                            <h6 style="color: #FF9800!important;margin-top: 0px">PSNI</h6>
                                                                                            <h3 style="color: #FF9800!important;font-weight: bold;font-size: 35px;margin-top: -15px">'.$data['sv_ta'].'</h3>
                                                                                            <h6 style="color: #FF9800!important;margin-top: -20px;margin-bottom: 0px">SIS/DIA mmHg (PAM)</h6>
                                                                                        </td>
                                                                                        <td style="padding: 10px;border-left: 1px solid white">
                                                                                            <h6 style="color:#76FF03!important;margin-top: 0px">FREC PULSO</h6>
                                                                                            <h3 style="color:#76FF03!important;font-weight: bold;font-size: 35px;margin-top: -15px">'.$data['sv_fc'].'</h3>
                                                                                            <h6 style="color:#76FF03!important;margin-top: -20px;margin-bottom: 0px"><i class="fa fa-heartbeat"></i>/MIN</h6>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="background: #010101;border-top: 1px solid white">
                                                                                        <td style="padding: 10px">
                                                                                            <h6 style="color: #2196F3!important;margin-top: 0px">SpO2</h6>
                                                                                            <h3 style="color: #2196F3!important;font-weight: bold;font-size: 35px;margin-top: -15px">'.$data['sv_oximetria'].'</h3>
                                                                                            <h6 style="color: black!important;margin-top: -20px;margin-bottom: 0px">.</h6>                                                                    
                                                                                        </td>
                                                                                        <td style="padding: 10px;border-left: 1px solid white" >
                                                                                            <h6 style="color: white!important;margin-top: 0px">TEMPERATURA</h6>
                                                                                            <h3 style="color: white!important;font-weight: bold;font-size: 35px;margin-top: -15px">'.$data['sv_temp'].'</h3>
                                                                                            <h6 style="color: white!important;margin-top: -20px;margin-bottom: 0px">°C (°F)</h6>      
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="10" colspan="2"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="2" align="left" class="" style="font-family: Lato, sans-serif; font-size: 14px; mso-line-height-rule:exactly; line-height:20px; color: #343a43; font-weight:300;;text-transform:uppercase!important"  mc:edit="section2-text">
                                                                                            <multiline label="section2-text1">
                                                                                                <b>ÁREA:</b>'.$data['area_nombre'].'<br>
                                                                                                <b>UNIDAD MÉDICA:</b>'.$data['hospital_nombre'].'<br>
                                                                                            </multiline>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="10" colspan="2"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center" class="center" colspan="2" style="font-family: Lato, sans-serif; font-size: 14px; mso-line-height-rule:exactly; line-height:20px; color: #343a43; font-weight:300;"  mc:edit="section2-text">
                                                                                            <multiline label="section2-text1">'.$data['hospital_direccion'].'</multiline>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                       <td height="30" colspan="2"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table width="510" bgcolor="#24272c" align="center" border="0" cellspacing="0" cellpadding="0" class="content-width">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <table width="300" align="center" border="0" cellspacing="0" cellpadding="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                       <td height="15"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center" class="center" style="font-family: Lato , sans-serif; font-size: 14px; mso-line-height-rule:exactly; font-weight:300; line-height:20px;" mc:edit="section3-title1">
                                                                                            <singleline label="contact_title1">
                                                                                                <a href="#" style="color:#FFFFFF;">Si tiene algún comentario o sugerencia, háganos saber aquí.</a>
                                                                                            </singleline>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                       <td height="15"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td height="10"></td>
                                                                    </tr>
                                                                    <!-- Start Space -->										
                                                                    <tr>
                                                                       <td height="10"></td>
                                                                    </tr>
                                                                    <!-- End Space -->	
                                                                    <!-- Start Space -->										
                                                                    <tr>
                                                                       <td height="40"></td>
                                                                    </tr>
                                                                    <!-- End Space -->										
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>
                    </html>';
        return $Content;
    }
}
