function AdminTestViewModel(){
  var self = this;
  var sumberItem = 0;

  self.formData = ko.observable({
    name: ko.observable(),
    items: ko.observableArray()
  });
  self.items = ko.observableArray([

  ]);

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
    data.answers.push({
      name: ko.observable(),
    })

  }

  self.delAnswers = function(frase,answer){

    frase.answers.splice(frase.answers.indexOf(answer),1)
  };






};