<?= Modules::run('Sections/Menus/Header')?>
<div class="content">
    <div class="page-title">	
        <div class="row">
            <div class="col-md-12 col-centered">
                <ul class="breadcrumb">
                    <li style="margin-left: -16px;"><a href="<?= base_url()?>/Inicio" class="disabled">INICIO</a></li>
                    <li><a href="#" class="active">MI CUENTA</a></li>
                </ul>
                <br>
                <div class="grid simple">
                    <div class="panel-heading back-canalava" style="padding: 5px 15px">
                        <h4><span class="semi-bold" style="color: white;">MI CUENTA</span></h4>
                    </div>
                <div class="grid-body no-border"><br>
                    <form class="guardar_edicion_perfil">
                        <div class="row" style="padding: 14px;margin-top: 5px;">
                            <div class="col-md-12 back-canalava text-center">
                                <h5 style="color: white;"><b>MIS DATOS DE ACCESO</b></h5>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                                <img src="<?= base_url()?>assets/img/perfiles/<?=$usuario['usuario_perfil']?>" style="width: 100%">
                                <br><br>
                                <div class="btn btn-primary btn-block btn-cambiar-perfil">
                                    <i class="fa fa-pencil" style="color:white;font-size:19px;margin-top:-6px;margin-right:-29px;margin-left:9px;"></i>
                                    Cambiar Imagen de Perfil
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label semi-bold" style="font-size: 13px;">NOMBRE (S)</label>
                                            <input type="text" name="nombre" class="form-control" value="<?= $usuario['usuario_nombre']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label semi-bold" style="font-size: 13px;">APELLIDO MATERNO</label>
                                            <input type="text" name="usuario_am" class="form-control" value="<?= $usuario['usuario_am']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label semi-bold" style="font-size: 13px;">FECHA/NACIMIENTO</label>
                                            <input type="text" name="usuario_nac" class="form-control date" placeholder="MM/DD/YYYY" value="<?= $usuario['usuario_nac']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label semi-bold" style="font-size: 13px;">APELLIDO PATERNO</label>
                                            <input type="text" name="usuario_ap" class="form-control" value="<?= $usuario['usuario_ap']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <label class="form-label semi-bold"style="font-size: 13px;">CORREO ELECTRÓNICO</label>
                                            <input type="email" name="usuario_correo" class="form-control" value="<?= $usuario['usuario_mail']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label semi-bold" style="font-size: 13px;">LADA</label>
                                            <input type="number" name="usuario_tel_lada" class="form-control" value="<?= $usuario['usuario_tel_lada']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-label semi-bold" style="font-size: 13px;">NÚMERO TELEFÓNICO</label>
                                            <input type="number" name="usuario_tel" class="form-control" value="<?= $usuario['usuario_tel']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 semi-bold" style="margin-left: -170px; font-size: 13px; color: #000">Necesitas cambiar tu contraseña: 
                                        <a href="#" class="semi-bold">Cambiar contraseña</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"><br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label semi-bold">DIRECCIÓN DEL USUARIO</label>
                                    <textarea name="usuario_dir" class="form-control" style="height: 50px;"><?= $usuario['usuario_dir']?></textarea>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-actions">  
                                    <div class="pull-right">
                                        <input name="usuario_id" type="hidden" value="<?= $_GET['U']?>">
                                        <input name="accion" type="hidden" value="<?= $_GET['accion']?>">
                                        <button type="submit" class="btn btn-success btn-cons">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= modules::run('Sections/Menus/Footer'); ?>
<script type="text/javascript" src="<?= base_url()?>assets/js/canalava/Usuarios.js?<?= md5(microtime())?>"></script>