function Test(){
	var self = this;

	var id = 1;


	self.find = function(id){
		return $.ajax({
			url: '/encuestado/encuesta/'+ 1,
			dataType: 'json',
			method: 'GET',
			contentType: 'application/json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		});
	}
}