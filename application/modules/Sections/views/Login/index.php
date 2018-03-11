<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Cámara Nacional de la Industria de Lavanderías</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="proyectos.bientics@gmail.com" name="description" />
        <meta content="bienTICS" name="author"/>
        <link href="<?= base_url()?>assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/plugins/shape-hover/css/demo.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/shape-hover/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" >
        <link rel="stylesheet" href="<?= base_url()?>assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen" >
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="<?= base_url()?>assets/js/footable/footable.core.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="<?= base_url()?>assets/plugins/jquery-notifications/css/messenger.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/jquery-notifications/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/jquery-notifications/css/location-sel.css" rel="stylesheet" type="text/css" media="screen"/>
        
        <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/html5imageupload/demo.html5imageupload.css?<?=md5(microtime())?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/css/magic_space.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/css/canalava.css?<?=md5(microtime())?>" rel="stylesheet" type="text/css"/>
        <link href="<?=  base_url()?>assets/img/canalava.png" rel="icon" type="image/png">
        <!-- END CSS TEMPLATE -->
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    
    <body class="error-body no-top lazy" style="background-image: url('<?= base_url()?>assets/img/fondo.jpg');background-size: cover;background-position: center">
        <div class="container">
            <div class="row login-container  ">  
                <div class="col-md-6 col-centered tiles white" style="border-radius: 4px;margin-top: calc(5%)!important">
                    <div class="row column-seperation">
                        <div class="col-md-5">
                            <center>
                                <img src="<?= base_url()?>assets/img/canalava.png" style="width: 200px;">
                            </center>
                        </div>
                        <div class="col-md-7 " style="background: #E8ECEE">
                            <h2 style="color: black!important">INICIAR SESIÓN</h2>
                            <form  class="form-login">
                                <div class="form-group">
                                    <input type="text" name="login_usuario" required="" autocomplete="off" placeholder="INGRESAR USUARIO" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="login_password" placeholder="INGRESAR CONTRASEÑA" required="" autocomplete="off"  class="form-control">
				</div>
                                <div class="form-group" style="margin-bottom: 10px;margin-top: -14px;">
                                    <a href="<?= base_url()?>Sections/Login/RecoveryPassword">¿OLVIDÉ MI CONTRASEÑA?</a>
                                </div>
                                <button class="btn btn-primary btn-cons pull-right" type="submit">INGRESAR</button>
                            </form>
                            <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= base_url()?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/breakpoints.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>

        <!-- END CORE JS FRAMEWORK -->
        <script src="<?= base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?= base_url()?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
        <script src="<?= base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/ios-switch/ios7-switch.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/js/bootbox.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-notifications/js/messenger.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-notifications/js/messenger-theme-future.js" type="text/javascript"></script>

        <script src="<?= base_url()?>assets/plugins/breakpoints.js" type="text/javascript"></script> 
        <script src="<?= base_url()?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
        <script src="<?= base_url()?>assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
        <script type="text/javascript" src="<?= base_url()?>assets/js/underscore-min.js"></script>

        <script src="<?= base_url()?>assets/js/backbone-min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/js/footable/footable.all.min.js"></script>
        <!-- JS ONY FOR DEMO--> 	
        <script type="text/javascript" src="<?= base_url()?>assets/plugins/jquery-notifications/js/demo/location-sel.js"></script>
        <script type="text/javascript" src="<?= base_url()?>assets/plugins/jquery-notifications/js/demo/theme-sel.js"></script>
        <script type="text/javascript" src="<?= base_url()?>assets/plugins/jquery-notifications/js/demo/demo.js"></script>
        <script src="<?=  base_url()?>assets/plugins/html5imageupload/html5imageupload.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/js/core.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/js/chat.js" type="text/javascript"></script> 
        <script src="<?= base_url()?>assets/js/demo.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/js/canalava/login.js?<?= md5(microtime())?>" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/js/mensajes.js?<?= md5(microtime())?>" type="text/javascript"></script>
        <script>var base_url='<?=  base_url()?>';</script>
        <!-- END CORE TEMPLATE JS --> 
    </body>
</html>