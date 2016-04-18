function testViewModel(){
	var self = this;
	var encuesta = new Test();
  var otherq = new OtherQuestion();

	self.showForm = ko.observable(false);
	self.items = ko.observableArray();
	self.currentItem = ko.observable({frases: [{name: '  '}]});
	self.currentIndexFrase = ko.observable(0);
	self.currentAnswer = ko.observable();
  self.testId = ko.observable();
	self.finish =  ko.observable(false);
  self.cntFrases = ko.observable();
  self.lastFrase = ko.observable();

  self.formData = ko.observable({
		otherQuestion: ko.observableArray(),
		answers: ko.observableArray()
  });

    self.toggleEncuesta = function(){
    	self.showForm(!self.showForm())
    };

    self.saveTest = function(data){
      // console.log(ko.toJSON(self.formData()));
      encuesta.create(ko.toJSON(self.formData()))
      .done(function(response){
        toastr.success('La encuesta ha sido enviada con exito');
        setTimeout(function(){
          window.location.href = "/logout";
        }, 1000);
      })
      .fail(function(response){
        toastr.error('Ocurrio un erro al enviar los datos');
      });
    };

    self.setAnswer = function(){
      if(self.finish()){
        swal({
          title: "Ya casi terminamos",
          text: "solo necesitamos una ultima cosa para culminar",
          type: "success",
          confirmButtonColor: "#A5DC86",
          confirmButtonText: "Continuar",
          closeOnConfirm: true },
             function(){
              self.openModalOtherQ();
            });
      }else{
        self.next();
      }
    }

	//funcion para cambiar la pregunta
  self.next = function() {
    if (self.currentAnswer() == null) {
      swal({
      	title: "Un momento",   
      	text: "Sebes seleccionar al menos una respuesta",   
      	type: "warning",   
      	confirmButtonColor: "#DD6B55",   
      	confirmButtonText: "Ok",   
      	closeOnConfirm: true
      });
      return;
    }
	// cambiamos el push a una variable
	var setAnswer =  function(){
		self.formData().answers.push({
			frase_id: self.currentAnswer().frase_id,
			answer_id: self.currentAnswer().id
		});
  		//seteo la frase seleccionada a null
  		self.currentAnswer(null);
  	}
  	if (self.currentIndexFrase() == self.currentItem().frases.length  - 1 && !self.finish() ){
    	//console.log(self.items()[self.items.indexOf(self.currentItem()) + 1] );
    	//anadimos la respuesta de la frase anterior al observable formData
    	setAnswer();

      //cambiamos de items para imprimir las frases del nuevo item
      if (self.items.indexOf(self.currentItem()) == self.items().length - 1){
          if ( self.currentItem().frases.length - 1 == self.currentIndexFrase() ){
            self.finish(true);
          }
      }

      if (!self.finish()) {
        //Seteamos el item al primero
    	  self.currentIndexFrase(0);
         //cambiar item
        self.currentItem(self.items()[self.items.indexOf(self.currentItem()) + 1]);
      }

	    	// console.log(self.finish());

    }else{

      //Hacemos push de la respuesta al formData
    	setAnswer();
    	//Cambiamos de pregunta
    	self.currentIndexFrase(self.currentIndexFrase() + 1);

    }
    //para probar que se esten agregando todas las respuestas
    // console.log(self.formData().answers()); 
	}

	self.setAnswerPartTwo = function(){
		$('#modal1').modal('hide');
    swal({
      title: "Hemos terminado",
      text: "Gracias por estar aqui y dedicarnos un poco de tu valioso tiempo.",
      type: "success",
      confirmButtonColor: "#A5DC86",
      confirmButtonText: "Finalizar",
      closeOnConfirm: true },
         function(){
          self.saveTest();
    });
	};

	//funcion para abrir la encuesta
	self.findTest = function(){
		encuesta.find()
		.done(function(response){
      self.testId(response.id);
			//Coloco los items dentro de un observable
			self.items(response.items);
			//establezco el primer item
			self.currentItem(self.items()[0]);
      // console.log(response);
      // response.user

		});
	};

    self.all = function(){
		encuesta.all()
		.done(function(response){
			//Coloco los items dentro de un observable
			self.items(response.items);
			//establezco el primer item
			//self.currentItem(self.items()[0]);
		});
	};
  //Metodpo para abrir modal de preguntas adicionales y llamar las OtherQ
  self.openModalOtherQ = function(){
    $('#modal1').modal('show');
    self.getOtherQ();
  };


  //Metodo para obtener preguntas adicionales
  self.getOtherQ = function(){
    otherq.allEncuestado(self.testId())
    .done(function(response){
      self.formData().otherQuestion(
        response.map(function(otherq){
          return {
            OtherQ_id: otherq.id,
            OtherQ_question: otherq.question,
            OtherQ_answer: ko.observable()
          }
        })
      )
    });
  };


//Obtener test
  self.findTest();


}