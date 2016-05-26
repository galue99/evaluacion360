function ComportamientosViewModel(){
	var self = this;
	var comportamiento = new Comportamientos();
	var competencia = new Competencias();

	
	self.tableComportamientos = ko.observable(false);
	
	self.comportamientos = ko.observableArray();
	self.competencias = ko.observableArray();
	self.competenciasCompor = ko.observableArray();
	self.updateComportamiento = ko.observable(false);
	self.showForm = ko.observable(false);


	self.formData = ko.observable({
		competencia_id: ko.observable(),
		name: ko.observable(),
	});
	
	self.newComportamiento = function(){
		self.getCompetencias();
		self.toggleForm();
	};


	self.getCompetencias = function(){
		competencia.competenciasComportamientos()
		.done(function(response){
			self.competencias(response);
			
			self.competencias().map(function(competencia){
				
				competencia.comportamientos = ko.observableArray(competencia.comportamiento);
				
				return competencia;
			});
			
		});
	};

	self.clearForm = function(){
		self.formData({
			competencia_id: ko.observable(),
			name: ko.observable(),
		});
		jQuery('#formComportamiento').validate().resetForm();
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
		self.tableComportamientos(false);
	};

	self.cancel = function(){
		self.toggleForm();
		self.clearForm();
	};

	self.save = function(){
		if ($('#formComportamiento').valid()){
			if(self.updateComportamiento() != true){
				comportamiento.create(self.formData())
			.done(function(response){
				self.clearForm();
				self.toggleForm();
				self.getCompetencias();
				toastr.success('El comportamiento fue guardada exitosamene');
			})
			.fail(function(response){
				toastr.error('Hubo un error al guardar el comportamiento');	
			})
			}else{
				comportamiento.update(self.formData().id, self.formData())
				.done(function(response){
					self.clearForm();
					self.toggleForm();
					self.updateComportamiento(false);
					self.getCompetencias();
					toastr.info('Comportamiento actualizado con exito');	
				})
				.fail(function(response){
					toastr.error('Hubo un error al aztualizar el comportamiento');	
				})
			}
		}else{
			toastr.warning('Debe completar todos los campos');
		}
	}

	//buscamos el usuario para luego editarlo
	self.editComportamientos = function(data){
		console.log(data)
		comportamiento.find(data.competencia_id)
		.done(function(response){
			console.log(response);
			self.formData(data);
			self.updateComportamiento(true);
			self.toggleForm();
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
					toastr.info('Comportamiento removido con exito');
					self.competenciaSeleted().comportamientos.remove(data);
				});
			});
	};
	
	self.competenciaSeleted = ko.observableArray();
	//Toggle de box
	self.toggleBox = function(data){
		self.tableComportamientos(!self.tableComportamientos());
		self.competenciaSeleted(data);
	};

	
	self.getCompetencias();

}