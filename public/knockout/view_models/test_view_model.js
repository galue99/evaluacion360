function testViewModel(){
	var self = this;
	var encuesta = new Test();

	self.showForm = ko.observable(false);
	self.Object1 = ko.observableArray();

	console.log('este es el view model');

	self.toggleEncuesta = function(){
		self.showForm(!self.showForm())
	};

	self.findTest = function(){
		encuesta.find()
		.done(function(response){
			Object.keys(response).forEach(function(items){
				
			});
		});
	};

	self.findTest();
}