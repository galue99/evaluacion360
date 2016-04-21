function ComportamientosViewModel(){
	var self = this;
	var comportamiento = new Comportamientos();
	var competencia = new Competencias();

	//arrays para datos
	self.comportamientos = ko.observableArray();
	self.competencias = ko.observableArray();
	self.competenciasCompor = ko.observableArray();
	self.showForm = ko.observable(false);


	self.formData = ko.observable({
		name: ko.observable(),
		description: ko.observable()
	});


	self.getComportamientos = function(){
		comportamiento.all()
		.done(function(response){
			self.comportamientos(response);
		});
	};

	self.getCompetencias = function(){
		competencia.all()
		.done(function(response){
			self.competencias(response);
		});
	};

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
		comportamiento.create(self.formData())
		.done(function(response){
			self.clearForm();
			self.toggleForm();
			self.getComportamientos();
			toastr.success('El comportamiento fue guardada exitosamene');
		})
		.fail(function(response){
			toastr.error('Hubo un error al guardar el comportamiento');	
		})
	}

	//buscamos el usuario para luego editarlo
	self.editComportamientos = function(data){
		comportamientos.find(data.id)
		.done(function(response){
			self.updateCompetencia(true);
			self.toggleForm();
			self.formData(response);
		});
	};

	//Borrando Usuarios
	self.removeComportamientos = function(data){
		swal({title: "¿Estas seguro?",
			text: "que desea eliminar este comportamiento",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar",
			closeOnConfirm: true },
			function(){
				comportamiento.destroy(data.id)
				.done(function(response){
					toastr.info('Usuario removido con exito');
					self.comportamientos.remove(data);
				});
			});
	};

	self.getComportamientos();

	self.getCompetencias();


}