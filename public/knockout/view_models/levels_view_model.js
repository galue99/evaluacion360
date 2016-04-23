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


	self.save = function(){
		if (self.updateLevels() == false){
			level.create(self.formData())
			.done(function(response){
				self.toggleForm();
				self.clearForm();
				self.getLevels();
				toastr.info('El nivel ha sido guardado con exito');
			})
			.fail(function(response){
				toastr.info('Hubo un error al intentar guardar el nivel');
			});
		}else{
			level.update(self.formData().id, self.formData())
			.done(function(response){
				self.updateLevels(false);
				self.toggleForm();
				self.clearForm();
				toastr.error('El nivel ha sido actualizado con exito');
			});
		}
	}

	self.editLevel = function(data){
		// console.log(data.id);
		level.find(data.id)
		.done(function(response){
			self.updateLevels(true);
			self.toggleForm();
			self.formData(response);
		})
	};

	self.destroyLevel = function(data){
		level.destroy(data.id)
		.done(function(response){
			toastr.error('El nivel ha sido eliminado con exito');
			self.levels.remove(data);
		})
		.fail(function(response){
			toastr.warning('Hubo un error al intentar eliminar el nivel');
		});
	}

	self.getLevels = function(){
		level.all()
		.done(function(response){
			console.log(response);
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