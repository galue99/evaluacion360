function Evaluadores(){
	var self = this;

	self.all = function(){
		return $.ajax({
			url: '/admin/users',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json"
		});
	};

	self.create = function(data){
		return $.ajax({
			url: '/admin/users',
			method: 'POST',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json"
		});
	};

	self.find = function(id){
		return $.ajax({
			url: '/admin/users/'+ id,
			method: 'GET',
			dataType: 'json',
			contentType: "application/json",
		});
	};

	self.update = function(id,data){
		return $.ajax({
			url: '/admin/users/'+id,
			method: 'PUT',
			data: data,
			dataType: 'json',
			contentType: "application/json",
		});
	};

	self.destroy = function(id){
		return $.ajax({
			url: '/admin/users/'+id,
			method: 'DELETE',
			dataType: 'json',
			contentType: "application/json",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		});
	};

}