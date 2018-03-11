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
        _SendAjax($(this).serialize(),'Sections/Mailer/SendMail',function (response) {
            console.log(response);
            if(response.accion=='2'){
                msj_error_noti('EL CORREO Y/O USUARIO NO SON CORRECTOS');
            }else if(response.accion=='3'){
                msj_error_noti('LO SENTIMOS HA OCURRIDO UN ERROR AL ENVIAR EL ENLACE DE RECUPERACIÓN DE CONTRASEÑA POR FAVOR VUELVA A INTENTARLO MAS TARDE')
            }else if(response.accion=='3'){
                msj_success_noti('¡ENLACE ENVIADO EXITOSAMENTE!');
            }
        },'Si');
    });
    $('.form_new_recovery_password').submit(function (e) {
        e.preventDefault();
        var pass = $("input[name=new_password]").val();
        var conf_pass = $("input[name=confirm_password]").val();
        if(pass === conf_pass){
            e.preventDefault();
            _SendAjax($(this).serialize(),'Sections/Usuarios/UserNewPassword',function (response) {
                console.log(response);
                if(response.accion==='1'){
                    _SendAjax($(this).serialize(),'Sections/Mailer/ConfirmacionCambio',function (response) {
                        console.log(response);
                        if(response.accion=='2'){
                            msj_error_noti('EL CORREO Y/O USUARIO NO SON CORRECTOS');
                        }else if(response.accion=='3'){
                            msj_error_noti('LO SENTIMOS HA OCURRIDO UN ERROR AL ENVIAR EL ENLACE DE RECUPERACIÓN DE CONTRASEÑA POR FAVOR VUELVA A INTENTARLO MAS TARDE')
                        }else if(response.accion=='3'){
                            msj_success_noti('¡LISTO!');
                        }
                    },'Si');
                    msj_success_noti("CONTRASEÑA GUARDADA EXITOSAMENTE");
                    location.href = base_url+"Sections/Login";
                }
            },'Si');
        }else{
            alert("¡LAS CONTRASEÑAS NO COINCIDEN!");
            $("input[name=new_password]").val('');
            $("input[name=confirm_password]").val('');
        }
    });
});