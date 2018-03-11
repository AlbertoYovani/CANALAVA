$(document).ready(function() {
    
    $('#source').val($('#source').attr('data-value')).select2();
    
    $('.nueva_comision').submit( function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url+"Comision/AddComision",
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize(),
            beforeSend: function () {
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
    
    $('.nuevo_afiliado').submit( function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url+"Camaras/Afiliados/AddAfiliado",
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize(),
            beforeSend: function () {
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
    
    $('.nuevo_promotor').submit( function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url+"Camaras/Promotores/AddPromotor",
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize(),
            beforeSend: function () {
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
    
    $('.guardar-usuario').submit( function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url+"Comision/Usuarios/AddUsuario",
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize(),
            beforeSend: function () {
                msj_loading();
            },success: function (data) {
                if(data.accion === '1'){
                    msj_success_noti("REGISTRO GUARDADO CORRECTAMENTE");
                    location.href = base_url;
                }
            },error: function (e) {
                console.log(e);
            }
        });
    });
    
    $('.acreditar').click( function (e) {
        var id = $(this).attr("data-id");
        var camara = $(this).attr("data-camara");
        e.preventDefault();
        bootbox.dialog({
            title:'<h5 style="color:#FFFFFF">¿QUÉ FORMA DE PAGO DESEA REALIZAR?</h5>',
            message:'<div class="row">'+
                        '<div class="col-md-12">'+
                            '<div class="col-md-6">'+
                                '<div class="radio radio-success">'+
                                  '<input id="yes" type="radio" name="tipo_pago" value="exhibicion">'+
                                  '<label for="yes">Exhibición</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="radio radio-success">'+
                                  '<input id="no" type="radio" name="tipo_pago" value="parcialidades">'+
                                  '<label for="no">Parcialidades</label>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>',
            size:'small',
            buttons:{
                aceptar:{
                    label:'ACEPTAR',
                    className:'back-sigcamara',
                    callback:function () {
                        if($('input:radio[name=tipo_pago]:checked').val() == 'parcialidades'){
                            window.open(base_url+"Inicio/Pagos?camara="+camara+"&afiliado="+id, "_target");
                        }else {
                            location.href = base_url+"Inicio/";
                        }
                    }
                }
            }
        });
    });
    
    $('.cambiar-perfil').click(function(e) {
        var id = $(this).attr("data-id");
        var url = base_url+"Inicio/MiPerfil?usuario="+id;
        AbrirDocumento(url);
    });
    
    $('.guardar-img-perfil').submit( function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url+"Inicio/CambiarPerfil",
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize(),
            beforeSend: function () {
                msj_loading();
            },success: function (data) {
                if(data.accion === '1'){
                    msj_success_noti("REGISTRO GUARDADO CORRECTAMENTE");
                    opener.location.reload();
                    window.close();
                    opener.location.reload();
                }
            },error: function (e) {
                console.log(e);
            }
        });
    });
    
    $('.modificar-cuenta').submit( function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url+"Inicio/UpdateCuenta",
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize(),
            beforeSend: function () {
                msj_loading();
            },success: function (data) {
                bootbox.hideAll();
                alert("POR FAVOR, INICIE SESIÓN DE NUEVO");
                if(data.accion === '1'){
                    msj_success_noti("REGISTRO GUARDADO CORRECTAMENTE");
                    location.href = base_url+"Sections/Login";
                }
            },error: function (e) {
                console.log(e);
            }
        });
    });
    
    $('.pagos-pendientes').click(function() {
        var id = $(this).attr("data-id");
        var camara = $(this).attr("data-camara");
        window.open(base_url+"Inicio/Pagos?camara="+camara+"&afiliado="+id, "_target");
    });
    
    $('input[name=show_password]').click(function (e) {
        if($(this).is(':checked')){
            $('input[name=password_usuario]').prop('type','text');
        }else{
            $('input[name=password_usuario]').prop('type','password');
        }
    });
    
    $('input[name=curp]').click(function (e) {
        if($('input:radio[name=curp]:checked').val() === 'si'){
            $("#con_curp").removeClass('hidden');
            $("#sin_curp").addClass('hidden');
        }else if($('input:radio[name=curp]:checked').val() === 'no'){
            $("#con_curp").addClass('hidden');
            $("#sin_curp").removeClass('hidden');
        }else{
            $("#con_curp").removeClass('hidden');
        }
    });
    
    $('.ver-contacto').click( function (e) {
        var nombre = $(this).attr("data-nombre");
        var telefono = $(this).attr("data-telefono");
        var email = $(this).attr("data-email");
        var empresa = $(this).attr("data-empresa");
        var cargo = $(this).attr("data-cargo");
        var asistente = $(this).attr("data-asistente");
        e.preventDefault();
        bootbox.dialog({
            title:'<h5 style="color:#FFFFFF">Datos de contacto</h5>',
            message:'<div class="row">'+
                        '<div class="col-md-12">'+
                            '<div class="form-group">'+
                                'Nombre: <label class="form-label">'+nombre+'</label><br>'+
                                'Cargo: <label class="form-label">'+cargo+'</label><br>'+
                                'Empresa: <label class="form-label">'+empresa+'</label><br>'+
                                'Telefono (s): <label class="form-label">'+telefono+'</label><br>'+
                                'Email (s): <label class="form-label" style="color:#318EFD;">'+email+'</label><br>'+
                                'Asistente: <label class="form-label">'+asistente+'</label><br>'+
                            '</div>'+
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
});


