function load_ajax(parameters, callback) {            
    $.ajax({
        url: parameters.url,
        type: 'post',
        async: false,
        cache: false,
        data: parameters.data,
        dataType: 'json'
    }).done(function(response) {
        callback(response);
    }).fail(function(error) {
        console.error(error);
    });
}