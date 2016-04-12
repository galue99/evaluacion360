function Test(){
	var self = this;

	var id = 1;


	self.create = function(data){
		return $.ajax({
			url: '/encuestado/',
			dataType: 'JSON',
			method: 'POST',
			data: data,
			contentType: 'application/json',
		});
	};


	self.find = function(id){
		return $.ajax({
			url: '/encuestado/encuesta/'+ id,
			dataType: 'json',
			method: 'GET',
			contentType: 'application/json',
		});
	};

}