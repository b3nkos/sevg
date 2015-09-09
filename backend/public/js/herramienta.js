//los mensajes del formulario utensilios
$("#successHerramienta").css("display", "none");
$("#errorHerramienta").css("display", "none");
$("#errorHerramientaConsulta").css("display", "none");
///////////////////////////////////////////

//insert de los herramientas
$("#btn_guardar_herramienta").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url = $("#form_guardar_herramienta").attr("action");
    parameters.data = $("#form_guardar_herramienta").serialize();

    load_ajax(parameters, function(response) {

        var message_error = "";
        var message_success = "";

        if (response.errors != undefined) {
            $.each(response.errors, function(key, value) {
                message_error += "<strong>" + value + "</strong><br />";
            });
            $("#successHerramienta").hide("slow");
            $("#errorHerramienta").html(message_error);
            $("#errorHerramienta").slideDown("slow");

        } else if (response.register != undefined) {
            $("#errorHerramienta").hide("slow");
            message_success = "Registro realizado correctamente";
            $("#successHerramienta").html("<strong>" + message_success + "</strong>");
            $("#successHerramienta").slideDown("slow");

        } else if (response.modify != undefined) {
            $("#errorHerramienta").hide("slow");
            message_success = "Modificación realizada correctamente";
            $("#successHerramienta").html("<strong>" + message_success + "</strong>");
            $("#successHerramienta").slideDown("slow");
        }

    });
});
//////////////////////////////////////////////////////////////////////////////////////////////
$("#btn_consultar_herramienta").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url = $("#form_consultar_herramienta").attr('action');
    parameters.data = $("#form_consultar_herramienta").serialize();

    load_ajax(parameters, function(response) {

        var columnas;
        var message_error = "";

        if (response.length > 0) {
            $.each(response, function(key, value) {
                columnas += "<tr>";

                columnas += "<td class='hidden'>" + value.Id_Herramienta + "</td>";

                columnas += "<td>" + value.Nombre + "</td>";
                columnas += "<td>" + value.Codigo + "</td>";
                columnas += "<td>" + value.Estado + "</td>";

                columnas += "<td> <a href='javascript:void(0);' class='modificar_herramienta'><span class='glyphicon glyphicon-edit'></span></a></td>";
                columnas += "</tr>";
            });
            $("#errorHerramientaConsulta").hide("slow");
            $("#tabla_herramientas tbody").html(columnas);
            $("#tabla_herramientas").css('display', 'block');
        } else {
            message_error = "No se encontraron resultados";
            $("#tabla_herramientas").hide("slow");
            $("#tabla_herramientas tbody").html('');
            $("#errorHerramientaConsulta").html("<strong>" + message_error + "</strong>");
            $("#errorHerramientaConsulta").slideDown("slow");
        }
    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Para mapear y poder modificar un medicamento
$(document).on('click', '#tabla_herramientas .modificar_herramienta', function() {
    var form = $("#form_guardar_herramienta");
    var tr = $(this).parents('tr').find('td');

    $(form[0][0]).val(tr.eq(0).html());
    $(form[0][1]).val(tr.eq(1).html());
    $(form[0][2]).val(tr.eq(2).html());
    $(form[0][3]).val(tr.eq(3).html());

});