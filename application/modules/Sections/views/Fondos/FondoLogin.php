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
                        <h4><span class="semi-bold" style="color: white;"><?= $_GET['accion']=='add' ? 'NUEVA' : 'EDITAR' ?> IMAGEN DE FONDO</span></h4>
                    </div>
                    <div class="grid-body no-border"><br>
                        <form class="guardar_imagen_fondo">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label semi-bold">NOMBRE</label>
                                        <input type="text" name="imagen_nombre" class="form-control" value="<?= $usuario['imagen_nombre']?>" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b>ESTADO</b></label>
                                        <select class="select1 width100" name="imagen_estado" id="imagen_estado" data-value="<?= $usuario['imagen_estado']?>" required="">
                                            <option value=""></option>
                                            <option value="Activo">Activo</option>
                                            <option value="No Activo">No Activo</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <input id="input-b6" name="imagen_fondo" type="file">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-actions">  
                                        <div class="pull-right">
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
<script src="<?= base_url()?>assets/js/canalava/Fondos.js?<?=md5(microtime())?>" type="text/javascript"></script>
