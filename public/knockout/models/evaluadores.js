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
}