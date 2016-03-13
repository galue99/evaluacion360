function testViewModel(){
	var self = this;
	var encuesta = new Test();

	self.showForm = ko.observable(false);
	self.items = ko.observableArray();
	self.currentItem = ko.observable({frases: [{name: '  '}]});
	self.currentIndexFrase = ko.observable(0);
	self.currentAnswer = ko.observable();
	self.finishItems =  ko.observable(false);
	self.finishTest =  ko.observable(false);
  	self.cntFrases = ko.observable();
  	self.lastFrase = ko.observable();
	self.formData = ko.observable({
		answers: ko.observableArray()
	});

	self.toggleEncuesta = function(){
		self.showForm(!self.showForm())
	};

	//funcion para cambiar la pregunta
	self.next = function() {
		if (self.currentAnswer() == null) {
			alert('seleccione una respuesta');
			return;
		}
		// cambiamos el push a una variable
		var setAnswer =  function(){
			self.formData().answers.push({
				frase_id: self.currentAnswer().frase_id,
				answer_id: self.currentAnswer().idanswer
			});
    		//seteo la frase seleccionada a null
    		self.currentAnswer(null);
    	}
    	if (self.currentIndexFrase() == self.currentItem().frases.length  - 1 && !self.finishItems() ){
	    	//console.log(self.items()[self.items.indexOf(self.currentItem()) + 1] );
	    	//anadimos la respuesta de la frase anterior al observable formData
	    	setAnswer();
	    	//Seteamos el item al primero
	    	self.currentIndexFrase(0);

    		//cambiamos de items para imprimir las frases del nuevo item
    		self.currentItem(self.items()[self.items.indexOf(self.currentItem()) + 1]);
	    	

	    	//revisamos si hay mas frases de lo contrario finishItems pasa a true
        	self.finishItems( self.items.indexOf(self.currentItem()) == self.items().length - 1 );
 	    	console.log(self.finishItems());

	    }else{

	        //Hacemos push de la respuesta al formData
	    	setAnswer();

    		//Cambiamos de pregunta
    		if (self.finishTest() == true){
    			//Necesito que termine la puta encuesta guardando y finalizando
	        	setAnswer() && alert('encuesta finalizada');
	        	
	        	return;
	        }else{
	        	self.currentIndexFrase(self.currentIndexFrase() + 1);	
	        }
			
			
	        //para validacion
	        self.lastFrase(self.currentIndexFrase());
	        self.cntFrases(self.currentItem().frases.length);

	        console.log(self.lastFrase());
	        console.log(self.cntFrases());

	        if((self.finishItems() == true ) && (self.cntFrases() == (self.lastFrase() + 1)) ){ 
	        	self.finishTest(true);
	        	console.log('ultima pregunta');
	        }
	    }
	    //para probar que se esten agregando todas las respuestas
	    console.log(self.formData().answers());
	}


	//funcion para abrir la encuesta
	self.findTest = function(){
		encuesta.find()
		.done(function(response){
			//Coloco los items dentro de un observable
			self.items(response.items);
			//establezco el primer item
			self.currentItem(self.items()[0]);

		});
	};

	//Obtener test
	self.findTest();
}