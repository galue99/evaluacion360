function Competencias(){
	var self = this;

	self.all = function(){
		return $.ajax({
			url: '/admin/competencias',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json"
		});
	};

	self.create = function(data){
		return $.ajax({
			url: '/admin/competencias',
			method: 'POST',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json"
		});
	};

	self.find = function(id){
		return $.ajax({
			url: '/admin/competencias/'+ id,
			method: 'GET',
			dataType: 'json',
			contentType: "application/json",
		});
	};

	self.update = function(id,data){
		return $.ajax({
			url: '/admin/competencias/'+id,
			method: 'PUT',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json",
		});
	};

	self.destroy = function(id){
		return $.ajax({
			url: '/admin/competencias/'+id,
			method: 'DELETE',
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json",
		});
	};
	
	self.AllCompetenciaComport = function(){
		return $.ajax({
			url: '/admin/competencias_comportamientos',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json"
		});
	};
	
	self.competenciasComportamientos = function(){
		return $.ajax({
			url: '/admin/competencias_comportamientos',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json"
		});
	}

}