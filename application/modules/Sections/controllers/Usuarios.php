<?php

/**
 * Description of Login
 *
 * @author Alberto Yovani <albertoyovanip@gmail.com>
 */
require_once APPPATH.'modules/config/controllers/Config.php';
class Usuarios extends Config{
    
    public function index() {
        $Usuarios['Usuarios'] = $this->config_mdl->sqlQuery("SELECT *FROM usuarios, roles, sub_roles
                                                             WHERE roles.rol_id = usuarios.rol_id 
                                                             AND sub_roles.sub_rol_id = usuarios.sub_rol_id
                                                             AND roles.rol_id = sub_roles.rol_id
                                                             ORDER BY usuarios.usuario_id ASC");
        $this->load->view("Usuarios/index", $Usuarios);
    }
    
    public function Usuario_Add(){
        $sql['roles'] = $this->config_mdl->sqlQuery("SELECT *FROM roles");
        if($this->input->get('accion') === 'edit'){
            $sql['usuario'] = $this->config_mdl->sqlQuery("SELECT *FROM usuarios, roles, sub_roles
                                                               WHERE roles.rol_id = usuarios.rol_id 
                                                               AND sub_roles.sub_rol_id = usuarios.sub_rol_id
                                                               AND roles.rol_id = sub_roles.rol_id                                                             
                                                               AND usuarios.usuario_id =".$this->input->get('usu'))[0];
            
        }else{
            $usuario['usuario'] ='';
        }
        $this->load->view("Usuarios/Usuario_add", $sql);
    }
    
    public function Ajax_sub_roles(){
        $id_rol = $this->config_mdl->sqlQuery("SELECT *FROM roles
                                               WHERE rol_nombre='".$this->input->post('rol_nombre')."'")[0];
        $option = '';
        $sub_roles = $this->config_mdl->sqlQuery("SELECT *FROM roles, sub_roles
                                                  WHERE roles.rol_id = sub_roles.rol_id
                                                  AND sub_roles.rol_id =".$id_rol['rol_id']);
        foreach ($sub_roles AS $value){
            $option.='<option value="'.$value['sub_rol_nombre'].'">'.$value['sub_rol_nombre'].'</option>';
        }
        $this->setOutput(array('sub_roles'=>$option));
    }
    
    public function Ajax_guardar_usuario() {
        $rol_and_sub = $this->config_mdl->sqlGetDataCondition('sub_roles',array(
            'sub_rol_nombre'=> $this->input->post('sub_rol_nombre')
        ))[0];
        
        $data = array(
            'usuario_nombre'=> $this->input->post('nombre'),
            'usuario_ap'=>$this->input->post('usuario_ap'),
            'usuario_am'=>$this->input->post('usuario_am'),
            'usuario_mail'=>$this->input->post('usuario_correo'),
            'usuario_tel_lada'=>$this->input->post('usuario_tel_lada'),
            'usuario_tel'=>$this->input->post('usuario_tel'),
            'usuario_nac'=>$this->input->post('usuario_nac'),
            'usuario_sexo'=>$this->input->post('usuario_sexo'),
            'usuario_dir'=>$this->input->post('usuario_dir'),
            'usuario'=>$this->input->post('usuario_nombre'),
            'usuario_password'=>$this->input->post('usuario_pass'),
            'usuario_perfil'=>$this->input->post('imageUpload'),
            'rol_id'=>$rol_and_sub['rol_id'],
            'sub_rol_id'=>$rol_and_sub['sub_rol_id']
        );
        
        if($this->input->post('accion') === 'edit'){
            unset($data['usuario_nombre']);unset($data['usuario_pass']);unset($data['imageUpload']);unset($data['rol_id']);unset($data['sub_rol_id']);
            
            $this->config_mdl->sqlUpdate('usuarios',$data, array(
                'usuario_id'=> $this->input->post('usuario_id')
            ));
        }else{
            $this->config_mdl->sqlInsert('usuarios',$data);
        
            $usuario_id =  $this->config_mdl->sqlGetLastId('usuarios','usuario_id');
        
            $this->config_mdl->sqlInsert('menus',array(
                'menu_nombre'=>'ROL',
                'menu_url'=>'#',
                'menu_icono'=>'fa fa-user',
                'menu_status'=>'0',
                'usuario_id'=>$usuario_id
            ));
        }
        
        $this->setOutput(array('accion'=>'1'));
    }
    
    public function Ajax_eliminar_usuario() {
        $menu_id = $this->config_mdl->sqlGetDataCondition('menus', array(
            'usuario_id'=> $this->input->post('id')
        ));
        foreach ($menu_id AS $menu_val){
            $this->config_mdl->sqlDelete('menus_2', array(
                'menu_id'=>$menu_val['menu_id']
            ));
        }
        $this->config_mdl->sqlDelete('usuarios', array(
            'usuario_id'=> $this->input->post('id')
        ));
        $this->config_mdl->sqlDelete('menus', array(
            'usuario_id'=> $this->input->post('id')
        ));
        
        $this->setOutput(array('accion'=>'1'));
    }
    
    public function UpdateCuenta() {
        $data = array(
            'usuario_nombre'=> $this->input->post('nombre'),
            'usuario_ap'=>$this->input->post('usuario_ap'),
            'usuario_am'=>$this->input->post('usuario_am'),
            'usuario_mail'=>$this->input->post('usuario_correo'),
            'usuario_tel_lada'=>$this->input->post('usuario_tel_lada'),
            'usuario_tel'=>$this->input->post('usuario_tel'),
            'usuario_nac'=>$this->input->post('usuario_nac'),
            'usuario_dir'=>$this->input->post('usuario_dir')
        );
        $this->config_mdl->sqlUpdate('usuarios',$data, array(
            'usuario_id'=> $this->input->post('usuario_id')
        ));
        $this->setOutput(array('accion'=>'1'));
    }
    
    public function MiPerfil() {
        $sql['usuario'] = $this->config_mdl->sqlGetDataCondition('usuarios', array(
          'usuario_id'=> $this->input->get('U')
        ))[0];
        $this->load->view("Usuarios/Perfil", $sql);
    }
    
    public function ElegirPerfil() {
        $this->load->view("Usuarios/MiPerfil");
    }
    
    public function Ajax_guardar_MiPerfil() {
        $perfil = $this->config_mdl->sqlGetDataCondition('usuarios', array(
            'usuario_id' => $_SESSION['usuario_id']
        ))[0]; 
                                               
        unlink('assets/img/perfiles/'.$perfil['usuario_perfil']);
        
        $this->config_mdl->sqlUpdate('usuarios', array(
            'usuario_perfil'=>$this->input->post('imageUpload')
        ), array(
            'usuario_id'=> $_SESSION['usuario_id']
        ));
        $this->setOutput(array('accion'=>'1'));
    }
    
}
