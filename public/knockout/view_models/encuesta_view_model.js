function encuestaViewModel(){
	var self = this;

	self.showForm = ko.observable(false);


	self.toggleEncuesta = function(){
		self.showForm(!self.showForm())
		console.log(self.showForm());
	};
}