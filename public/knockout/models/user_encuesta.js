function UserEncuesta(){

var self = this;

	self.AssignUserTes = function(data){
		return $.ajax({
			url: '/admin/users_encuestas',
			dataType: 'JSON',
			method: 'POST',
			data: data,
			contentType: 'application/json',
		});
	};

	self.AllUserTest = function(id){
		return $.ajax({
			url: '/admin/users_encuesta/' + id,
			dataType: 'JSON',
			method: 'GET',
			contentType: 'application/json',
		});
	};



}
