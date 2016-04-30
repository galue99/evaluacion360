function CompetenciasViewModel(){
	var self = this;
	var competencia = new Competencias();

	//arrays para datos
	self.competencias = ko.observableArray();
	self.showForm = ko.observable(false);
	self.updateCompetencia = ko.observable(false)


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
		jQuery('#formCompetencia').validate().resetForm();
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};

	self.cancel = function(){
		self.toggleForm();
		self.clearForm();
	};

	self.save = function(){
		if (jQuery('#formCompetencia').valid()) {
			if(self.updateCompetencia() != true){
				competencia.create(self.formData())
				.done(function(response){
					self.clearForm();
					self.toggleForm();
					self.getCompetencias();
					toastr.success('La competencia fue guardada exitosamene');
				})
				.fail(function(response){
					toastr.error('Hubo un error al guardar la competencia');	
				})
			}else{
				competencia.update(self.formData().id, self.formData())
				.done(function(response){
					self.clearForm();
					self.toggleForm();
					self.getCompetencias();
					self.updateCompetencia(false);
					toastr.info('Competencia Actualizado con exito');
				}).fail(function(response){
					toastr.error('hubo un error al intentar actualizar la competencia');
				})
			}
		}else{
			toastr.warning('Debe completar todos los campos');
		}
	};

	//buscamos el usuario para luego editarlo
	self.editCompetencias = function(data){
		competencia.find(data.id)
		.done(function(response){
			self.updateCompetencia(true);
			self.toggleForm();
			self.getCompetencias();
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
					toastr.info('Competencia removida con exito');
					self.competencias.remove(data);
				});
			});
	};

	self.getCompetencias();


}