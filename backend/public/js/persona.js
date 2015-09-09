//los divs que mostraran los mensajes pero estan ocultos
$("#successPersonaEmpresa").css("display", "none");
$("#errorPersonaEmpresa").css("display", "none");
$("#errorPersonaEmpresaConsulta").css("display", "none");
////////////////////////////////////////////////////////////////////////////////

//insert de las personas
$("#btn_guardar_persona_empresa").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url = $("#form_guardar_persona_empresa").attr('action');
    parameters.data = $("#form_guardar_persona_empresa").serialize();

    load_ajax(parameters, function(response) {

        var message_error = "";
        var message_success = "";

        if (response.errors != undefined) {
            $.each(response.errors, function(key, value) {
                message_error += "<strong>" + value + "</strong><br />";
            });
            $("#successPersonaEmpresa").hide("slow");
            $("#errorPersonaEmpresa").html(message_error);
            $("#errorPersonaEmpresa").slideDown("slow");

        } else if (response.register != undefined) {
            $("#errorPersonaEmpresa").hide("slow");
            message_success = "Registro realizado correctamente";
            $("#successPersonaEmpresa").html("<strong>" + message_success + "</strong>");
            $("#successPersonaEmpresa").slideDown("slow");

        } else if (response.modify != undefined) {
            $("#errorPersonaEmpresa").hide("slow");
            message_success = "Modificación realizada correctamente";
            $("#successPersonaEmpresa").html("<strong>" + message_success + "</strong>");
            $("#successPersonaEmpresa").slideDown("slow");
        }
    });
});
/////////////////////////////////////////////////////////////////////////////////////////////////////

//Para consultar una persona o empresa
$("#btn_consultar_persona_empresa").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url = $("#form_consultar_persona_empresa").attr('action');
    parameters.data = $("#form_consultar_persona_empresa").serialize();

    load_ajax(parameters, function(response) {

        var columnas;
        var message_error = "";

        if (response.length > 0) {
            $.each(response, function(key, value) {
                columnas += "<tr>";

                columnas += "<td class='hidden'>" + value.Id_Personas_Involucradas + "</td>";
                
                columnas += "<td>" + value.Nombre + "</td>";
                columnas += "<td>" + value.Email + "</td>";
                columnas += "<td>" + value.Direccion + "</td>";
                columnas += "<td>" + value.Celular + "</td>";
                columnas += "<td>" + value.Telefono_Fijo + "</td>";
                columnas += "<td>" + value.Tipo + "</td>";
                columnas += "<td>" + value.Estado + "</td>";

                columnas += "<td> <a href='javascript:void(0);' class='modificar_persona'><span class='glyphicon glyphicon-edit'></span></a></td>";
                columnas += "</tr>";
            });
            $("#errorPersonaEmpresaConsulta").hide("slow");
            $("#tabla_personas tbody").html(columnas);
            $("#tabla_personas").css('display', 'block');
        } else {
            message_error = "No se encontraron resultados";
            $("#tabla_personas").hide("slow");
            $("#tabla_personas tbody").html('');
            $("#errorPersonaEmpresaConsulta").html("<strong>" + message_error + "</strong>");
            $("#errorPersonaEmpresaConsulta").slideDown("slow");
        }
    });
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Para mapear y poder modificar las personas
$(document).on('click', '#tabla_personas .modificar_persona', function() {
    var form = $("#form_guardar_persona_empresa");
    var tr = $(this).parents('tr').find('td');

    $(form[0][0]).val(tr.eq(0).html());
    $(form[0][1]).val(tr.eq(1).html());
    $(form[0][2]).val(tr.eq(2).html());
    $(form[0][3]).val(tr.eq(3).html());
    $(form[0][4]).val(tr.eq(4).html());
    $(form[0][5]).val(tr.eq(5).html());
    $(form[0][6]).val(tr.eq(6).html());
    $(form[0][7]).val(tr.eq(7).html());

});
