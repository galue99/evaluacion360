function Miscelaneos(){
	var self = this;


	self.allRoles = function(){
		return $.ajax({
			url: '/admin/roles',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		});
	};

	self.find = function(id){
		return $.ajax({
			url: '/admin/roles/'+ id,
			dataType: 'json',
			method: 'GET',
			contentType: "application/json",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		});
	}

	self.allCompanies = function(){
		return $.ajax({
			url: '/admin/img',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json",
		});
	};

	self.AssignUserTes = function(data){
		return $.ajax({
			url: '/admin/users_encuesta',
			dataType: 'JSON',
			method: 'POST',
			data: data,
			contentType: 'application/json',
		});
	};

}