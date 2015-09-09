(function($) {

   $("#tabla_eventos").hide();
   //Los divs que muestran los mensajes pero estan ocultos
   $("#successEvento").css("display", "none");
   $("#errorEvento").css("display", "none");
   $("#errorEventoConsulta").css("display", "none");

   //funcion para añadir o quitar una persona con su respectivo cargo
   $(document).on('click', 'div#cargos_persona_empresa button.add', function() {
      var clone = $(this).parents('div.col-md-12').clone();
      $(this).children().removeClass('glyphicon-plus-sign').addClass("glyphicon-minus-sign");
      $(this).removeClass('add').addClass("remove");
      $('div#cargos_persona_empresa').append(clone);
   });

   $(document).on('click', 'div#cargos_persona_empresa button.remove', function() {
      $(this).parents('div.col-md-12').remove();
   });
   ///////////////////////////////////////////////////////////////////////////////////////

   ////////////////////////////////////////////////////////////////////////////////////

   $("#buttonSaveEvent").on("click", function(event) {
      event.preventDefault();

      var parameters = new Array();

      parameters.url = $("#event_form").attr('action');
      parameters.data = $("#event_form").serialize();

      load_ajax(parameters, function(response) {

         var message_error = "";
         var message_success = "";

         if (response.errors !== undefined) {
            $.each(response.errors, function(key, value) {
               message_error += "<strong>" + value + "</strong><br />";
            });
            $("#errorEvento").html(message_error);
            $("#errorEvento").slideDown("slow");

         } else if (response.register !== undefined) {
            $("#errorEvento").hide();
            message_success = "Registro realizado correctamente";
            $("#successEvento").html("<strong>" + message_success + "</strong>");
            $("#successEvento").slideDown("slow");

         }

      });

   });

   $("#eventForm").on('submit', function(event) {
      event.preventDefault();

      var parameters = new Array();

      parameters.url = $(this).attr('action');
      parameters.data = $(this).serialize();

      load_ajax(parameters, function(response) {

         var message_error = "";
         var message_success = "";

         if (response.errors != undefined) {
            $.each(response.errors, function(key, value) {
               message_error += "<strong>" + value + "</strong><br />";
            });
            $("#successEvento").hide('fast');
            $("#errorEvento").html(message_error);
            $("#errorEvento").slideDown("fast");

         } else if (response.update != undefined) {
            $("#errorEvento").hide('fast');
            message_success = "Modificación realizada correctamente";
            $("#successEvento").html("<strong>" + message_success + "</strong>");
            $("#successEvento").slideDown("fast");
         }
      });

   });

   $("#btn_consultar_evento").on("click", function(event) {
      event.preventDefault();

      var parameters = new Array();

      parameters.url = $("#form_consultar_evento").attr('action');
      parameters.data = $("#form_consultar_evento").serialize();

      load_ajax(parameters, function(response) {

         var columnas;
         var message_error = "";
         var baseUrl = $("#tabla_eventos").attr('data-url-base') + 'evento/';

         if (response.length > 0) {
            $.each(response, function(key, value) {
               columnas += "<tr>";
               columnas += "<td>" + value.Nombre + "</td>";
               columnas += "<td>" + value.Fecha_Inicial + ' ' + value.Hora_Inicio + "</td>";
               columnas += "<td>" + value.Fecha_Final + ' ' + value.Hora_Final + "</td>";
               columnas += "<td>" + value.lugar + "</td>";
               columnas += "<td>" + value.Capacidad + "</td>";
               columnas += "<td>" + value.Aforo + "</td>";
               columnas += "<td>" + value.Estado + "</td>";
               columnas += "<td class='text-center'> <a href='" + baseUrl + 'update/' + value.Id_Evento + "' class='modificar_evento'><span class='glyphicon glyphicon-edit'></span></a></td>";
               columnas += "<td class='text-center'> <a href='javascript:void(0);' class='show-modal-event' data-event-id='" + value.Id_Evento + "'>";
               columnas += "<span class='glyphicon glyphicon-list-alt'></span></a></td>";
               columnas += "</tr>";
            });
            $("#errorEventoConsulta").hide();
            $("#tabla_eventos tbody").html(columnas);
            $("#tabla_eventos").show();
         } else {
            message_error = "No se encontraron resultados";
            $("#tabla_eventos").hide();
            $("#tabla_eventos tbody").html('');
            $("#errorEventoConsulta").html("<strong>" + message_error + "</strong>");
            $("#errorEventoConsulta").slideDown("slow");
         }
      });
   });

   function load_ajax (parameters, callback) {
      $.ajax({
         url: parameters.url,
         type: 'post',
         cache: false,
         data: parameters.data,
         dataType: 'json'
      }).done(function(response) {
         callback(response);
      }).fail(function(error) {
         console.error(error);
      });
   }

   /*
    * funcionalidad de la ventana modal de los detalles de los eventos
    */
   
   /*
    * Ocultar los elementos donde se muestran los mensajes de error o de exitoso
    */
   $("#alert-error-detail-event").hide();
   $("#alert-success-detail-event").hide();
   
   /*
    * Carga el html junto con la informacion de los medicamento y o utensilios
    * relacionados al evento
    * 
    * @param {object} list Son lo medicamento y utensilios que estan registrados
    * en la DB
    * @param {object} detail Es el detalle de los medicamentos/utensilios del evento
    * que estan en la DB
    * @returns {void}
    */

   var loadUtenMed = function (list, detail) {

      'use strict';
      
      var row, col12, select, colIn, option, input, size, rowContainer, button;
      
      row   = $("#selectMediUten").empty();
      size  = detail.length;
      
      col12 = $('<div></div>', {'class': 'col-md-12'});
      
      col12.append( $('<h4></h4>', {'class': 'text-center', text: 'Medicamentos/Utensilios'}) );
      
      if (size > 0) {
      
         detail.forEach (function (item, key) {
            
            colIn = [];
            
            select = $('<select></select>', {
               'class': 'form-control', 
               'name': 'medUten[]'
            });
            
            list.forEach (function (_item) {
               
               if (item.Id_Medicamento_detalle === _item.Id_Medicamento) {
                  option = $('<option></option>', {
                     'selected'  : 'selected',
                     text        : _item.Nombre,
                     'value'     : _item.Id_Medicamento
                  });
               } else {
                  option = $('<option></option>', {
                     text        : _item.Nombre,
                     'value'     : _item.Id_Medicamento
                  });                  
               }
               
               select.append(option);
               
            });
            
            input = $('<input>', 
            {
               'class'  : 'form-control', 
               'name'   : 'medUtenAmount[]',
               'type'   : 'number', 
               'value'  : item.cantidad_detalle
            });
            
            
            colIn.push( $('<div></div>', {'class': 'col-md-5'}).append(select) );
            colIn.push( $('<div></div>', {'class': 'col-md-5'}).append(input) );
            
            if (key == size - 1) {
               button = $('<button></button>', {
                  append   : $('<span></span>', {'class': 'glyphicon glyphicon-plus-sign'} ),
                  'class'  : 'btn-detail-event-add btn btn-default',
                  'type'   : 'button'
               });
            } else {
               button = $('<button></button>', {
                  append   : $('<span></span>', {'class': 'glyphicon glyphicon-minus-sign'} ),
                  'class'  : 'btn-detail-remove btn btn-default',
                  'type'   : 'button'
               });
            }
            
            colIn.push( $('<div></div>', {'class': 'col-md-2'}).append(button) );
            
            rowContainer = $('<div></div>', {'class': 'row-container row'});
            
            colIn.forEach( function (col) {
               rowContainer.append(col);
            });
            
            col12.append(rowContainer);

         });
         
      } else if (list.length > 0) {
                  
         list.forEach (function (_item) {

            option = $('<option></option>', {
               text        : _item.Nombre,
               'value'     : _item.Id_Medicamento
            });

            select.append(option);
            
            input = $('<input>', 
            {
               'class'  : 'form-control', 
               'name'   : 'medUtenAmount[]',
               'type'   : 'number', 
               'value'  : 0
            });
            
            button = $('<button></button>', {
               append   : $('<span></span>', {'class': 'glyphicon glyphicon-plus-sign'} ),
               'class'  : 'btn-detail-event-add btn btn-default',
               'type'   : 'button'
            });
            
            colIn.push( $('<div></div>', {'class': 'col-md-5'}).append(select) );
            colIn.push( $('<div></div>', {'class': 'col-md-5'}).append(input) );   
            colIn.push( $('<div></div>', {'class': 'col-md-2'}).append(button) );
            
            rowContainer = $('<div></div>', {'class': 'row-container row'});
            
            colIn.forEach( function (col) {
               rowContainer.append(col);
            });
            
            col12.append(rowContainer);

         });
         
      } else {
         col12.append( $('<h2></h2>', {'class': 'text-center', text: 'No hay datos asociados'}) );
      }
      
      row.append(col12);
   };
   
   /*
    * Carga el html con la informacion del detalle del evento y las herramientas
    * que esta en la DB
    * 
    * @param {object} herramientas Todas las herramientas que está, en la base de datos
    * @param {object} detail El detalle de las herramientas con el evento que estan
    * en la DB
    * @returns {void}
    */
   
   var loadHerramientas = function (herramientas, detail) {
      
      var row, rowContainer, col12, select, option, button, colIn, size;
      
      row = $('#selectHerramientas').empty();
      col12 = $('<div></div>', {'class': 'col-md-12'});
      size = detail.length;
      
      col12.append( $('<h4></h4>', {'class': 'text-center', text: 'Herramientas'}) );
      
      if (size > 0) {
      
         detail.forEach( function (value, key) {
            
            colIn = [];
            select = $('<select></select>', {
               'class': 'form-control', 
               'name': 'herramientas[]'
            });
            
            herramientas.forEach( function (_value) {
               
               if (value.Id_Herramienta === _value.Id_Herramienta) {
                  
                  option = $('<option></option>', {
                     'selected': 'selected',
                     text: _value.Nombre + " - "+ _value.Codigo,
                     'value': _value.Id_Herramienta
                  });
                  
               } else {
                  
                  option = $('<option></option>', {
                     text: _value.Nombre + " - "+ _value.Codigo,
                     'value': _value.Id_Herramienta
                  });
                  
               }
               
               select.append(option);             
               
            });
            
            colIn.push( $('<div></div>', {'class': 'col-md-5'}).append(select) );

            if (key == size - 1) {

               button = $('<button></button>', {
                  append   : $('<span></span>', {'class': 'glyphicon glyphicon-plus-sign'} ),
                  'class'  : 'btn-detail-event-add btn btn-default',
                  'type'   : 'button'
               });

            } else {

               button = $('<button></button>', {
                  append   : $('<span></span>', {'class': 'glyphicon glyphicon-minus-sign'} ),
                  'class'  : 'btn-detail-remove btn btn-default',
                  'type'   : 'button'
               });

            }

            colIn.push( $('<div></div>', {'class': 'col-md-2'}).append(button) );
            
            rowContainer = $('<div></div>', {'class': 'row-container row'});
            
            colIn.forEach( function (_item) {
               rowContainer.append(_item);
            });
            
            col12.append(rowContainer);
            
         });

      } else if (herramientas.length > 0) {

         select = $('<select></select>', {
            'class': 'form-control', 
            'name': 'herramientas[]'
         });
         
            herramientas.forEach( function (_value) {               

               option = $('<option></option>', {
                  text: _value.Nombre,
                  'value': _value.Id_Herramienta
               });
               
               select.append(option);             
               
            });
            
            colIn.push( $('<div></div>', {'class': 'col-md-5'}).append(select) );
            
            button = $('<button></button>', {
               append   : $('<span></span>', {'class': 'glyphicon glyphicon-plus-sign'} ),
               'class'  : 'btn-detail-event-add btn btn-default'
            });
            
            colIn.push( $('<div></div>', {'class': 'col-md-2'}).append(button) );
            
            rowContainer = $('<div></div>', {'class': 'row-container row'});
            
            colIn.forEach( function (_item) {
               rowContainer.append(_item);
            });
            
            col12.append(rowContainer);

      } else {
         col12.append( $('<h2></h2>', {'class': 'text-center', text: 'No Hay datos'}) );
      }
      row.append(col12);
   };
   
   /*
    * Carga el html con sus datos en el detalle del evento
    * con relacion a los voluntarios asociados al evento
    * 
    * @param {Object} volutarios voluntarios registrados en la DB
    * @param {Object} perfiles perfiles registrados en la DB
    * @param {Object} detail detalle de los voluntarios y los perfiles del evento
    * @returns {Void}
    */

   var loadVoluntarios = function (volutarios, perfiles, detail) {
      
      'use strict';

      var row, col12, colIn = [], select, select_, option, button, count = 0, rowContainer;

      row      = $("#selectVoluntarios").empty();
      col12    = $( "<div></div>", {'class': 'col-md-12'} );
      count    = detail.length;
      
      col12.append( $('<h4></h4>',{'class': 'text-center', text: 'Voluntarios/perfiles'}) );

      for (var i in detail) {

         colIn    = [];
         select   = $("<select></select>", {
            'class'  : 'form-control voluntarios',
            'name'   : 'voluntarios[]' 
         });
         select_  = $("<select></select>", {
            'class'  : 'form-control perfiles',
            'name'   : 'perfiles[]' 
         });
         
         for (var k in volutarios) {

            if (volutarios[k]['Id_Usuario'] === detail[i]['Id_Usuario']) {
               
               option = $('<option></option>', {
                  'selected'  : 'selected',
                  text        : volutarios[k]['Nombres'] + ' ' + volutarios[k]['Apellidos'],
                  'value'     : detail[k]['Id_Usuario']
               });
               
            } else {
               
               option = $('<option></option>', {
                  text     : volutarios[k]['Nombres'] + ' ' + volutarios[k]['Apellidos'],
                  'value'  : volutarios[k]['Id_Usuario']
               });

            }
            select.append(option);
         }

         colIn.push( $("<div></div>", {'class': 'col-md-5'}).append(select) );

         for (var j in perfiles) {
            
            if ( detail[i]['perfil_id'] === perfiles[j]['Id'] ) {
               
               option = $("<option></option>", {
                  'selected'  : 'selected',
                  text        : perfiles[j]['Nombre'],
                  'value'     : perfiles[j]['Id']
               });
               
            } else {
               
               option = $("<option></option>", {
                  text        : perfiles[j]['Nombre'],
                  'value'     : perfiles[j]['Id']
               });
            }

            select_.append(option);
         }
         
         colIn.push( $("<div></div>", {'class': 'col-md-5'}).append(select_) );

         if (i == count - 1) {
            
            button = $('<button></button>', {
               append   : $('<span></span>', {'class': 'glyphicon glyphicon-plus-sign'} ),
               'class'  : 'btn-detail-event-add btn btn-default',
               'type'   : 'button'
            });

         } else {
            
            button = $('<button></button>', {
               append   : $('<span></span>', {'class': 'glyphicon glyphicon-minus-sign'} ),
               'class'  : 'btn-detail-remove btn btn-default',
               'type'   : 'button'
            });
            
         }
         
         colIn.push( $("<div></div>", {'class': 'col-md-2'}).append(button) );
         
         rowContainer = $('<div></div>', {'class': 'row-container row'});
         
         colIn.forEach( function (item){
            rowContainer.append(item);
         });
         
         col12.append( rowContainer );

         row.append(col12);
      };

   };
   
   /*
    * 
    * Funcionalidad para cuando se ejecute el evento de mostrar la ventana modal
    * 
    */
   $(document).on('click', '.show-modal-event', function () {

      'use strict';

      var form, parameters;

      form = $("#frmDetail");
      parameters = {};
      parameters.url = form.attr('data-url');
      parameters.data = {eventId: $(this).attr('data-event-id')};

      load_ajax(parameters, function (response) {         
         loadUtenMed(response['medicamentos'], response['detalleMedicamentos']);
         
         loadHerramientas(response['herramientas'], response['detalleHerramientas']);
         
         loadVoluntarios(response['voluntarios'], response['perfiles'],
                 response['voluntarios_detalle']);

      });

      $("#frmDetail").find('#eventId').val( $(this).attr('data-event-id') );
      $('#modal-event').modal('show');
   });

   /*
    *Evento para agregar elementos clones 
    *  
    */

   $(document).on('click', 'button.btn-detail-event-add', function () {

      var row, row_, button;

      row = $(this).parents('div.row-container');
      row_ = row.clone();
      button = $(this);

      button.removeClass('btn-detail-event-add')
              .children().removeClass('glyphicon-plus-sign');

      button.addClass('btn-detail-remove')
              .children().addClass('glyphicon-minus-sign');

      $(this).parents('div.col-md-12').append(row_);
      
   });

   /*
    * 
    * Evento para eliminar elementos
    * 
    */
   $(document).on('click', 'button.btn-detail-remove', function () {
      $(this).parents('div.row-container').remove();
   });
   
   /*
    * Evento asociado a la peticion AJAX para el envio del formulario
    * 
    */

   $("#frmDetail").on('submit', function (event) {
      
      event.preventDefault();
      var parameters = {}, form = $(this);
      form.find('input#clicked').attr('value', 'on');
      parameters.url    = form.attr('data-url');
      parameters.data   = form.serialize();

      load_ajax(parameters, function (response) {
         
         if(response.error != undefined) {
            $("#alert-error-detail-event").empty();
            
            $.each(response.error, function(key, value){
               $("#alert-error-detail-event").append( $('<p></p>', {'class': 'text-center', text:value}) );
            });
            
            $("#alert-error-detail-event").show('slow').fadeOut(6300);
         } else {
            $("#alert-success-detail-event").html( $("<p></p>", {
               class: 'text-center',
               text: 'Cambios realizados correctamente'
               
            })).show('slow').fadeOut(3000);
         }
      });

   });
   
})(jQuery);