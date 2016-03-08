function testViewModel(){
	var self = this;
	var encuesta = new Test();

	self.showForm = ko.observable(false);

	console.log('este es el view model');

	self.toggleEncuesta = function(){
		self.showForm(!self.showForm())
	};

	self.findTest = function(){
		encuesta.find()
		.done(function(response){
			console.log(response);
		});
	};

	self.findTest();
}