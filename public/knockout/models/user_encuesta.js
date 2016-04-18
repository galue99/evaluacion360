function UserEncuesta(){

var self = this;

	self.AssignUserTest = function(data){
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

	self.allTestReady = function(){
		return $.ajax({
			url: '/admin/encuestas_ready',
			dataType: 'JSON',
			method: 'GET',
			contentType: 'application/json',
		});
	}

	self.testDetails = function(id){
		return $.ajax({
			url: '/admin/details/' + id,
			dataType: 'JSON',
			method: 'GET',
			contentType: 'application/json',
		});
	}



}
