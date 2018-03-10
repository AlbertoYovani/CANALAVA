<?= Modules::run('Sections/Menus/Header')?>
<div class="content">  
    <div class="page-title">	
        <div class="row">
            <div class="col-md-10 col-centered">
                <div class="grid simple">
                    <div class="panel-heading back-sigcamara">
                        <h4><span class="semi-bold" style="color: white;">MI CUENTA</span></h4>
                    </div>
                    <div class="grid-body no-border"><br>
                        <form class="modificar-cuenta">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="form-label">Nombre de usuario</label>
                                                <input type="text" name="nombre_usuario" class="form-control" value="<?= $datos['usuario_nombre']?>">                                 
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="form-label">Password</label>
                                                <input type="password" id="password" name="password_usuario" class="form-control" value="<?= $datos['usuario_password']?>">                                 
                                            </div>
                                            <div class="checkbox checkbox check-success">
                                                <input type="checkbox" id="checkbox1" name="show_password">
                                                <label for="checkbox1" style="color: #000000;">Mostrar contraseña</label>
                                            </div>
                                        </div> 
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="form-label">Correo electrónico</label>
                                                <input type="email" name="correo_usuario" class="form-control" value="<?= $datos['usuario_correo']?>">                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <center>
                                        <img src="<?= base_url()?>assets/img/perfiles/<?= $datos['usuario_perfil']?>" style="width: 70%; position: relative;">
                                    </center>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <div class="btn back-sigcamara cambiar-perfil" style="width: 260px; position: relative;" data-id="<?= $_GET['usuario']?>">
                                        <i class="fa fa-pencil" style="color: #FFFFFF; font-size: 15px;  margin-top: -3px; margin-left: 15px; margin-right: -10px;"></i>
                                        Cambiar imagen de perfil
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Intereses</label>
                                    <select id="multi" style="width:100%" name="intereses[]" multiple required="" data-value="<?= $datos['usuario_intereses']?>">
                                        <?php foreach ($camara_comercio AS $camara) {?>
                                            <option value="<?= $camara['camara_id']?>"><?= $camara['camara_nombre']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-actions">  
                                        <div class="pull-right">
                                            <input id="intereses_usuario" class="hidden" value="si">
                                            <input name="usuario" id="usuario" class="hidden" value="<?= $_GET['usuario']?>">
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
<script src="<?= base_url()?>assets/js/inicio.js" type="text/javascript"></script>
<script src="<?= base_url()?>assets/js/Usuarios.js" type="text/javascript"></script>

