/* Webarch Admin Dashboard 
/* This JS is only for DEMO Purposes - Extract the code that you need
-----------------------------------------------------------------*/ 
$(document).ready(function() {	
    if($('#jerarquiaArchivos').val() === 'jerarquia'){
        var camara = $("#id_camara").val();
       var updateOutput = function(e) {
           var list   = e.length ? e : $(e.target), output = list.data('output');
           if (window.JSON) {
               output.html(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
               var json = window.JSON.stringify(list.nestable('serialize'));
               var types = JSON.parse(json);
               
               var id_json = 0;
                for (var item in types) {
                    id_json = id_json+", "+(types[item].id);
                }
                console.log("Desordenado: "+id_json);
                $("#id_puestos").val(id_json);
           } else {
               output.html('JSON browser support required for this demo.');
           }
       };
       // activate Nestable for list 1
       $('#nestable').nestable({
           group: 1
       }).on('change', updateOutput);

       // output initial serialised data
       updateOutput($('#nestable').data('output', $('#nestable-output')));
    }
    
    $('#nestable').on('change', function () {
        setInterval( function (){
            var camara = $("#id_camara").val();
            var id_json = $("#id_puestos").val();
            $.ajax({
                url: "Camaras/ReordernarJerarquia",
                type: 'POST',
                dataType: "json",
                data: {
                    puestos: id_json,
                    camara:camara
                }, beforeSend: function () {

                }, success: function (data) {
                    if(data.accion === '1') {
                        location.reload();
                    }
                }, error: function (e) {
                    e.preventDefault();
                    console.log(e);
                }
            });
        }, 500);
    });
});