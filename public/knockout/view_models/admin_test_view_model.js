function AdminTestViewModel(){
  var self = this;
  var sumberItem = 0;

  self.showFormTest = ko.observable(false);
  self.formData = ko.observable({
    name: ko.observable(),
    items: ko.observableArray()
  });

  self.toggleForm = function(){
    self.showFormTest(!self.showFormTest());
  };

  self.cancelCreateTest = function(){
    self.formData();
    self.toggleForm();
  };

  self.showModal = function(data){
    jQuery('#myModal').modal('show');
  }

  self.addItems = function(){
      sumberItem++;
      self.formData().items.push(
        {items: sumberItem, frases:ko.observableArray()}
      );
      console.log(self.formData().items());
  };

  self.addFrase = function(data){
    data.frases.push({
      name: ko.observable(), answers: ko.observableArray()
    });
  };

  self.addAnswers = function(data){
    
    if (!data.name()){
      toastr.warning('Introduzca el nombre de la pregunta');
    }else{
      data.answers.push({
        name: ko.observable(),
      });
    }

  };


  // self.delItem = function(items){
  //   console.log(items);
  //   items.splice(items.items);
  // };

  self.delFrase = function(items,frases){
    items.frases.splice(items.frases.indexOf(frases),1);
  };

  self.delAnswer = function(frase,answer){
    frase.answers.splice(frase.answers.indexOf(answer),1);
  };






};