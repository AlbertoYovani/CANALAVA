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
        
    }
    
    public function FondosLogin() {
        $this->load->view("Usuarios/FondosLogin");
    }
}
