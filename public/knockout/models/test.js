function Test(){
	var self = this;

	var id = 1;


	self.create = function(data){
		return $.ajax({
			url: '/encuestado/encuesta',
			dataType: 'JSON',
			method: 'POST',
			data: data,
			contentType: 'application/json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		});
	};


	self.find = function(id){
		return $.ajax({
			url: '/encuestado/encuesta/'+ id,
			dataType: 'json',
			method: 'GET',
			contentType: 'application/json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		});
	};

}