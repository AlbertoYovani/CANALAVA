<?php

/**
 * Description of Login
 *
 * @author Alberto Yovani <albertoyovanip@gmail.com>
 */
require_once APPPATH.'modules/config/controllers/Config.php';
class Inicio extends Config{
    
    public function index() {
        $this->load->view("Inicio");
    }
    
    public function Eliminar() {
        if($_POST['tipo'] == 'camara'){
            $this->config_mdl->sqlDelete('c_cama_comercio', array(
                'camara_id'=> $_POST['id']
            ));
        }else if($_POST['tipo'] == 'afiliado'){
            $this->config_mdl->sqlDelete('c_afiliados', array(
                'afiliado_id'=> $_POST['id']
            ));
        }else if($_POST['tipo'] == 'promotor'){
            $this->config_mdl->sqlDelete('c_promotores', array(
                'promotor_id'=> $_POST['id']
            ));
        }else if($_POST['tipo'] == 'comision'){
            $this->config_mdl->sqlDelete('c_comisiones', array(
                'comision_id'=> $_POST['id']
            ));
            $this->config_mdl->sqlDelete('c_contactos', array(
                'contacto_id'=> $_POST['id']
            ));
        }
        if($_POST['usuario_id'] != '0'){
            $this->config_mdl->sqlDelete('c_usuarios', array(
                'usuario_id'=> $_POST['usuario']
            ));
        }
        
        $this->setOutput(array('accion'=>'1'));
    }
    
    
    
    public function UpdateCuenta() {
        foreach ($this->input->post('intereses') as $intereses) {
           $roles.=$intereses.',';
        }
        $this->config_mdl->sqlUpdate('c_usuarios', array(
            'usuario_password'=>$_POST['password_usuario'],
            'usuario_nombre'=>$_POST['nombre_usuario'],
            'usuario_correo'=>$_POST['correo_usuario'],
            'usuario_intereses'=>$roles
        ), array(
            'usuario_id'=> $_POST['usuario']
        ));
        session_destroy();
        $this->setOutput(array('accion'=>'1'));
    }
    
    public function MiPerfil() {
        $this->load->view("MiPerfil");
    }
    
    public function CambiarPerfil() {
        
        $perfil = $this->config_mdl->sqlQuery("SELECT *FROM c_usuarios 
                                               WHERE usuario_id = ".$_POST['usuario'])[0];
        
        unlink('assets/img/perfiles/'.$perfil['usuario_perfil']);
        
        $this->config_mdl->sqlUpdate('c_usuarios', array(
            'usuario_perfil'=>$_POST['imageUpload']
        ), array(
            'usuario_id'=> $_POST['usuario']
        ));

        $this->setOutput(array('accion'=>'1'));
    }
}
