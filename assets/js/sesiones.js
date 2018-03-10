$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: base_url+"Sections/Login/ChecarSesion",
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize(),
            beforeSend: function () {
                
            },success: function (data) {
                if(data.accion === '1'){
                    location.href = base_url+"Sections/Login";
                }
            },error: function (e) {
                console.log(e);
            }
        });
    }, 2000);
});


