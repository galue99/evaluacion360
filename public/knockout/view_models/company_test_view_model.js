function CompanyViewModel(){
	var self = this;
	var company = new Miscelaneos();

	self.showForm = ko.observable(false);
	self.companies = ko.observableArray();

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};

	self.getCompanies = function(){
		company.allCompanies()
		.done(function(response){
			self.companies(response);
			// console.log(response);
		})
		.fail(function(response){
			toastr.error('Ocurrio un error al obtener las empresas');
		})
	};

    self.destroyMiscelaneos = function(data){
        console.log(data);
        swal({title: "¿Estas seguro?",
                text: "que desea eliminar esta Empresa",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Eliminar",
                closeOnConfirm: true },
            function(){
                company.destroy(data.id)
                    .done(function(response){
                        toastr.info('Ha sido eliminado con exito');
                        self.getCompanies();
                    })
                    .fail(function(response){
                        toastr.error('Hubo un error al intentar eliminar');
                    });
            });
    }

	//Obteniendo cempresas
	self.getCompanies();

}