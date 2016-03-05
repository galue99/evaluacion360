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
			data: data,
			method: 'POST',
			dataType: 'json',
			contentType: "application/json",
			
		});
	};

}