function CompetenciasViewModel(){
	var self = this;
	var competencia = new Competencias();

	//arrays para datos
	self.competencias = ko.observableArray();
	self.showForm = ko.observable(false);


	self.formData = ko.observable({
		name: ko.observable(),
		description: ko.observable()
	});


	self.getCompetencias = function(){
		competencia.all()
		.done(function(response){
			self.competencias(response);
		});
	};

	//para limpiar el formulario
	self.clearForm = function(){
		self.formData({
			name: ko.observable(),
			description: ko.observable()
		});
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};

	self.cancel = function(){
		self.toggleForm();
		self.clearForm();
	};

	self.save = function(){
		competencia.create(self.formData())
		.done(function(response){
			self.clearForm();
			self.toggleForm();
			toastr.success('La competencia fue guardada exitosamene');
		})
		.fail(function(response){
			toastr.error('Hubo un error al guardar la competencia');	
		})
	}

	//buscamos el usuario para luego editarlo
	self.editCompetencias = function(data){
		competencia.find(data.id)
		.done(function(response){
			self.updateCompetencia(true);
			self.toggleForm();
			self.formData(response);
		});
	};

	//Borrando Usuarios
	self.removeCompetencias = function(data){
		swal({title: "¿Estas seguro?",
			text: "que desea eliminar esta competencia",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar",
			closeOnConfirm: true },
			function(){
				competencia.destroy(data.id)
				.done(function(response){
					toastr.info('Usuario removido con exito');
					self.competencias.remove(data);
				});
			});
	};

	self.getCompetencias();


}