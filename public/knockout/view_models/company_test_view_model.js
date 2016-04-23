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


	//Obteniendo cempresas
	self.getCompanies();

}