<?= Modules::run('Sections/Menus/Header')?>
<div class="content">  
    <div class="page-title">    
        <div class="row">
            <div class="col-md-9 col-centered">
                <div class="grid simple">
                    <div class="panel-heading teal-900 back-sigcamara">
                        <span style="font-size: 15px;font-weight: 500">CAMBIAR IMAGEN DE PERFIL</span>
                    </div>
                    <div class="grid-body no-border">
                        <div class="row">
                            <div class="col-md-10"><br>
                                <center>
                                    <div id="retrievingfilename" class="html5imageupload" data-width="350" data-height="250" style="width: 70%;" data-url="<?=  base_url()?>Config/html5ImageUpload?tipo=img/perfiles">
                                        <input type="file" name="thumb" style="height: 100px!important;">
                                    </div>
                                </center>
                            </div>
                            <form class="guardar-img-perfil">
                                <input type="hidden" name="imageUpload" id="imageUpload" class="form-control"/>
                                <input type="hidden" name="usuario" class="form-control" value="<?= $_GET['usuario']?>"/>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary pull-right btn-cons">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= Modules::run('Sections/Menus/Footer')?>
<script src="<?= base_url()?>assets/js/inicio.js" type="text/javascript"></script>

