function Comportamientos(){
	var self = this;

	self.all = function(){
		return $.ajax({
			url: '/admin/comportamientos',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json"
		});
	};

	self.create = function(data){
		return $.ajax({
			url: '/admin/comportamientos',
			method: 'POST',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json"
		});
	};

	self.find = function(id){
		return $.ajax({
			url: '/admin/comportamientos/'+ id,
			method: 'GET',
			dataType: 'json',
			contentType: "application/json",
		});
	};

	self.update = function(id,data){
		return $.ajax({
			url: '/admin/comportamientos/'+id,
			method: 'PUT',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json",
		});
	};

	self.destroy = function(id){
		return $.ajax({
			url: '/admin/comportamientos/'+id,
			method: 'DELETE',
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json",
		});
	};

}