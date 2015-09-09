//los mensajes del formulario mantenimiento
$("#successMantenimiento").css("display", "none");
$("#errorMantenimiento").css("display", "none");
$("#errorMantenimientoConsulta").css("display", "none");
///////////////////////////////////////////

//insert para los mantenimientos
$("#btn_guardar_mantenimiento").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url = $("#form_guardar_mantenimiento").attr("action");
    parameters.data = $("#form_guardar_mantenimiento").serialize();

    load_ajax(parameters, function(response) {

        var message_error = "";
        var message_success = "";

        if (response.errors != undefined) {
            $.each(response.errors, function(key, value) {
                message_error += "<strong>" + value + "</strong><br />";
            });
            $("#successMantenimiento").hide("slow");
            $("#errorMantenimiento").html(message_error);
            $("#errorMantenimiento").slideDown("slow");

        } else if (response.register != undefined) {
            $("#errorMantenimiento").hide("slow");
            message_success = "Registro realizado correctamente";
            $("#successMantenimiento").html("<strong>" + message_success + "</strong>");
            $("#successMantenimiento").slideDown("slow");

        } else if (response.modify != undefined) {
            $("#errorMantenimiento").hide("slow");
            message_success = "Modificación realizada correctamente";
            $("#successMantenimiento").html("<strong>" + message_success + "</strong>");
            $("#successMantenimiento").slideDown("slow");
        }

    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//consultar mantenimientos
$("#btn_consultar_mantenimiento").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url = $("#form_consultar_mantenimiento").attr('action');
    parameters.data = $("#form_consultar_mantenimiento").serialize();

    load_ajax(parameters, function(response) {

        var columnas;
        var message_error = "";

        if (response.length > 0) {
            $.each(response, function(key, value) {
                columnas += "<tr>";

                columnas += "<td class='hidden'>" + value.Id_Herramienta_Mantenimiento + "</td>";
                columnas += "<td class='hidden'>" + value.Id_Herramienta + "</td>";

                columnas += "<td>" + value.Nombre + "</td>";
                columnas += "<td>" + value.Codigo + "</td>";
                columnas += "<td>" + value.Fecha_Mantenimiento + "</td>";
                columnas += "<td>" + value.Proximo_Mantenimiento + "</td>";
                columnas += "<td>" + value.Detalle + "</td>";

                columnas += "<td> <a href='javascript:void(0);' class='modificar_mantenimiento'><span class='glyphicon glyphicon-edit'></span></a></td>";
                columnas += "</tr>";
            });
            $("#errorMantenimientoConsulta").hide("slow");
            $("#tabla_mantenimientos tbody").html(columnas);
            $("#tabla_mantenimientos").css('display', 'block');
        } else {
            message_error = "No se encontraron resultados";
            $("#tabla_mantenimientos").hide("slow");
            $("#tabla_mantenimientos tbody").html('');
            $("#errorMantenimientoConsulta").html("<strong>" + message_error + "</strong>");
            $("#errorMantenimientoConsulta").slideDown("slow");
        }
    });
});
////////////////////////////////////////////////////////////////////////////////////////////////////////

//Para mapear y poder modificar un mantenimiento
$(document).on('click', '#tabla_mantenimientos .modificar_mantenimiento', function() {
    var form = $("#form_guardar_mantenimiento");
    var tr = $(this).parents('tr').find('td');

    $(form[0][0]).val(tr.eq(0).html());
    $(form[0][1]).val(tr.eq(1).html());
    $(form[0][2]).val(tr.eq(4).html());
    $(form[0][3]).val(tr.eq(5).html());
    $(form[0][4]).val(tr.eq(6).html());


});
