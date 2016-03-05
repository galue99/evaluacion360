function evaluadoresViewModel(){
	var self = this;

	self.showForm = ko.observable(false);

	self.formData = ko.observable({
		fullname: ko.observable(),
		email: ko.observable()
	});


	self.save = function(){

	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};

	$.getJSON("http://localhost:8000/admin/users", function(data) {
		console.log(data);
		// Now use this data to update your view models,
		// and Knockout will update your UI automatically
	})

}