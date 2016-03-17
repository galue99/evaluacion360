function AdminTestViewModel(){
  var self = this;
  var itemId = 0;
  var fraseId = 1;
  var answerId = 1;


  self.formData = ko.observable({
    name: ko.observable(),
    items: ko.observableArray()
  });
  self.items = ko.observableArray([

  ]);

  self.addItems = function(){
    itemId++;
    self.formData().items.push(
      {items: itemId, frases:ko.observableArray()}
    );
    console.log(self.formData().items());
  };

  self.addFrase = function(data){
    fraseId++;
    data.frases.push({
    id: fraseId, name: ko.observable(), answers: ko.observableArray()
    });
  };

  self.addAnswers = function(data){
    answerId++;
    data.answers.push({
      name: ko.observable(),
    })

  }






};