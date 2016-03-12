function testViewModel(){
	var self = this;
	var encuesta = new Test();

	self.showForm = ko.observable(false);
	self.items = ko.observableArray();
	self.currentItem = ko.observable({frases: [{name: 'xx'}]});
	self.currentIndexFrase = ko.observable(0);

	self.finish =  ko.observable(false);
  self.currentAnswer = ko.observable();

  self.formData = ko.observable({
    answers: ko.observableArray() //con este l
  });



	self.toggleEncuesta = function(){
		self.showForm(!self.showForm())
	};


	self.next = function() {
     if (self.currentAnswer() == null) {
        alert('seleccione una respuesta');
        return;
      }

    var setAnswer =  function(){
    //  self.currentIndexFrase(self.currentIndexFrase() + 1);
      self.formData().answers.push({
         frase_id: self.currentAnswer().frase_id,
         answer_id: self.currentAnswer().idanswer

      });

      self.currentAnswer(null);
    }
		if (self.currentIndexFrase() == self.currentItem().frases.length  - 1 && !self.finish() ){
      //console.log(self.items()[self.items.indexOf(self.currentItem()) + 1] );
      setAnswer();



			self.currentIndexFrase(0);
			self.currentItem(self.items()[self.items.indexOf(self.currentItem()) + 1]);

			self.finish( self.items.indexOf(self.currentItem()) == self.items().length - 1 );


		}else{
			setAnswer();
      self.currentIndexFrase(self.currentIndexFrase() + 1);

		}
    console.log(self.formData().answers());
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