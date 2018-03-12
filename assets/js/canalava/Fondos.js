$(document).ready(function(){
   $("#input-b6").fileinput({
        showUpload: false,
        maxFileCount: 10,
        mainClass: "input-group-lg"
    });
   $(".select1").select2();
   $('#imagen_fondo').val($('#imagen_fondo').attr('data-value')).select2();
   
    $('.guardar_imagen_fondo').submit(function (e){
        var formData=new FormData($(this)[0]);
        e.preventDefault();
        $.ajax({
            url: base_url+"Sections/Fondos/Ajax_guardar_fondo",
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            mimeType: 'multipart/form-data',
            beforeSend: function () {
                  msj_loading();
            },success: function (data) {
                location.href = base_url+"Sections/Fondos";
            },error: function (e) {
                console.log(e);
            }
        });
    });
    
    $('.ver_fondo').click( function (e) {
        var img = $(this).attr("data-img");
        e.preventDefault();
        bootbox.dialog({
            title:'<h4 style="color:#FFFFFF">VISTA PREVIA</h4>',
            message:'<div class="row">'+
                        '<div class="col-md-12">'+
                        '<img src="'+base_url+'assets/img/fondos/'+img+'" style="width:380px; height:220px;">'+
                        '</div>'+
                    '</div>',
            size:'small',
            buttons:{
                aceptar:{
                    label:'Cerrar',
                    className:'back-sigcamara'
                }
            }
        });
    });
    
    $('.estado_fondo').click( function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var estado = $(this).attr('data-estado');
        if(confirm("¿DESEA AGREGAR ESTA IMAGEN PARA FONDO?")){
            $.ajax({
                url: base_url+'Sections/Fondos/Fondo_estados',
                type: 'POST',
                dataType: 'json',
                data:{
                    estado:estado,
                    id:id
                }, beforeSend: function () {
                    msj_loading();
                }, success: function (data) {
                    if(data.accion === '1'){
                        ActionWindowsReload();
                    }
                }, error: function (e) {
                    e.preventDefault();
                }
            });
        }
    });
    
    $('.eliminar_img_fondo').on('click', function(e){
        var id = $(this).attr('data-id');
        e.preventDefault();
        if(confirm("¿DESEA ELIMINAR ESTA IMAGEN DE FONDO PERMANENTEMENTE?")){
            $.ajax({
                url: base_url+'Sections/Fondos/Eliminar_fondo',
                type: 'POST',
                dataType: 'json',
                data:{
                id:id
                }, beforeSend: function (xhr) {
                    msj_loading();
                }, success: function (data) {
                    if(data.accion === '1'){
                        ActionWindowsReload();
                    }
                }, error: function (e) {
                    e.preventDefault();
                }
            });
        }
    });
});

