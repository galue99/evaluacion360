function EvaluadoresViewModel(){
	var self = this;
	var evaluador = new Evaluadores();
	var roles = new Miscelaneos();

	//arrays para datos
	self.evaluadores = ko.observableArray();
	self.roles = ko.observableArray();

	self.updateEvaluadores = ko.observable(false);

	self.showForm = ko.observable(false);


	self.formData = ko.observable({
		firstname: ko.observable(),
		lastname: ko.observable(),
		dni: ko.observable(),
		email: ko.observable(),
		deparment: ko.observable(),
		position: ko.observable(),
		idroluser: ko.observable(),
		is_active: ko.observable(),
		password: ko.observable()
	});


	//funcion para obtener evaluadores
	self.getEvaluadores = function(){
		evaluador.all()
		.done(function(response){
			self.evaluadores(response);
		});
	};

	//funcion para obtener roles
	self.getRoles = function(){
		roles.allRoles()
		.done(function(response){
			self.roles(response);
		});
	};

	//para limpiar el formulario
	self.clearForm = function(){
		self.formData = ko.observable({
		deparment: ko.observable(''),
		dni: ko.observable(''),
		email: ko.observable(''),
		firstname: ko.observable(''),
		idrol: ko.observable(''),
		is_active: ko.observable(''),
		lastname: ko.observable(''),
		position: ko.observable('')
		});
	}


	//guardar el usuario
	self.save = function(){

		//chequeamos la variable para saber si es un update o un insert
		if (self.updateEvaluadores() == false){
			evaluador.create(self.formData())
			.done(function(response){
				self.toggleForm();
				self.getEvaluadores();
				toastr.info('El usuario se ha guardado con exito');
			})
			.fail(function(response){
				toastr.error('Ocurrio un error al intentar guardar el usuario');
			});
		}
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};



	//Obteniendo evaluadores(users)
	self.getEvaluadores();

	//Obteniendo roles de usuarios
	self.getRoles();


}