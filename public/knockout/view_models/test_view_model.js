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
			Object.keys(response).forEach(function(items){
				console.log(items, response[items]);

			});
		});
	};

	self.findTest();
}