function UserEncuesta(){

var self = this;

	self.AssignUserTes = function(data){
		return $.ajax({
			url: '/admin/users_encuesta',
			method: 'POST',
			data: data,
			dataType: 'json',
			contentType: "application/json"
		});
	};

	self.AllUserTest = function(){
		return $.ajax({
			url: '/admin/users_encuesta',
			dataType: 'JSON',
			method: 'GET',
			contentType: 'application/json',
		});
	};



}
