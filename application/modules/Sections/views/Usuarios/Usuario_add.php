<?= Modules::run('Sections/Menus/Header')?>
<div class="content">
    <div class="page-title">	
        <div class="row">
            <div class="col-md-11 col-centered">
                <ul class="breadcrumb">
                    <li style="margin-left: -16px;"><a href="<?= base_url()?>/Inicio" class="disabled">INICIO</a></li>
                    <li><a href="#" class="disabled">CONFIGURACIÓN</a></li>
                    <li><a href="<?= base_url()?>Sections/Usuarios" class="disabled">USUARIOS</a></li>
                    <li><a href="#" class="active"><?= $_GET['accion']=='add' ? 'NUEVO' : 'EDITAR' ?> USUARIO</a></li>
                </ul>
                <br>
                <div class="grid simple">
                    <div class="panel-heading back-canalava" style="padding: 5px 15px">
                        <h4><span class="semi-bold" style="color: white;"><?= $_GET['accion']=='add' ? 'NUEVO' : 'EDITAR' ?> USUARIO</span></h4>
                    </div>
                    <div class="grid-body no-border"><br>
                        <form class="guardar_usuario">
                            <div class="row" style="padding: 14px;margin-top: 5px;">
                                <div class="col-md-12 back-canalava text-center">
                                    <h5 style="color: white;"><b>DATOS DEL USUARIOS</b></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">NOMBRE (S)</label>
                                        <input type="text" name="nombre" class="form-control" value="<?= $usuario['usuario_nombre']?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">APELLIDO PATERNO</label>
                                        <input type="text" name="usuario_ap" class="form-control" value="<?= $usuario['usuario_ap']?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">APELLIDO MATERNO</label>
                                        <input type="text" name="usuario_am" class="form-control" value="<?= $usuario['usuario_am']?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <label class="form-label semi-bold">CORREO ELECTRÓNICO</label>
                                        <input type="email" name="usuario_correo" class="form-control" value="<?= $usuario['usuario_mail']?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">FECHA/NACIMIENTO</label>
                                        <input type="text" name="usuario_nac" class="form-control date" placeholder="MM/DD/YYYY" value="<?= $usuario['usuario_nac']?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">LADA</label>
                                        <input type="number" name="usuario_tel_lada" class="form-control" value="<?= $usuario['usuario_tel_lada']?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">NÚMERO TELEFÓNICO</label>
                                        <input type="number" name="usuario_tel" class="form-control" value="<?= $usuario['usuario_tel']?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b>SEXO</b></label>
                                        <select class="select4 width100" name="usuario_sexo" id="usuario_sexo" data-value="<?= $usuario['usuario_sexo']?>">
                                            <option value=""></option>
                                            <option value="MUJER">MUJER</option>
                                            <option value="HOMBRE">HOMBRE</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b>TIPO ROL</b></label>
                                        <select class="select2 width100" name="rol_nombre" id="rol_nombre" data-value="<?= $usuario['rol_nombre']?>">
                                            <option value=""></option>
                                            <?php foreach ($roles as $value){?>
                                            <option value="<?=$value['rol_nombre']?>"><?=$value['rol_nombre']?></option>
                                            <?php }?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b>SUB ROL</b></label>
                                        <select class="select3 width100" disabled name="sub_rol_nombre" id="sub_rol_nombre" data-value="<?= $usuario['sub_rol_nombre']?>">
                                            <option value=""></option>
                                            <option value="<?= $usuario['sub_rol_nombre']?>"><?= $usuario['sub_rol_nombre']?></option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">DIRECCIÓN DEL USUARIO</label>
                                        <textarea name="usuario_dir" class="form-control" style="height: 35px;"><?= $usuario['usuario_dir']?></textarea>
                                    </div> 
                                </div>
                            </div>
                            <?php if($_GET['accion'] == 'add'){ ?> 
                            <div class="row" style="padding: 14px;margin-top: 5px;">
                                <div class="col-md-12 back-canalava text-center">
                                    <h5 style="color: white;"><b>DATOS DE ACCESO</b></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="retrievingfilename" class="html5imageupload" data-width="400" data-height="300" style="width: 80%;" data-url="<?=  base_url()?>Config/html5ImageUpload?tipo=img/perfiles">
                                                <input type="file" name="thumb" style="height: 170px!important;">
                                            </div>
                                            <input type="hidden" name="imageUpload" id="imageUpload" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label semi-bold">NOMBRE DE USUARIO</label>
                                                <input type="text" name="usuario_nombre" class="form-control" value="<?= $usuario['usuario']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label semi-bold">CONTRASEÑA</label>
                                                <input type="password" name="usuario_pass" class="form-control" value="<?= $usuario['usuario_password']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label semi-bold">CONFIRMAR CONTRASEÑA</label>
                                                <input type="password" name="usuario_pass_con" class="form-control confirmar_contra" value="" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-actions">  
                                        <div class="pull-right">
                                            <input name="usuario_id" type="hidden" value="<?= $_GET['usu']?>">
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
</div>
<?= Modules::run('Sections/Menus/Footer')?>
<script src="<?= base_url()?>assets/js/canalava/Usuarios.js?<?=md5(microtime())?>" type="text/javascript"></script>
