<?php

/**
 * Description of Menus
 *
 * @author felipe de jesus <itifjpp@gmail.com>
 */
require_once APPPATH.'modules/config/controllers/Config.php';
class Menus extends Config{
    public function Header() {
        $this->load->library('session');
        if(isset($_SESSION['usuario_id'])) {
            $sql['menu'] = $this->config_mdl->sqlGetDataCondition('menus', array(
                'usuario_id'=> $_SESSION['usuario_id']
            ));
            $sql['usuario'] = $this->config_mdl->sqlGetDataCondition('usuarios', array(
                'usuario_id'=> $_SESSION['usuario_id']
            ))[0];
        }else {
            $sql['menu'] = '';
            $sql['usuario']='';
        }
        
        $this->load->view('Menus/Header', $sql);
    }
    public function Footer() {
        $this->load->view('Menus/Footer');
    }
}
