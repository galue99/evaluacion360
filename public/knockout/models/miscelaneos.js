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

	self.find = function(id){
		return $.ajax({
			url: '/admin/roles/'+ id,
			dataType: 'json',
			method: 'GET',
		});
	}



}