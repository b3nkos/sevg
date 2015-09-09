$(function() {

    /*Oculta los mensajes de error o exitoso del html*/

    //Tipo de evento
    $("#successTipoEvento").css("display", "none");
    $("#errorTipoEvento").css("display", "none");

    //Carácter de evento
    $("#successCaracterEvento").css("display", "none");
    $("#errorCaracterEvento").css("display", "none");

    //Ingreso al evento
    $("#successIngresoEvento").css("display", "none");
    $("#errorIngresoEvento").css("display", "none");

    //Sistema control de ingreso y aforo
    $("#successSistemaControl").css("display", "none");
    $("#errorSistemaControl").css("display", "none");

    //Caracterizacion del publico que participa
    $("#successCaracterizacionEvento").css("display", "none");
    $("#errorCaracterizacionEvento").css("display", "none");

    //Lugar del evento
    $("#successLugarEvento").css("display", "none");
    $("#errorLugarEvento").css("display", "none");

    //Ubicacion de los asistentes
    $("#successUbicacionAsistente").css("display", "none");
    $("#errorUbicacionAsistente").css("display", "none");

    //Cargo
    $("#successCargo").css("display", "none");
    $("#errorCargo").css("display", "none");

    //Perfil
    $("#successPerfil").css("display", "none");
    $("#errorPerfil").css("display", "none");
    
    //Presentacion
    $("#successPresentacion").css("display", "none");
    $("#errorPresentacion").css("display", "none");

    var configuration = {
        modal_id: null,
        modal_body: null,
        button_save: null,
        register_form: null,
        success_display: null,
        error_display: null,
        data: null,
        url: null,
        response: null,
        message_success: null,
        message_error: "",
        table: null
    };

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //funcion para insertar el tipo de evento
    $("#tipo_evento_modal").on("click", "#btn_guardar_tipo_evento", function(event) {
        event.preventDefault();
        load_configuration($("#tipo_evento_modal"));
        show_message();
    });

    //funcion para insertar el caracter de evento
    $("#caracter_evento_modal").on("click", "#btn_guardar_caracter_evento", function(event) {
        event.preventDefault();
        load_configuration($("#caracter_evento_modal"));
        show_message();
    });

    //funcion para insertar el ingreso al evento
    $("#ingreso_evento_modal").on("click", "#btn_guardar_ingreso_evento", function(event) {
        event.preventDefault();
        load_configuration($("#ingreso_evento_modal"));
        show_message();
    });

    //funcion para insertar el sistema de control ingreso y aforo
    $("#sistema_control_ingreso_aforo_modal").on("click", "#btn_guardar_sistema_control_ingreso_aforo", function(event) {
        event.preventDefault();
        load_configuration($("#sistema_control_ingreso_aforo_modal"));
        show_message();
    });

    //funcion para insertar la caracterizacion del evento
    $("#caracterizacion_publico_participa_modal").on("click", "#btn_guardar_caracterizacion_publico_participa", function(event) {
        event.preventDefault();
        load_configuration($("#caracterizacion_publico_participa_modal"));
        show_message();
    });
    
    //funcion para insertar los lugares del evento
    $("#lugar_evento_modal").on("click", "#btn_guardar_lugar_evento", function(event) {
        event.preventDefault();
        load_configuration($("#lugar_evento_modal"));
        show_message();
    });

    //funcion para insertar la ubicacion de los asistentes
    $("#ubicacion_asistente_modal").on("click", "#btn_guardar_ubicacion_asistente", function(event) {
        event.preventDefault();
        load_configuration($("#ubicacion_asistente_modal"));
        show_message();
    });
    
    //funcion para insertar los cargos
    $("#cargo_modal").on("click", "#btn_guardar_cargo", function(event) {
        event.preventDefault();
        load_configuration($("#cargo_modal"));
        show_message();
    });

    //funcion para insertar los perfiles
    $("#perfil_modal").on("click", "#btn_guardar_perfil", function(event) {
        event.preventDefault();
        load_configuration($("#perfil_modal"));
        show_message();
    });
    
    //funcion para insertar las presentaciones
    $("#presentacion_modal").on("click", "#btn_guardar_presentacion", function(event) {
        event.preventDefault();
        load_configuration($("#presentacion_modal"));
        show_message();
    });
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Para mapear los datos en los formularios y se toman las posiciones en el formulario
//por ejemplo el campo de texto seria igual a [0][0]
    $(document).on('click', '.configuration-edit', function() {
        var parent = $(this).parents('tr');
        var form = $(this).parents('div.modal-body').children('form');

        $(form[0][0]).val(parent.find('td').eq(0).html());
        $(form[0][1]).val(parent.find('td').eq(1).html());
        $(form[0][2]).val(parent.find('td').eq(2).html());
    });

//Para mostrar los mensajes dependiendo del resultado del response
    function show_message() {

        configuration.response = load_ajax(function(response) {
            if (response.errors != undefined) {
                configuration.message_error = "";
                $.each(response.errors, function(key, value) {
                    configuration.message_error += "<strong>" + value + "</strong></br>";
                });
                configuration.error_display().html(configuration.message_error);
                configuration.error_display().slideDown("slow");                
            } else if (response.register != undefined) {
                configuration.error_display().hide();
                configuration.message_success = "Resgistro realizado correctamente";
                configuration.success_display().html("<strong>" + configuration.message_success + "</strong>");
                configuration.success_display().slideDown("slow");
                configuration.success_display().fadeOut(5000);
            } else {
                configuration.error_display().stop(false, true);
                configuration.message_success = "Modificación realizada correctamente";
                configuration.success_display().html("<strong>" + configuration.message_success + "</strong>");
                configuration.success_display().slideDown("slow");
                configuration.success_display().fadeOut(5000);
            }
        });
    };

//Para cargar el objeto con lo que se necesita para mandarlo al ajax
    function load_configuration(modal_id) {
        configuration.modal_id = modal_id;
        configuration.modal_body = function() {
            return this.modal_id.find('.modal-body');
        };
        configuration.register_form = function() {
            return this.modal_body().children('form');
        };
        configuration.url = function() {
            return this.register_form().attr("action");
        };
        configuration.button_save = function() {
            return this.register_form.children('button');
        };
        configuration.success_display = function() {
            return this.modal_body().find("div").eq(2);
        };
        configuration.error_display = function() {
            return this.modal_body().find("div").eq(3);
        };
        configuration.data = {
            id: configuration.register_form().find('input').val(),
            nombre: configuration.register_form().find('div').eq(0).children('input').val(),
            estado: configuration.register_form().find('div').eq(1).children('select').val()
        };
    }

//Para ejecutar el ajax con el objeto previamente cargado
    function load_ajax(callback) {
        $.ajax({
            url: configuration.url(),
            type: 'post',
            async: false,
            cache: false,
            data: configuration.data,
            dataType: 'json'
        }).done(function(response) {
            console.log(response);
            callback(response);
        }).fail(function(error) {
            console.error(error);
        });
    }

//Estos son los botones que llenas las tablas
    $("div.container").find('div.col-md-5').eq(0).find('button').eq(0).on('click', function() {
        load_table($('#tipo_evento_modal'), 'tipo_evento');
    });

    $("div.container").find('div.col-md-5').eq(0).find('button').eq(1).on('click', function() {
        load_table($('#caracter_evento_modal'), 'caracter_evento');
    });

    $("div.container").find('div.col-md-5').eq(0).find('button').eq(2).on('click', function() {
        load_table($('#ingreso_evento_modal'), 'ingreso_evento');
    });

    $("div.container").find('div.col-md-5').eq(0).find('button').eq(3).on('click', function() {
        load_table($('#sistema_control_ingreso_aforo_modal'), 'sistema_control_ingreso_aforo');
    });

    $("div.container").find('div.col-md-5').eq(0).find('button').eq(4).on('click', function() {
        load_table($('#caracterizacion_publico_participa_modal'), 'caracterizacion_publico_participa');
    });

    $("div.container").find('div.col-md-5').eq(1).find('button').eq(0).on('click', function() {
        load_table($('#lugar_evento_modal'), 'lugar_evento');
    });

    $("div.container").find('div.col-md-5').eq(1).find('button').eq(1).on('click', function() {
        load_table($('#ubicacion_asistente_modal'), 'ubicacion_asistente');
    });

    $("div.container").find('div.col-md-5').eq(1).find('button').eq(2).on('click', function() {
        load_table($('#cargo_modal'), 'cargo');
    });

    $("div.container").find('div.col-md-5').eq(1).find('button').eq(3).on('click', function() {
        load_table($('#perfil_modal'), 'perfil');
    });
    
    $("div.container").find('div.col-md-5').eq(1).find('button').eq(4).on('click', function() {
        load_table($('#presentacion_modal'), 'presentacion');
    });

    function load_table(modal, table_name) {
        configuration.table = modal.find('table');
        configuration.response = "";
        configuration.url = function() {
            return this.table.attr("data-url");
        };
        configuration.data = {table: table_name};

        load_ajax(function(response) {
            $.each(response, function(key, value) {
                configuration.response += "<tr>";
                configuration.response += "<td>" + value[0] + "</td>";
                configuration.response += "<td>" + value[1] + "</td>";
                configuration.response += "<td>" + value[2] + "</td>";
                configuration.response += "<td><a href='javascript:void(0);'>";
                configuration.response += "<span class='glyphicon glyphicon-edit configuration-edit'></span></a></td>";
                configuration.response += "</tr>";
            });

            configuration.table.find('tbody').html(configuration.response);
        });

    }

});

