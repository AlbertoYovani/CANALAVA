<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fondos
 *
 * @author Alberto Yovani <albertoyovanip@gmail.com>
 */
require_once APPPATH.'modules/config/controllers/Config.php';
class Fondos extends Config{
    
    public function index() {
        
        $query['imagenes_fondo'] = $this->config_mdl->sqlGetData("c_imagenes_fondo");
        
        $this->load->view("Fondos/index", $query);
    }
    
    public function ImagenFondoLogin() {
        $this->load->view("Fondos/FondoLogin");
    }
    
    public function Ajax_guardar_fondo() {
        $ext= md5(rand()).'.'.end(explode('.',$_FILES['imagen_fondo']['name']));
        if(copy($_FILES['imagen_fondo']['tmp_name'],'assets/img/fondos/'.$ext)){
            $this->config_mdl->sqlInsert('c_imagenes_fondo',array(
                'imagen_nombre'=> $this->input->post('imagen_nombre'),
                'imagen_archivo'=>$ext,
                'imagen_estado'=>$this->input->post('imagen_estado'),
            ));
        }
        $this->setOutput(array('accion'=>'1'));
    }
    
    public function Eliminar_fondo() {
        $this->config_mdl->sqlDelete('c_imagenes_fondo', array(
           'imagen_id'=> $this->input->post('id') 
        ));
        
        $this->setOutput(array('accion'=>'1'));
    }
}
