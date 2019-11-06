$(document).on('submit','#guardar',function(e){
	e.preventDefault();
	$.ajax({
		method: 'post',
		url: 	this.action,
		data: 	$(this).serialize(),
		dataType: 'json',
		success: function(data){
			if (data['error']) {
				Materialize.toast(data['mensaje',4000]);
			}
		}

	});

});