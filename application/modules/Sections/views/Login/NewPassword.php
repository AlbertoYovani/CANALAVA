<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Sistema de Gestión de Cámaras.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="proyectos.bientics@gmail.com" name="description" />
        <meta content="bienTICS" name="author"/>
        <link href="<?= base_url()?>assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/plugins/shape-hover/css/demo.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/shape-hover/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" >
        <link rel="stylesheet" href="<?= base_url()?>assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen" >
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="<?= base_url()?>assets/js/footable/footable.core.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?= base_url()?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url()?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
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
        <link href="<?=  base_url()?>assets/img/logo.png" rel="icon" type="image/png">
        <!-- END CSS TEMPLATE -->
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="error-body no-top lazy">
        <div class="container">
            <div class="row " style="margin-top: 50px">  
                <div class="col-md-4 col-centered" >
                    <div class="row login-container column-seperation">
                        <div class="col-md-12 "> <br>
                            <form class="form_new_recovery_password">
                                <h4 style="margin-top: -10px;margin-bottom: 20px;font-weight: bold">RECUPERACIÓN DE CONTRASEÑA</h4>
                                <h6 style="text-transform: uppercase;line-height: 1.6; color: #000">nueva contraseña</h6>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary">
                                            <i class="fa fa-unlock"></i>
                                        </span>
                                        <input type="text" name="new_password" class="form-control" placeholder="NUEVA CONTRASEÑA" required="">
                                    </div>
                                </div>
                                <h6 style="text-transform: uppercase;line-height: 1.6; color: #000">confirmar contraseña</h6>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary">
                                            <i class="fa fa-unlock-alt"></i>
                                        </span>
                                        <input type="text" name="confirm_password" class="form-control" placeholder="CONFIRMAR CONTRASEÑA" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="usuario" value="<?= base64_decode($_GET['U'])?>">
                                        <input type="hidden" name="usuario_id" value="<?= base64_decode(base64_decode($_GET['i']))?>">
                                        <button class="btn btn-primary btn-cons pull-right btn-recovery-password" type="submit">CREAR</button>
                                    </div>
                                </div>
                            </form>
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
        <script src="<?= base_url()?>assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
        <!-- END CORE JS FRAMEWORK -->

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
