function CompanyViewModel(){
	var self = this;
	
	self.showForm = ko.observable(false);


	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};

}