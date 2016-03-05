function EvaluadoresViewModel(){
	var self = this;
	var evaluador = new Evaluadores();

	self.evaluadores = ko.observableArray();
	self.showForm = ko.observable(false);


	self.formData = ko.observable({
		fullname: ko.observable(),
		email: ko.observable()
	});

	self.getEvaluadores = function(){
		evaluador.all()
		.done(function(response){
			self.evaluadores(response);
		});
	};


	self.save = function(){

	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};


	//Obteniendo evaluadores(users)
	self.getEvaluadores();


}