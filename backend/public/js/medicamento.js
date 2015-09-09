//los mensajes del formulario medicamento
$("#successMedicamento").css("display", "none");
$("#errorMedicamento").css("display", "none");
$("#errorMedicamentoConsulta").css("display", "none");
/////////////////////////////////////////

//insert para los medicamentos///////////////////////////////////////////////////////////////////////////////////////
$("#btn_guardar_medicamento").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url = $("#form_guardar_medicamento").attr("action");
    parameters.data = $("#form_guardar_medicamento").serialize();

    load_ajax(parameters, function(response) {

        var message_error = "";
        var message_success = "";

        if (response.errors != undefined) {
            $.each(response.errors, function(key, value) {
                message_error += "<strong>" + value + "</strong><br />";
            });
            $("#successMedicamento").hide("slow");
            $("#errorMedicamento").html(message_error);
            $("#errorMedicamento").slideDown("slow");

        } else if (response.register != undefined) {
            $("#errorMedicamento").hide("slow");
            message_success = "Registro realizado correctamente";
            $("#successMedicamento").html("<strong>" + message_success + "</strong>");
            $("#successMedicamento").slideDown("slow");

        } else if (response.modify != undefined) {
            $("#errorMedicamento").hide("slow");
            message_success = "Modificación realizada correctamente";
            $("#successMedicamento").html("<strong>" + message_success + "</strong>");
            $("#successMedicamento").slideDown("slow");
        }

    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//consultar medicamentos
$("#btn_consultar_medicamento").on("click", function(event) {
    event.preventDefault();

    var parameters = new Array();

    parameters.url = $("#form_consultar_medicamento").attr('action');
    parameters.data = $("#form_consultar_medicamento").serialize();

    load_ajax(parameters, function(response) {

        var columnas;
        var message_error = "";

        if (response.length > 0) {
            $.each(response, function(key, value) {
                columnas += "<tr>";

                columnas += "<td class='hidden'>" + value.Id_Medicamento + "</td>";
                columnas += "<td class='hidden'>" + value.Id_Presentacion + "</td>";

                columnas += "<td>" + value.Nombre + "</td>";
                columnas += "<td>" + value.Nombre_Presentacion + "</td>";
                columnas += "<td>" + value.Lote + "</td>";
                columnas += "<td>" + value.Fecha_Vencimiento + "</td>";
                columnas += "<td>" + value.Cantidad + "</td>";
                columnas += "<td>" + value.Estado + "</td>";

                columnas += "<td> <a href='javascript:void(0);' class='modificar_medicamento'><span class='glyphicon glyphicon-edit'></span></a></td>";
                columnas += "</tr>";
            });
            $("#errorMedicamentoConsulta").hide("slow");
            $("#tabla_medicamentos tbody").html(columnas);
            $("#tabla_medicamentos").css('display', 'block');
        } else {
            message_error = "No se encontraron resultados";
            $("#tabla_medicamentos").hide("slow");
            $("#tabla_medicamentos tbody").html('');
            $("#errorMedicamentoConsulta").html("<strong>" + message_error + "</strong>");
            $("#errorMedicamentoConsulta").slideDown("slow");
        }
    });
});
////////////////////////////////////////////////////////////////////////////////////////////////////////

//Para mapear y poder modificar un medicamento
$(document).on('click', '#tabla_medicamentos .modificar_medicamento', function() {
    var form = $("#form_guardar_medicamento");
    var tr = $(this).parents('tr').find('td');

    $(form[0][0]).val(tr.eq(0).html());
    $(form[0][1]).val(tr.eq(1).html());
    $(form[0][2]).val(tr.eq(2).html());
    $(form[0][3]).val(tr.eq(4).html());
    $(form[0][4]).val(tr.eq(5).html());
    $(form[0][5]).val(tr.eq(6).html());
    $(form[0][6]).val(tr.eq(7).html());

});