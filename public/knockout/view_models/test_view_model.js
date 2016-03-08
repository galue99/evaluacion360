function testViewModel(){
	var self = this;
	var encuesta = new Test();

	self.showForm = ko.observable(false);
	self.Object1 = ko.observableArray();
  self.items = ko.observableArray();
	self.currentItem = ko.observable({frases: [{name: 'xx'}]});
  self.currentIndexFrase = ko.observable(0);
  self.finish =  ko.observable(false);
	self.toggleEncuesta = function(){
		self.showForm(!self.showForm())
	};

  self.next = function() {
    if (self.currentIndexFrase() == self.currentItem().frases.length  - 1 && !self.finish() ){
              console.log('ultima pregunta');
              self.currentIndexFrase(0);
              self.currentItem(self.items()[self.items.indexOf(self.currentItem()) + 1]);
              self.finish( self.items.indexOf(self.currentItem()) == self.items().length - 1 )



    } else {

      self.currentIndexFrase(self.currentIndexFrase() + 1);

    }
  //  console.log(self.currentItem());
   // console.log(self.currentIndexFrase());


  }

	self.findTest = function(){
		encuesta.find()
		.done(function(response){
        self.items(response.items);
        self.currentItem(self.items()[0]);
		});
	};





	self.findTest();
}