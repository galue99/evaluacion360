function OtherQuestion(){
	var self = this;

	self.all = function(id){
		return $.ajax({
			url: '/admin/encuestas/other_question/' + id,
			dataType: 'json',
			method: 'GET',
			contentType: "application/json"
		});
	};

	self.create = function(data){
		return $.ajax({
			url: '/admin/encuestas/other_question',
			method: 'POST',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json"
		});
	};

	self.find = function(id){
		return $.ajax({
			url: '/admin/encuestas/other_question/'+ id,
			method: 'GET',
			dataType: 'json',
			contentType: "application/json",
		});
	};

	self.update = function(id,data){
		return $.ajax({
			url: '/admin/encuestas/other_question/'+id,
			method: 'PUT',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json",
		});
	};

	self.destroy = function(id){
		return $.ajax({
			url: '/admin/encuestas/other_question/'+id,
			method: 'DELETE',
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json",
		});
	};

}

