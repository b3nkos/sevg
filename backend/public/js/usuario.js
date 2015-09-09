//los mensajes del formulario usuario
$("#successUsuario").css("display", "none");
$("#errorUsuario").css("display", "none");
$("#errorUsuarioConsulta").css("display", "none");

//Insert para los usuarios////////////////////////////////////////////////////////////////////////////////////////////
$("#btn_guardar_usuario").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url = $("#form_guardar_usuario").attr("action");
    parameters.data = $("#form_guardar_usuario").serialize();

    load_ajax(parameters, function(response) {
        var message_error   = "";
        var message_success = "";

        if (response.errors ) {
            $.each(response.errors, function(key, value) {
                message_error += "<strong>" + value + "</strong><br />";
            });
            $("#errorUsuario").html(message_error);
            $("#errorUsuario").slideDown("slow");
        } else if (response.register) {
            $("#errorUsuario").hide("slow");
            message_success = "Registro realizado correctamente";
            $("#successUsuario").html("<strong>" + message_success + "</strong>");
            $("#successUsuario").slideDown("slow");
        } else if (response.modify) {
            $("#errorUsuario").hide("slow");
            message_success = "Modificación realizada correctamente";
            $("#successUsuario").html("<strong>" + message_success + "</strong>");
            $("#successUsuario").slideDown("slow");
        }

    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////////

//Consulta de los usuarios
$("#btn_consultar_usuario").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url  = $("#form_consultar_usuario").attr('action');
    parameters.data = $("#form_consultar_usuario").serialize();

    $("#form_guardar_usuario").each(function() { this.reset(); });   
//Aqui es donde se ve que esta devolviendo un objeto vacio
    load_ajax(parameters, function(response) {
        var columnas, message_error = "";

        if (response.error) {
            $("#tabla_usuarios").hide("slow");
/*            $("#tabla_usuarios tbody").html(columnas);
            $("#tabla_usuarios").css('display', 'block');*/
            message_error = "No se encontraron resultados";
/*            
            $("#tabla_usuarios tbody").html('');*/
            $("#errorUsuarioConsulta").html("<strong>" + message_error + "</strong>");
            $("#errorUsuarioConsulta").slideDown("slow");
        } else {
            $.each(response, function(key, value) {
                columnas += "<tr>";
                /*columnas += "<td class='hidden'>" + value.Id_Usuario + "</td>";*/
                columnas += "<td>" + value.Identificacion + "</td>";
                columnas += "<td>" + value.Nombres + "</td>";
                columnas += "<td>" + value.Apellidos + "</td>";
                columnas += "<td class='hidden'>" + value.Direccion + "</td>";
                columnas += "<td>" + value.Telefono + "</td>";
                columnas += "<td>" + value.Celular + "</td>";
                columnas += "<td>" + value.Email + "</td>";
                columnas += "<td class='text-center'><a href='javascript:void(0);' class='get-profiles' data-id='"+value.Id_Usuario+"'>";
                columnas += "<span class='glyphicon glyphicon-refresh'></span></a></td>";
                columnas += "<td class='text-center'> <a href='javascript:void(0);' data-id='" + value.Id_Usuario+"'";
                columnas += " class='reset-password' title='Restablecer contraseña'><span class='glyphicon glyphicon-repeat'></span></a></td>";
                columnas += "<td class='text-center'> <a href='javascript:void(0);' data-id='" + value.Id_Usuario;
                columnas += "' class='modificar_usuario' title='Modificar usuario'><span class='glyphicon glyphicon-edit'></span></a></td>";
                columnas += "</tr>";
            });

            $("#errorUsuarioConsulta").hide("slow");
            $("#tabla_usuarios tbody").html(columnas);
            $("#tabla_usuarios").css('display', 'block');
        }
    });
});

$(document).on('click', '.modificar_usuario', function(event) {

    'use strict';
    event.preventDefault();
    var form = $("#form_consultar_usuario")
    , parameters = {}
    , form_ = $("#form_guardar_usuario")
    ,checks = form_.find("input:checkbox");

    parameters.url  = form.attr('action');
    parameters.data = {user_id: $(this).attr('data-id')};

    load_ajax(parameters, function(response) {
        debugger;

        form_.find('input#id_usuario').val(response[0][0].Id_Usuario);
        form_.find('input#identificacion').val(response[0][0].Identificacion);
        form_.find('input#nombres').val(response[0][0].Nombres);
        form_.find('input#apellidos').val(response[0][0].Apellidos);
        form_.find('input#direccion').val(response[0][0].Direccion);
        form_.find('input#telefono').val(response[0][0].Telefono);
        form_.find('input#celular').val(response[0][0].Celular);
        form_.find('input#barrio').val(response[0][0].Barrio);
        form_.find('input#email').val(response[0][0].Email);
        form_.find('select#estado_cuenta').val(response[0][0].Estado);
        form_.find('select#tipo_cuenta').val(response[0][0].Tipo);

        response[1].forEach(function(value) {

            checks.each(function(){
                if(value.Id == $(this).val() ){
                    this.checked = true;
                }
            });
        });
    });

});

$("#tabla_usuarios").on('click', '.reset-password', function(event) {

    'use strict';
    event.preventDefault();
    var form = $("#form_consultar_usuario")
    ,parameters = {}
    ,message;

    parameters.url  = form.attr('data-url-reset-password');
    parameters.data = {user_id: $(this).attr('data-id')};

    load_ajax(parameters, function (response) {

        if( response ) {
            $("#errorUsuario").hide("slow");
            message = "contraseña restablecida correctamente";
            $("#successUsuario").html("<strong>" + message + "</strong>");
            $("#successUsuario").slideDown("slow");
        } else {
            $("#successUsuario").hide("slow");
            message = "Error en restablecer contraseña";
            $("#errorUsuario").html("<strong>" + message + "</strong>");
            $("#errorUsuario").slideDown("slow");
        }
    });
});

$("#tabla_usuarios").on('click', '.get-profiles', function(event) {

    'use strict';
    event.preventDefault();
    var form = $("#form_consultar_usuario")
    ,parameters = {}
    ,profiles = ""
    ,self = $(this);

    parameters.url  = form.attr('data-url-profiles');
    parameters.data = {user_id: $(this).attr('data-id')};

    load_ajax(parameters, function (response) {

        response.forEach(function(val){
            profiles += val.Nombre + " - ";
        });

        profiles = profiles.substring(0, profiles.length - 3);
        self.parent().html(profiles);        

    });

});