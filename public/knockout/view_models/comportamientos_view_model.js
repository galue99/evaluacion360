function ComportamientosViewModel(){
	var self = this;
	var comportamiento = new Comportamientos();
	var competencia = new Competencias();

	//arrays para datos
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


	self.getComportamientos = function(){
		comportamiento.all()
		.done(function(response){
			console.log(response);
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
			competencia_id: ko.observable(),
			name: ko.observable(),
		});
		jQuery('#formComportamiento').validate().resetForm();
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
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
				self.getComportamientos();
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
					self.getComportamientos();
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
		comportamiento.find(data.id)
		.done(function(response){
			self.formData(response);
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
					self.comportamientos.remove(data);
				});
			});
	};

	self.getComportamientos();
	
	self.getCompetencias();

}