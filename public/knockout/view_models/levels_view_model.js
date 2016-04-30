function LevelsViewModel(){
	var self = this;
	var level = new Level();


	//observables
	self.levels = ko.observableArray();
	self.showForm = ko.observable(false);
	self.updateLevels = ko.observable(false);

	self.formData = ko.observable({
		name: ko.observable()
	});

	self.clearForm = function(){
		self.formData({
			name: ko.observable()
		});
	};
	
	self.isValid = function(){
		return self.formData().name();
	}


	self.save = function(){
		if (self.isValid()){
			if (self.updateLevels() == false){
			level.create(self.formData())
			.done(function(response){
				self.toggleForm();
				self.clearForm();
				self.getLevels();
				toastr.info('El nivel ha sido guardado con exito');
			})
			.fail(function(response){
				toastr.error('Hubo un error al intentar guardar el nivel');
			});
			}else{
				level.update(self.formData().id, self.formData())
				.done(function(response){
					self.updateLevels(false);
					self.toggleForm();
					self.clearForm();
					self.getLevels();
					toastr.info('El nivel ha sido actualizado con exito');
				})
				.fail(function(response){
					toastr.error('Hubo un error al intentar actualizar el nivel');
				});
			}
		}else{
			toastr.warning('Debe completar los campos');
		}
	}

	self.editLevel = function(data){
		level.find(data.id)
		.done(function(response){
			self.updateLevels(true);
			self.toggleForm();
			self.formData(response);
		})
	};

	self.destroyLevel = function(data){
		swal({title: "¿Estas seguro?",
			text: "que desea eliminar este usuario",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar",
			closeOnConfirm: true },
			function(){
				level.destroy(data.id)
				.done(function(response){
					toastr.info('El nivel ha sido eliminado con exito');
					self.levels.remove(data);
				})
				.fail(function(response){
					toastr.error('Hubo un error al intentar eliminar el nivel');
				});
			});
	}

	self.getLevels = function(){
		level.all()
		.done(function(response){
			self.levels(response);
		});
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};

	self.cancel = function(){
		self.toggleForm();
		self.clearForm();
	};

	//obteniendo levels
	self.getLevels();

}