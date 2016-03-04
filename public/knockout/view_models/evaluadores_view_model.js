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


}