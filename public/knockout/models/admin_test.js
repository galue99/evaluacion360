function Test(){
	var self = this;

	self.all = function(){
		return $.ajax({
			url: '/admin/encuesta',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json"
		});
	};

	self.create = function(data){
		return $.ajax({
			url: '/admin/encuesta',
			method: 'POST',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		});
	};

	self.find = function(id){
		return $.ajax({
			url: '/admin/encuesta/'+ id,
			method: 'GET',
			dataType: 'json',
			contentType: "application/json",
		});
	};

	self.update = function(id,data){
		return $.ajax({
			url: '/admin/encuesta/'+id,
			method: 'PUT',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json",
		});
	};

	self.destroy = function(id){
		return $.ajax({
			url: '/admin/encuesta/'+id,
			method: 'DELETE',
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json",
		});
	};

}