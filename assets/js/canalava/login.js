/* Webarch Admin Dashboard 
-----------------------------------------------------------------*/ 
$(document).ready(function() {
    $('.select2').select2();
    $('.form-login').submit( function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url+"Sections/Login/ValidarUsuario",
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize(),
            beforeSend: function () {
                msj_loading();
            },success: function (data) {
                if(data.accion === '2'){
                    msj_error_noti("El usuario no existe!");
                    bootbox.hideAll();
                }else if(data.accion === '3'){
                    msj_error_noti("La contraseña no existe!");
                    bootbox.hideAll();
                }else if(data.accion === '4'){
                    msj_error_noti("El usuario y la contraseña no coinciden!");
                    bootbox.hideAll();
                }else if(data.accion === '1'){
                    location.href = base_url+"Inicio";
                }
            },error: function (e) {
                console.log(e);
            }
        });
    }); 
    $('.form-recovery-password').submit(function (e) {
        e.preventDefault();
        _SendAjax($(this).serialize(),'Sections/Login/AjaxCheckEmail',function (response) {
            console.log(response);
            if(response.accion=='1'){
                $('.form-recovery-password').addClass('hide');
                $('.end-send-mail').removeClass('hide');
            }else if(response.accion=='2'){
                msj_error_noti('EL EMAIL ASOCIADO AL USUARIO NO COINCIDEN POR FAVOR VUELVA A INTENTARLO');
            }else if(response.accion=='3'){
                msj_error_noti('LO SENTIMOS HA OCURRIDO UN ERROR AL ENVIAR EL ENLACE DE RECUPERACIÓN DE CONTRASEÑA POR FAVOR VUELVA A INTENTARLO MAS TARDE')
            }
        },'Si');
    });
});