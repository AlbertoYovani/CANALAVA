    $(document).ready( function(){
        $('.validar').focus();
        $('.validar').keyup(function (e) {
            var nombre = $(this).attr("data-nombre");
            alert(nombre);
        }); 
    });
    
    $('body .fecha').html(fechaActual());
    function fechaActual(){
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
        var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"); 
        var f=new Date(); 
        return diasSemana[f.getDay()] + " " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear();
    }
    
    setInterval(function() {
        var seconds = new Date().getSeconds();
        $('.segundo').html((seconds < 10 ? "0" : "") + seconds);
    }, 1000);
    setInterval(function() {
        var minutes = new Date().getMinutes();
        $('.minuto').html((minutes < 10 ? "0" : "") + minutes);
    }, 1000);
    setInterval(function() {
        var hours = new Date().getHours();
        $('.hora').html((hours < 10 ? "0" : "") + hours);
    }, 1000);

    var msj_loading=function () {
        bootbox.dialog({
            title:'<h4 style="color:#FFFFFF;">Espere por favor...</h4>',
            message:'<div class="row">'+
                        '<div class="col-md-12">'+
                            '<center><i class="fa fa-spinner fa-pulse fa-3x"></i></center>'+
                        '<div>'+
                    '</div>',
            size:'small'
        });
    };
    
    var progressMessage=function(){
	var i = 0;
            Messenger().run({
              errorMessage: 'Espero por favor...',
              successMessage: 'Proceso realizado exitosamente!',
              action: function(opts) {
                if (++i < 3) {
                  return opts.error({
                    status: 500,
                    readyState: 0,
                    responseText: 0
                  });
                } else {
                  return opts.success();
                }
              }
            });
        }
    
    var msj_error_noti=function (msj){
        Messenger().post({
            message: msj,
            type: 'error',
            showCloseButton: true
        }); 
    };
    var msj_error_serve=function (error){
        Messenger().post({
            message: 'Error al procesar la petición al servidor ',
            type: 'error',
            showCloseButton: true
        }); 
        (error===undefined ? '' :  console.log(error));
    };
    var  msj_success_noti=function (msj){
        Messenger().post({
            message: msj,
            showCloseButton: true
        }); 
    };
    $('.tip').tooltip();

    $('body #retrievingfilename').html5imageupload({
        onAfterProcessImage: function() {
            $('body #imageUpload').val($(this.element).data('name'));
        },onAfterCancel: function() {
            $('body #imageUpload').val('');
        }
    });

    var AbrirDocumento=function(url){
        coordx= screen.width ? (screen.width-200)/2 : 0; 
        coordy= screen.height ? (screen.height-150)/2 : 0; 
        window.open(url,'Documento','width=700,height=600,top=30,right='+coordx+',left='+coordy);
    };
    $('.footable').footable();
    
    var ActionCloseWindows=function () {
        setTimeout(function () {
            window.top.close();
        },1000);
    };
    var ActionCloseWindowsReload=function () {
        setTimeout(function () {
            window.opener.location.reload();
            window.top.close();
        },1000);
    };

    var ActionWindowsReload=function () {
        setTimeout(function () {
            location.reload();
        },1000);
    };
    
    var InicializeFootable=function (table) {
    $('body '+table).footable()
        .trigger('footable_redraw')
        .trigger('footable_resize');
    };
    $('.footable').footable();

    var _SendAjax=function (data,url,response,msj) {
        $.ajax({
            url: base_url+url,
            type: 'POST',
            dataType: 'json',
            data:data,
            beforeSend: function (xhr) {
                if(msj=='Si'){
                    msj_loading();
                }
            },success: function (data, textStatus, jqXHR) {
                bootbox.hideAll();
                response(data);
            },error: function (e) {
                msj_error_serve(e);
                bootbox.hideAll();
                console.log(e);
            }
        });
    };
    $('.fecha-calendar,.fecha_calendar').datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd',
        todayHighlight: true
    });
    $('.dd-mm-yyyy').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });
    $('.dp-yyyy-mm-dd').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true
    });
    $('.d-m-y').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
    });
    $('body .clockpicker').clockpicker({
        placement: 'top',
        autoclose: true
    });
    $('.clockpicker-bottom').clockpicker({
        placement: 'bottom',
        autoclose: true
    });
    var _geocodeAddress=function(geocoder, estado, municipio,callback) {
        var direccion = estado+", "+municipio;
        var response=[];
        var output = Array()
        geocoder.geocode({'address': direccion}, function(results, status) {
            if (status === 'OK') {
                var marker = new google.maps.Marker({
                    position: results[0].geometry.location
                });
                var posicion = marker.position+"";
                posicion = posicion.replace("(","");
                posicion = posicion.replace(")","");
                var longitud = posicion.split(",", 2);
                callback({
                    status:'ok',
                    lat:longitud[0],
                    lng:longitud[1]
                })
            } else {
                callback({
                    status:'error',
                    msj:'Geocode no tuvo éxito por la siguiente razón: ' + status
                })
            }
        });
        //return JSON.stringify(output) ;
    }
    
    
    
    