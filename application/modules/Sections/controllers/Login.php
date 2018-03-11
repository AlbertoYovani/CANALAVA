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
}
