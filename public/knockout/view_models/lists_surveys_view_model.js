function ListsSurveysViewModel(){
	var self = this;
	var test = new UserEncuesta();

	self.user = ko.observable();
	self.answers = ko.observable();
	self.showListTest = ko.observable(true);
	self.tests = ko.observableArray();
	self.otherAnswers = ko.observable();

	self.getTestReady = function(){
		test.allTestReady()
		.done(function(response){
			self.tests(response);
		});
	};

	self.viewDetails = function(data){
		self.showListTest(false);
		test.testDetails(data.id)
		.done(function(response){
			console.log(response.Success)
			self.user(response.Success.user);
			self.answers(response.Success.answers);
			self.otherAnswers(response.Success.other_question)
		})
	};

	self.toggleListTest = function(){
		self.showListTest(!self.showListTest());
	}



	//obteniendo las encuestas con status 1
	self.getTestReady();
}