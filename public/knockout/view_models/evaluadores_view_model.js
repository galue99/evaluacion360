function EvaluadoresViewModel(){
	var self = this;
	var evaluador = new Evaluadores();
	var miscelaneo = new Miscelaneos();

	//arrays para datos
	self.evaluadores = ko.observableArray();
	self.roles = ko.observableArray();
	self.companies = ko.observableArray();
	self.selectedEvaluadores = ko.observable();
	self.updateEvaluadores = ko.observable(false);

	self.showForm = ko.observable(false);


	self.formData = ko.observable({
		firstname: ko.observable(),
		lastname: ko.observable(),
		dni: ko.observable(),
		email: ko.observable(),
		deparment: ko.observable(),
		position: ko.observable(),
		company_id: ko.observable(),
		branch_office: ko.observable(),
		idrol: ko.observable(),
		is_active: ko.observable(),
		password: ko.observable()
	});


	//funcion para obtener evaluadores
	self.getEvaluadores = function(){
		evaluador.all()
		.done(function(response){
			console.log(response);
			self.evaluadores(response);
		});
	};

	//funcion para obtener empresas

	self.getCompanies = function(){
		miscelaneo.allCompanies()
		.done(function(response){
			self.companies(response);
		});
	};

	//funcion para obtener roles
	self.getRoles = function(){
		miscelaneo.allRoles()
		.done(function(response){
			self.roles(response);
		});
	};

	//para limpiar el formulario
	self.clearForm = function(){
		self.formData({
			firstname: ko.observable(),
			lastname: ko.observable(),
			dni: ko.observable(),
			email: ko.observable(),
			deparment: ko.observable(),
			position: ko.observable(),
			company_id: ko.observable(),
			branch_office: ko.observable(),
			idroluser: ko.observable(),
			is_active: ko.observable(),
			password: ko.observable()
		});
		$('#formEvaluadores').validate().resetForm();
	};


	//guardar el usuario
	self.save = function(){
		if ($('#formEvaluadores').valid()) {
		//chequeamos la variable para saber si es un update o un insert
			if (self.updateEvaluadores() == false){
				evaluador.create(self.formData())
				.done(function(response){
					self.toggleForm();
					self.getEvaluadores();
	                self.clearForm();
					toastr.info('El usuario se ha guardado con exito');
				})
				.fail(function(response){
					toastr.error('Ocurrio un error al intentar guardar el usuario');
				});
			}else{
			//actualizando el usuario
				evaluador.update(self.formData().id, self.formData())
				.done(function(response){
					self.toggleForm();
					self.getEvaluadores();
					self.clearForm();
					self.updateEvaluadores(false);
					toastr.info('El Usuario ha sido editado con exito');
				})
				.fail(function(response){
					toastr.error('Ha habido un error al actualizar el usuario');
				});
			};
		}else{
			toastr.warning('Debe completar todos los campos');
		}
	};


	//buscamos el usuario para luego editarlo
	self.editEvaluadores = function(data){
		evaluador.find(data.id)
		.done(function(response){
			self.updateEvaluadores(true);
			self.toggleForm();
			response.password = response.repassword;
			self.formData(response);
		});
	};

	//Borrando Usuarios
	self.removeEvaluadores = function(data){
		swal({title: "¿Estas seguro?",
			text: "que desea eliminar este usuario",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar",
			closeOnConfirm: true },
			function(){
				evaluador.destroy(data.id)
				.done(function(response){
					toastr.info('Usuario removido con exito');
					self.evaluadores.remove(data);
				});
			});
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};

	self.cancel = function(){
		self.toggleForm();
		self.clearForm();
	};


	//Obteniendo evaluadores(users)
	self.getEvaluadores();

	//Obteniendo roles de usuarios
	self.getRoles();

	//obteniendo empresas
	self.getCompanies();


}