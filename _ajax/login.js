function login() {
    $("#loginform").on("submit", function(e) {
        e.preventDefault();
        var parametros = $(this).serialize();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            datatype: "json",
            data: parametros,
            success: function(datos) {
                if (datos == "1") {
                    $(location).attr('href', '/Dashboard');
                    
                } else if(datos=="2") {
                    $(location).attr('href', '/Login/monitordash');
                }
                else if(datos=="3") {
                    $(location).attr('href', '/Login/monitorEmpresa');
                }
                else{
                    msj = "Nick o contraseña erroneos";
                    $("#errorLogin").removeAttr("hidden").html(msj);
                    setTimeout(function() {
                        $("#errorLogin").attr("hidden", true);
                    }, 4000);
                }
            }
        });
    });
};

function enviar_Mail_Soporte() {
    $("#form_support").on("submit", function(e) {
        e.preventDefault();
        var parametros = $(this).serialize();
        console.log(parametros);
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            datatype: "json",
            data: parametros,
            success: function(respuesta) {
                if (respuesta == "1") {
                    alert('mensaje enviado');
                } else {
                    msj = "Nick o contraseña erroneos";
                    //$("#errorLogin").removeAttr("hidden").html(msj);
                    alert(msj);
                }
            }
        });
    });
};

$(document).ready(function() {
    login();
    enviar_Mail_Soporte();
});