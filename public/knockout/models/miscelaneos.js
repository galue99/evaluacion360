function Miscelaneos(){
	var self = this;

	self.allRoles = function(){
		return $.ajax({
			url: '/admin/roles',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json"
		});
	};
}