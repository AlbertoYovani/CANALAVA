<?=Modules::run('Sections/Menus/Header')?>
<div class="content">
    <div class="row">
        <div class="col-md-12 col-centered">
            <ul class="breadcrumb">
                <li style="margin-left: -16px;"><a href="<?= base_url()?>/Inicio" class="disabled">INICIO</a></li>
                <li><a href="#" class="disabled">CONFIGURACIÓN</a></li>
                <li><a href="#" class="active">USUARIOS</a></li>
            </ul>
            <br>
            <div class="grid simple ">
                <div class="panel-heading back-canalava" style="padding: 5px 15px">
                    <h4><span class="semi-bold" style="color: white; text-transform: uppercase;">USUARIOS</span></h4>
                    <a href="<?= base_url()?>Sections/Usuarios/Usuario_Add?usu=0&accion=add" class="btn-circle btn-lg pull-right canalava tip rojo-canalava">
                        <i class="mdi-av-my-library-add fa fa-plus" style="font-size: 30px;"></i>
                    </a> 
                </div>
                <div class="grid-body no-border">
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon primary">				  
                                    <span class="arrow"></span>
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Buscar..." id="buscar">
                            </div><br>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-12">
                            <table class="table footable table-bordered footable table-filtros" data-page-size="5" data-filter="#buscar">  
                                <thead>
                                    <tr>                          
                                        <th data-sort-ignore="true">ROL</th>
                                        <th data-sort-ignore="true">SUB ROL</th>
                                        <th data-sort-ignore="true">NOMBRE</th>
                                        <th data-sort-ignore="true">TÉLEFONO</th>
                                        <th data-sort-ignore="true">EMAIL</th>
                                        <th data-sort-ignore="true">ACCIÓN</th>             
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Usuarios as $value) {?>
                                    <tr>
                                        <td><?=$value['rol_nombre']?></td>
                                        <?php 
                                        echo '<td>'.$value["sub_rol_nombre"].'</td>';
                                        ?>
                                        <td><?=$value['usuario_nombre']?> <?=$value['usuario_ap']?> <?=$value['usuario_am']?></td>
                                        <td><?=$value['usuario_tel']?></td>
                                        <td><?=$value['usuario_mail']?></td>
                                        <td>
                                            &nbsp;<a href="<?= base_url()?>Sections/Usuarios/Usuario_Add?usu=<?=$value['usuario_id']?>&accion=edit">
                                                <i class="fa fa-pencil i-20"></i>
                                            </a>&nbsp;
                                            <i class="fa fa-trash-o i-20 pointer eliminar_usuario" data-id="<?=$value['usuario_id']?>"></i>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot class="hide-if-no-paging">
                                    <tr>
                                        <td colspan="6" id="footerCeldas" class="text-center">
                                            <ul class="pagination"></ul>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=Modules::run('Sections/Menus/Footer')?>
<script type="text/javascript" src="<?= base_url()?>assets/js/canalava/Usuarios.js?<?=md5(microtime())?>"></script>