// function AdminTestViewModel(){
// 	var self = this;
// 	var comportamiento = new Comportamiento();

// 	self.comportamientos = ko.observableArray();
// 	self.showFormTest = ko.observable(false);
// 	self.showFormAdminTest = ko.observable(false);
// 	self.formCompany = ko.observable(false);
// 	self.assignOtherQ = ko.observable(false);
// 	self.tests = ko.observableArray();
// 	self.formData = ko.observable({
// 		name: ko.observable(),
// 		comportamientos: ko.observableArray()
// 	});


// 	// self.addComportamiento = function(){
// 	// 	self.formData().comportamientos.push()
// 	// }
// 	self.toggleForm = function(){
//       self.showFormTest(!self.showFormTest());
//    };

//    self.toggleAdmin = function(){
//       self.showFormAdminTest(!self.showFormAdminTest());
//    };

//    self.toggleformCompany = function(){
//       self.formCompany(!self.formCompany());
//    };

	
// 	self.getComportamientos = function(){
// 		comportamiento.all()
// 		.done(function(response){
// 			self.comportamientos(response);
// 		});
// 	};
// }