function Test(){
	var self = this;

	var id = 1;


	self.find = function(id){
		return $.ajax({
			url: '/admin/encuesta/'+ id,
			dataType: 'json',
			method: 'GET',
			contentType: 'application/json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		});
	}
}