function ListsSurveysViewModel(){
	var self = this;
	var test = new UserEncuesta();

	self.tests = ko.observableArray();

	self.getTestReady = function(){
		test.allTestReady()
		.done(function(response){
			console.log(response);
			self.tests(response);
		});
	};

	self.viewDetails = function(data){
		test.testDetails(data.id)
		.done(function(response){
			console.log(response);
		})
	};



	//obteniendo las encuestas con status 1
	self.getTestReady();
}