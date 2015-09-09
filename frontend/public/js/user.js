$(function(){

	$("#success-message").hide();
	$("#error-message").hide();
	var parameter = {};

	$(".get-event-profiles").on('click', function(event) {
		parameter.url = $(this).attr('data-url');
		parameter.data = {};

		load_ajax(parameter, function(response){
			$("#myModal").find('h4').html(response.Nombre);
			parameter.data.eventId = response.id;
		});

		parameter.url = $(this).attr('data-url-profiles');

		load_ajax(parameter, function (response) {

			$("#perfil").empty();

			response.forEach( function(val) {
				$("#perfil").append( $( "<option></option>", { 'value': val.Id, text: val.Nombre } ) );
			});
		});
	});

	$("#btn-participar").on('click', function () {
		parameter.url = $(this).attr('data-url');
		parameter.data.idProfile = $("#perfil").val();

		load_ajax(parameter, function (response) {
			if( response.error ) {
				$("#success-message").hide();
				$("#error-message").html( $('<p></p>', {text:response.error }) );
				$("#error-message").show('slow');
			} else if( response.success ) {
				$("#error-message").hide();
				$("#success-message").html( $('<p></p>', {text: response.success} ) );
				$("#success-message").show('slow');
				$("#success-message").fadeOut(5500);
			}

		});
		
	});

	$('#myModal').on('hidden.bs.modal', function (e) {
		$("#success-message").hide();
		$("#error-message").hide();
	})
});