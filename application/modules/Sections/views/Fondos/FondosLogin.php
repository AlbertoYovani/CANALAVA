<?= Modules::run('Sections/Menus/Header')?>
<div class="box-row">
    <div class="box-cell">
        <div class="box-inner padding col-md-12">
            <div class="panel panel-default ">
                <div class="panel-heading p teal-900 back-imss">
                    <span style="font-size: 15px;font-weight: 500">ADMINISTRAR IMAGENES DE FONDO</span>
                </div>
                <div class="panel-body b-b b-light">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <div id="retrievingfilename" class="html5imageupload" data-width="500" data-height="400" data-url="<?=base_url()?>Config/html5ImageUpload?tipo=img/perfiles" >
                                    <input type="file" name="thumb" style="height: 200px!important">
                                </div>
                                <form class="guardar_img_perfil">
                                    <input type="hidden" name="imageUpload" id="imageUpload" class="form-control" />
                                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= Modules::run('Sections/Menus/Footer')?>
<script src="<?= base_url()?>assets/js/canalava/Usuarios.js?<?=md5(microtime())?>" type="text/javascript"></script>
