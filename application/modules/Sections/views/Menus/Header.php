<?php
    $this->load->library('session');

    if(!isset($_SESSION['usuario_id'])){
        echo '<script>alert("Para poder ingresar, inicie sesión.")</script>';
        redirect('/Sections/Login', 'refresh');
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Cámara Nacional de la Industria de Lavanderías</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="<albertoyovanip@gmail.com>" name="description" />
    <meta content="bienTICS" name="author"/>
        <link rel="stylesheet" href="<?= base_url()?>assets/css/font-awesome.min.css">
        <link href="<?= base_url()?>assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/plugins/shape-hover/css/demo.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/shape-hover/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" >
        <link href="<?= base_url()?>assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?= base_url()?>assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen" >
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="<?= base_url()?>assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/plugins/ios-switch/ios7-switch.css" rel="stylesheet" type="text/css" media="screen">
        <link href="<?= base_url()?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="<?= base_url()?>assets/plugins/jquery-notifications/css/messenger.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/jquery-notifications/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/jquery-notifications/css/location-sel.css" rel="stylesheet" type="text/css" media="screen"/>
        
        <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/css/canalava.css?<?=md5(microtime())?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/css/fileinput.css?<?=md5(microtime())?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/html5imageupload/demo.html5imageupload.css?<?=md5(microtime())?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/css/magic_space.css" rel="stylesheet" type="text/css"/>
        <link href="<?=  base_url()?>assets/img/canalava.png" rel="icon" type="image/png">
        <link href="<?= base_url()?>assets/js/footable/footable.core.css" rel="stylesheet" type="text/css"/>
    </head>
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse"> 
  <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation" style="background: white;">
            <!-- BEGIN LOGO -->	
            
            <!-- END LOGO --> 
        </div>
        <!-- END RESPONSIVE MENU TOGGLER --> 
        <div class="header-quick-nav"> 
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left" style="margin-left: -240px !important;"> 
                <ul class="nav quick-section">
                    <li class="quicklinks" > 
                        <p style="font-size: 15px;margin: 0px 0px 0px 45px; color: black;">
                            <b>CANALAVA</b> 
                        </p>
                    </li>
                </ul>
            </div>
            <div class="pull-left"> 
                <ul class="nav quick-section">
                    <li class="quicklinks"> 
                        <p class="time" style="font-size: 40px;margin: 0px 0px 0px 0px; color: #1B1E24;">
                            <b class="hora"><?= date('H')?></b>:<b class="minuto"><?= date('i')?></b>:<b class="segundo"><?= date('s')?></b> 
                        </p>
                        <p style="text-transform: uppercase;font-size: 9px;margin: 6px 0px 0px 0px; color: #1B1E24;">
                            <b class="fecha"></b> 
                        </p>
                    </li>
                </ul>
            </div>
             <!-- END TOP NAVIGATION MENU -->
             
             <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right"> 
                <div class="chat-toggler">	
                    <div class="user-details"> 
                        <div class="username"> 
                            <span class="bold" style="text-transform: uppercase;color: #1B1E24;"><?=$usuario['usuario_nombre']?> <?=$usuario['usuario_ap']?> <?=$usuario['usuario_am']?></span>&nbsp;&nbsp;&nbsp;									
                        </div>						
                    </div> 
                    <div class="profile-pic"> 
                        <img src="<?= base_url()?>assets/img/perfiles/<?=$usuario['usuario_perfil']?>"  alt="" data-src="<?= base_url()?>assets/img/perfiles/<?=$usuario['usuario_perfil']?>" data-src-retina="<?= base_url()?>assets/img/perfiles/<?= $usuario['usuario_perfil']?>" width="35" height="35" /> 
                    </div>       			
                </div>
                <ul class="nav quick-section">
                    <li class="quicklinks"> 
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">						
                            <div class="iconset top-settings-dark "></div> 	
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                            <li><a href="<?= base_url()?>Sections/Usuarios/MiPerfil?U=<?= $_SESSION['usuario_id']?>&MyProfile"> Mi cuenta</a></li>
                            <!-- <li><a href="#">Mis Actividades</a></li> -->
                            <li class="divider"></li>        
                            <li><a href="<?= base_url()?>/Sections/Login/LogOut"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Cerrar sesión</a></li>
                        </ul>
                    </li> 
                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div> 
        <!-- END TOP NAVIGATION MENU --> 
    </div>
    <!-- END TOP NAVIGATION BAR --> 
</div>
<!-- END HEADER -->

<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar" id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper"> 
            <div class="user-info-wrapper sm">
                <div class="row">
                    <div class="col-xs-12" style="padding: 0px">
                        <div class="img-circle-logo">
                            <img src="<?= base_url()?>assets/img/perfiles/<?=$usuario['usuario_perfil']?>"  alt="" data-src="<?= base_url()?>assets/img/perfiles/<?=$usuario['usuario_perfil']?>" data-src-retina="<?= base_url()?>assets/img/perfiles/<?=$usuario['usuario_perfil']?>"/>
                        </div>
                    </div>
                </div><br>
                <div class="user-info">
                    <hr style="margin-top: 3px;margin-bottom: 3px; width: 180px !important; height: 1px;">
                    <div class="username" style="text-transform: uppercase;"><span class="semi-bold"><?= $_SESSION['usuario_tipo']?></span></div>
                </div>
            </div>
            <!-- END MINI-PROFILE -->
            
            <!-- BEGIN SIDEBAR MENU -->	
            <hr class="hr-style-white" style="margin-top: 15px">
            <ul>
                <?php foreach ($menu AS $value) {?>
                    <?php if($value['menu_status'] == 0) {?>
                        <li class=""><a href="<?= base_url().$value['menu_url']?>"> <i class="<?= $value['menu_icono']?>"></i> <span class="title"><?= $value['menu_nombre']?></span></a> </li>      
                    <?php }else{ ?>
                        <li class=""> <a href="javascript:;"> <i class="<?= $value['menu_icono']?>"></i> <span class="title"><?= $value['menu_nombre']?></span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <?php $submenu = $this->config_mdl->sqlQuery("SELECT *FROM menus_2, menus WHERE menus_2.menu_id = menus.menu_id AND menus.menu_id=".$value['menu_id']);
                                foreach ($submenu AS $subvalue) { 
                                ?>
                                    <li> <a href="<?= base_url().$subvalue['menu2_url']?>"><?= $subvalue['menu2_nombre']?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <!-- END SIDEBAR MENU --> 
        </div>
    </div>
  <!-- END SIDEBAR --> 
  
  <!-- BEGIN PAGE CONTAINER -->
<div class="page-content"> 
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM -->