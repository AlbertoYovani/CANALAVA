$(document).ready(function(){
    $('.select2').select2();
    $('.select3').select2();
    $('.select4').select2();
    $('.select5').select2();
    
    $('#usuario_sexo').val($('#usuario_sexo').attr('data-value')).select2();
    $('#rol_nombre').val($('#rol_nombre').attr('data-value')).select2();
    $('#sub_rol_nombre').val($('#sub_rol_nombre').attr('data-value')).select2();
    
    $('.date').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    
    $('.btn-cambiar-perfil').click(function (e) {
        AbrirDocumento(base_url+'Sections/Usuarios/ElegirPerfil');
    });
    
    $("#rol_nombre").click(function(e){
        var rol_nombre = $('#rol_nombre').val();
        console.log(rol_nombre);
        if(rol_nombre !== ''){
            $.ajax({
                  url: base_url+"Sections/Usuarios/Ajax_sub_roles",
                  type: 'POST',
                  dataType: 'json',
                  data:{
                      rol_nombre:rol_nombre
                  },beforeSend: function () {
                      msj_loading();
                  },success: function (data) {
                          bootbox.hideAll();
                          $('#sub_rol_nombre').removeAttr('disabled');
                          $('#sub_rol_nombre').html(data.sub_roles);
                  },error: function (e) {
                      console.log(e);
                  }
            });
        }
    });
    
    $("div#myId").dropzone({ url: "/assets" });
    
    $('.guardar_usuario').submit(function(e){
        var pass = $('body input[name=usuario_pass]').val();
        var conf_pass = $('body input[name=usuario_pass_con]').val();
        if(pass === conf_pass){
            $.ajax({
                url: base_url+"Sections/Usuarios/Ajax_guardar_usuario",
                type: 'POST',
                dataType: 'json',
                data:$(this).serialize()
                ,beforeSend: function () {
                    msj_loading();
                },success: function (data) {
                    if(data.accion === '1'){ 
                        location.href = base_url+"Sections/Usuarios";
                    }
                },error: function (e) {
                    console.log(e);
                }
            });
        }else{
            e.preventDefault();
            $('body input[name=usuario_pass]').val('');
            $('body input[name=usuario_pass_con]').val('');
            msj_error_noti("¡Las contraseñas no coinciden!");
        }
    });
    
    $('.guardar_edicion_perfil').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: base_url+"Sections/Usuarios/UpdateCuenta",
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize()
            ,beforeSend: function () {
                msj_loading();
            },success: function (data) {
                if(data.accion === '1'){ 
                    location.href = base_url+"Inicio";
                }
            },error: function (e) {
                console.log(e);
            }
        });
    });
    
    $('.guardar_img_perfil').submit(function (e){
        e.preventDefault();
        if($('#imageUpload').val() !== ''){
            $.ajax({
                url:base_url+'Sections/Usuarios/Ajax_guardar_MiPerfil',
                type:'POST',
                dataType:'json',
                data:$(this).serialize()
                , beforeSend: function () {
                    msj_loading();
                }, success: function (data) {
                    if(data.accion === '1'){
                        ActionCloseWindowsReload();
                    }else{
                        msj_error_noti("¡UPS! OCURRIO UN ERROR");
                    }
                }
            });
        }else{
            alert("¡CONFIRME LA ELECCIÓN DE SU PERFIL EN LA PALOMITA DE LA DERECHA!");
        }
    });
    
    $('.guardar_nuevo_archivo').submit( function(e){
        e.preventDefault();
        var formData=new FormData($(this)[0]);
        $.ajax({
            url: base_url+"Comision/Usuarios/AddArchivo",
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            mimeType: 'multipart/form-data'
            ,beforeSend: function () {
                msj_loading();
            },success: function (data) {
                if(data.accion === '1'){
                    msj_success_noti("REGISTRO GUARDADO CORRECTAMENTE");
                    opener.location.reload();
                    window.close();
                }
            },error: function (e) {
                console.log(e);
            }
        });
    });
    
    $('.eliminar_usuario').click( function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        if(confirm("¿DESEA ELIMINAR ESTE USUARIO Y TODAS SUS DEPENDENCIAS?")){
            $.ajax({
                url: base_url+"Sections/Usuarios/Ajax_eliminar_usuario",
                type: 'POST',
                dataType: 'json',
                data: {
                   id:id
                },beforeSend: function () {
                    msj_loading();
                },success: function (data) {
                    if(data.accion === '1'){
                        msj_error_noti("REGISTRO BORRADO CORRECTAMENTE");
                        location.reload();
                    }
                },error: function (e) {
                    console.log(e);
                }
            });
        }
    });
});